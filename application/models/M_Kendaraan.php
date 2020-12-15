<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kendaraan extends CI_Model {

	function getKendaraan()
	{
		// belum beres get nya
		$this->db->select('*');
		$this->db->from('tb_kendaraan');
		$this->db->where('status', NULL);

		$query = $this->db->get();

		return $query->result();
	}

}
