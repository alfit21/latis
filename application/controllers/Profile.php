<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}

		$this->load->model('Siswa_model');
		$this->load->model('Lembaga_model');
	}

	public function index()
	{
		// ambil semua siswa untuk dropdown
		$data['siswa_list'] = $this->Siswa_model->get_all();
		$data['selected_siswa'] = null;

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('profile/index', $data);
		$this->load->view('template/footer');
	}

	public function show()
	{
		$nis = $this->input->get('nis');
		$data['siswa_list'] = $this->Siswa_model->get_all();
		if ($nis) {
			$data['selected_siswa'] = $this->Siswa_model->get_by_nis($nis);
			$data['selected_siswa']->lembaga_name = $this->Lembaga_model->get_by_id($data['selected_siswa']->lembaga)->lembaga ?? '';
		} else {
			$data['selected_siswa'] = null;
		}

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('profile/index', $data);
		$this->load->view('template/footer');
	}
}