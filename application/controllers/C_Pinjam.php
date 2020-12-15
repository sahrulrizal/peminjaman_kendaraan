<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_kendaraan');
	}

	public function login()
	{
		$email = $this->input->post('email');
		$pass = md5($this->input->post('password'));

		$cekLogin = $this->M_Auth->Login($email, $pass);

		if ($cekLogin) {
			foreach ($cekLogin as $data);
			$this->session->set_userdata('email', $data->email);
			$this->session->set_userdata('role', $data->role);

			if ($this->session->userdata('role') == '1') {
				echo 'Selamat datang atasan <a href="logout">Logout</a>';
			} elseif ($this->session->userdata('role') == '2') {
				echo 'Selamat datang karyawan <a href="logout">Logout</a>';
			}
		}else {
			$this->session->set_flashdata('error', 'Akun tidak ditemukan');
			redirect('Welcome'); // login gagal
		}

	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Welcome');
	}

}

/* End of file C_Auth.php */
/* Location: ./application/controllers/C_Auth.php */
