<?php
defined('BASEPATH') or exit('no direct script access allowed');

class M_jadwal_ujian extends CI_Model
{
    public function jadwal_ujian($id)
    {
        $this->db->select('*');
        $this->db->from('tb_peserta');
        $this->db->join('tb_materi_pelajaran', 'tb_peserta.id_materi_pelajaran=tb_materi_pelajaran.id_materi_pelajaran');
        $this->db->join('tb_siswa', 'tb_peserta.id_siswa=tb_siswa.id_siswa');
        $this->db->where('tb_peserta.id_peserta', $id);
        $query = $this->db->get();
        return $query->result();
    }
}
