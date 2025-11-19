<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}

		$this->load->model('Admin_model');
	}


	public function index()
	{
		$data['admins'] = $this->Admin_model->get_all();

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('admin/index', $data);
		$this->load->view('template/footer');
	}

	public function create()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('admin/create');
		$this->load->view('template/footer');
	}

	public function save()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->create();
			return;
		}

		// cek username unik
		if ($this->Admin_model->check_username_exists($this->input->post('username'))) {
			$this->session->set_flashdata('error', 'Username sudah dipakai!');
			redirect('admin/create');
		}

		$data = [
			'username' => $this->input->post('username'),
			'nama'     => $this->input->post('nama'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
		];

		$this->Admin_model->insert($data);
		$this->session->set_flashdata('success', 'Admin berhasil ditambahkan!');
		redirect('admin');
	}

	public function edit($id)
	{
		$data['admin'] = $this->Admin_model->get_by_id($id);

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('admin/edit', $data);
		$this->load->view('template/footer');
	}

	public function editSave($id)
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
			return;
		}

		// cek username unik kecuali id ini
		if ($this->Admin_model->check_username_exists($this->input->post('username'), $id)) {
			$this->session->set_flashdata('error', 'Username sudah digunakan!');
			redirect('admin/edit/' . $id);
		}

		$updateData = [
			'username' => $this->input->post('username'),
			'nama'     => $this->input->post('nama'),
		];

		if (!empty($this->input->post('password'))) {
			$updateData['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		}

		$this->Admin_model->update($id, $updateData);
		$this->session->set_flashdata('success', 'Admin berhasil diupdate!');
		redirect('admin');
	}

	public function delete($id)
	{
		$this->Admin_model->delete($id);
		$this->session->set_flashdata('success', 'Admin berhasil dihapus!');
		redirect('admin');
	}
}