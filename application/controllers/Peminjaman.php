<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Peminjaman_model');
    }

    public function index()
    {
        $data['title'] = 'Kendaraan';
        $data['pinjam'] = $this->Peminjaman_model->ambilSemuaData('tb_peminjaman')->result();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/topbar', $data);
        $this->load->view('peminjaman/index', $data);
        $this->load->view('layout/footer');
    }
}
