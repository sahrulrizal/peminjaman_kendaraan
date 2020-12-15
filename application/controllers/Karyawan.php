<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_data');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['tb_users'] = $this->M_data->tampil_data()->result();
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/topbar', $data);
        $this->load->view('dashboard');
        $this->load->view('layout/footer');
    }
}
