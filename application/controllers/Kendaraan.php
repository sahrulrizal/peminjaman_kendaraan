<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kendaraan extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Kendaraan';

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/topbar', $data);
        $this->load->view('kendaraan/index', $data);
        $this->load->view('layout/footer');
	}
}
