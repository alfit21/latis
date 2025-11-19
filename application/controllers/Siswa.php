<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Siswa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}

		$this->load->model('Siswa_model'); // model siswa
		$this->load->model('Lembaga_model'); // model lembaga
	}

	public function index()
	{
		// Ambil semua lembaga untuk dropdown
		$data['lembaga'] = $this->Lembaga_model->get_all();

		// Cek filter lembaga
		$lembaga_id = $this->input->get('lembaga_id');

		if ($lembaga_id && $lembaga_id != 'all') {
			$data['siswa'] = $this->Siswa_model->get_by_lembaga($lembaga_id);
		} else {
			$data['siswa'] = $this->Siswa_model->get_all();
		}

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('siswa/index', $data);
		$this->load->view('template/footer');
	}

	public function create()
	{
		$data['lembaga'] = $this->Lembaga_model->get_all();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('siswa/create', $data);
		$this->load->view('template/footer');
	}

	public function save()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		$old_data = [
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'lembaga' => $this->input->post('lembaga'),
		];

		if ($this->form_validation->run() == FALSE) {
			// validasi gagal: load view kembali dengan data lama
			$data['old'] = $old_data;
			$data['lembaga'] = $this->Lembaga_model->get_all();
			$data['error'] = validation_errors();
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('siswa/create', $data);
			$this->load->view('template/footer');
			return;
		}

		// upload foto
		$foto = '';
		if (!empty($_FILES['foto']['name'])) {
			$config['upload_path'] = './assets/uploads/';
			$config['allowed_types'] = 'jpg|png';
			$config['max_size'] = 100;
			$config['file_name']     = uniqid('foto_') . '_' . time();

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto')) {
				$data['old'] = $old_data;
				$data['lembaga'] = $this->Lembaga_model->get_all();
				$data['error_upload'] = $this->upload->display_errors();
				$this->load->view('template/header');
				$this->load->view('template/sidebar');
				$this->load->view('siswa/create', $data);
				$this->load->view('template/footer');
				return;
			} else {
				$uploadData = $this->upload->data();
				$foto = $uploadData['file_name'];
			}
		}

		// simpan ke database
		$nis = $this->Siswa_model->generateNIS();
		$insertData = [
			'nis'     => $nis,
			'nama'    => $this->input->post('nama'),
			'lembaga' => $this->input->post('lembaga'),
			'foto'    => $foto,
			'email'   => $this->input->post('email')
		];

		$this->Siswa_model->insert($insertData);
		$this->session->set_flashdata('success', 'Data siswa berhasil ditambahkan.');
		redirect('siswa'); // <--- flashdata akan tampil karena pakai redirect
	}

	public function edit($id)
	{
		// Ambil data siswa berdasarkan ID
		$siswa = $this->Siswa_model->get_by_nis($id);
		if (!$siswa) {
			$this->session->set_flashdata('error', 'Data siswa tidak ditemukan.');
			redirect('siswa');
		}

		$data['siswa'] = $siswa;
		$data['lembaga'] = $this->Lembaga_model->get_all();

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('siswa/edit', $data);
		$this->load->view('template/footer');
	}

	public function editSave($nis)
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		if ($this->form_validation->run() == FALSE) {
			// Validasi gagal, load form edit dengan data lama
			$siswa = (object) [
				'nis' => $nis,
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'lembaga' => $this->input->post('lembaga'),
				'foto' => $this->input->post('old_foto') // foto lama tetap
			];
			$data['siswa'] = $siswa;
			$data['lembaga'] = $this->Lembaga_model->get_all();
			$data['error'] = validation_errors();

			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('siswa/edit', $data);
			$this->load->view('template/footer');
			return;
		}

		// Upload foto baru (jika ada)
		$foto = $this->input->post('old_foto'); // default foto lama
		if (!empty($_FILES['foto']['name'])) {
			$config['upload_path'] = './assets/uploads/';
			$config['allowed_types'] = 'jpg|png';
			$config['max_size'] = 100;
			$config['file_name']     = uniqid('foto_') . '_' . time();

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('foto')) {
				// hapus foto lama
				if ($foto && file_exists('./assets/uploads/' . $foto)) {
					unlink('./assets/uploads/' . $foto);
				}

				$uploadData = $this->upload->data();
				$foto = $uploadData['file_name'];
			} else {
				$data['siswa'] = (object) [
					'nis' => $nis,
					'nama' => $this->input->post('nama'),
					'email' => $this->input->post('email'),
					'lembaga' => $this->input->post('lembaga'),
					'foto' => $this->input->post('old_foto')
				];
				$data['lembaga'] = $this->Lembaga_model->get_all();
				$data['error_upload'] = $this->upload->display_errors();

				$this->load->view('template/header');
				$this->load->view('template/sidebar');
				$this->load->view('siswa/edit', $data);
				$this->load->view('template/footer');
				return;
			}
		}

		// Simpan perubahan
		$updateData = [
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'lembaga' => $this->input->post('lembaga'),
			'foto' => $foto
		];

		$this->Siswa_model->update_by_nis($nis, $updateData);
		$this->session->set_flashdata('success', 'Data siswa berhasil diupdate.');
		redirect('siswa');
	}

	public function delete($nis)
	{
		// ambil data siswa dulu untuk hapus foto
		$siswa = $this->Siswa_model->get_by_nis($nis);
		if ($siswa) {
			// hapus foto jika ada
			if ($siswa->foto && file_exists('./assets/uploads/' . $siswa->foto)) {
				unlink('./assets/uploads/' . $siswa->foto);
			}

			// hapus data siswa
			$this->Siswa_model->delete_by_nis($nis);
			$this->session->set_flashdata('success', 'Data siswa berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error', 'Data siswa tidak ditemukan.');
		}

		redirect('siswa');
	}


	public function export_excel()
	{
		$lembaga_id = $this->input->get('lembaga_id');

		// Ambil data sesuai filter
		if ($lembaga_id == 'all' || $lembaga_id == null) {
			$siswa = $this->Siswa_model->get_all();
		} else {
			$siswa = $this->Siswa_model->get_by_lembaga($lembaga_id);
		}

		// Nama file
		$filename = "data_siswa_" . date('Ymd_His') . ".xls";

		// Header supaya browser download file Excel
		header("Content-Type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=\"$filename\"");
		header("Cache-Control: max-age=0");

		// Tabel HTML
		echo "<table border='1'>";
		echo "<tr>
            <th>NIS</th>
            <th>Nama</th>
            <th>Lembaga</th>
            <th>Email</th>
          </tr>";

		foreach ($siswa as $s) {
			echo "<tr>";
			echo "<td>{$s->nis}</td>";
			echo "<td>{$s->nama}</td>";
			echo "<td>{$s->lembaga_nama}</td>";
			echo "<td>{$s->email}</td>";
			echo "</tr>";
		}

		echo "</table>";
		exit;
	}
}
