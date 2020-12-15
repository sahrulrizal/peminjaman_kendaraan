<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman_model extends CI_Model
{

    public function ambilSemuaData($tbl)
    {
        return $this->db->get($tbl);
    }
}
