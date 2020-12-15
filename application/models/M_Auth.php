<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Auth extends CI_Model {

	function Login($email, $pass)
	{
		$this->db->select('email, password, role');
		$this->db->from('tb_users');
		$this->db->where('email', $email);
		$this->db->where('password', $pass);
		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

}
