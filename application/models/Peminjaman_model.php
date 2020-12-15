<?php
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