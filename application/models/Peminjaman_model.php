<?php
<<<<<<< HEAD
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman_model extends CI_Model
{

    public function ambilSemuaData($tbl)
    {
        return $this->db->get($tbl);
    }
}
=======
defined('BASEPATH') OR exit('No Direct script access allowed');
    class Peminjaman_model extends CI_MODEL{
        public function getTable()
        {
            $this->db->select('tb_users.nama', 'tb_kendaraan.nama_kendaraan');
            $this->db->from('tb_users','tb_kendaraan');
            $this->db->join('tb_peminjaman',
                 'tb_peminjaman.id_peminjam = tb_users.nama',
                 'tb_peminjaman.id_kendaraan = tb_kendaraan.nama_kendaraan');
            $query = $this->db->get();
            return $query-result();
        }
    }
>>>>>>> e47e9d085286bbfbcf229e57d6dfdf092d260bd6
