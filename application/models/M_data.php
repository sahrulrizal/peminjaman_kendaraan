<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_data extends CI_Model
{
    public function index()
    {
        return $this->db->get('karyawan')->result();
    }

    function tampil_data()
    {
        return $this->db->get('tb_users');
    }
}
