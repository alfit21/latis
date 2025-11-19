<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
	}

	public function index()
	{
		// Jika sudah login, langsung arahkan ke dashboard / siswa
		if ($this->session->userdata('logged_in')) {
			redirect('siswa');
		}

		$this->load->view('auth/login');
	}

	public function check()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// cek username di database
		$admin = $this->db->get_where('admin', ['username' => $username])->row();

		if (!$admin) {
			$this->session->set_flashdata('error', 'Username tidak ditemukan!');
			redirect('login');
		}

		// cek password
		if (!password_verify($password, $admin->password)) {
			$this->session->set_flashdata('error', 'Password salah!');
			redirect('login');
		}

		// simpan session login
		$this->session->set_userdata([
			'logged_in' => TRUE,
			'id'        => $admin->id,
			'username'  => $admin->username,
			'nama'      => $admin->nama
		]);

		redirect('siswa'); // halaman setelah login
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}