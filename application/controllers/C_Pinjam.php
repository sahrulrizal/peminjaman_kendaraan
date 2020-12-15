<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Pinjam extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_kendaraan');
	}

	public function peminjaman()
	{

		  $getKend = $this->M_Kendaraan->getKendaraan();

			redirect('peminjaman');

	}

}
