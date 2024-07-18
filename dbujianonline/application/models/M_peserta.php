<?php
defined('BASEPATH') or exit('no direct script access allowed');

class M_peserta extends CI_Model
{
    public function get_joinpeserta($id)
    {
        $this->db->select('*');
        $this->db->from('tb_peserta');
        $this->db->join('tb_materi_pelajaran', 'tb_peserta.id_materi_pelajaran=tb_materi_pelajaran.id_materi_pelajaran');
        $this->db->join('tb_siswa', 'tb_peserta.id_siswa=tb_siswa.id_siswa');
        $this->db->join('tb_jenis_ujian', 'tb_peserta.id_jenis_ujian=tb_jenis_ujian.id_jenis_ujian');
        $this->db->where('tb_peserta.id_peserta', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_peserta($idkls, $idsiswa)
    {
        $array = array('tb_kelas.id_kelas' => $idkls, 'tb_siswa.id_siswa' => $idsiswa);
        $this->db->select('*');
        $this->db->from('tb_peserta');
        $this->db->join('tb_materi_pelajaran', 'tb_peserta.id_materi_pelajaran=tb_materi_pelajaran.id_materi_pelajaran');
        $this->db->join('tb_siswa', 'tb_peserta.id_siswa=tb_siswa.id_siswa');
        $this->db->join('tb_jenis_ujian', 'tb_peserta.id_jenis_ujian=tb_jenis_ujian.id_jenis_ujian');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas=tb_siswa.id_kelas', 'left');
        $this->db->where($array);
        $this->db->order_by('id_peserta', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_peserta2($idkls)
    {
        $this->db->select('*');
        $this->db->from('tb_peserta');
        $this->db->join('tb_materi_pelajaran', 'tb_peserta.id_materi_pelajaran=tb_materi_pelajaran.id_materi_pelajaran');
        $this->db->join('tb_siswa', 'tb_peserta.id_siswa=tb_siswa.id_siswa');
        $this->db->join('tb_jenis_ujian', 'tb_peserta.id_jenis_ujian=tb_jenis_ujian.id_jenis_ujian');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas=tb_siswa.id_kelas', 'left');
        $this->db->where('tb_kelas.id_kelas', $idkls);
        $this->db->order_by('id_peserta', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_peserta3($idsiswa)
    {
        $this->db->select('*');
        $this->db->from('tb_peserta');
        $this->db->join('tb_materi_pelajaran', 'tb_peserta.id_materi_pelajaran=tb_materi_pelajaran.id_materi_pelajaran');
        $this->db->join('tb_siswa', 'tb_peserta.id_siswa=tb_siswa.id_siswa');
        $this->db->join('tb_jenis_ujian', 'tb_peserta.id_jenis_ujian=tb_jenis_ujian.id_jenis_ujian');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas=tb_siswa.id_kelas', 'left');
        $this->db->where('tb_siswa.id_siswa', $idsiswa);
        $this->db->order_by('id_peserta', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_peserta4()
    {
        $this->db->select('*');
        $this->db->from('tb_peserta');
        $this->db->join ('tb_siswa', 'tb_peserta.id_siswa = tb_siswa.id_siswa');
        $this->db->join('tb_kelas', 'tb_siswa.id_kelas = tb_kelas.id_kelas');
        $this->db->join('tb_jenis_ujian', 'tb_peserta.id_jenis_ujian = tb_jenis_ujian.id_jenis_ujian');
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query : false;
    }

    public function insert_data($tb_peserta, $data)
    {
        $result = $this->db->insert($tb_peserta, $data);
        if (!$result) {
            echo $this->db->last_query(); // Menampilkan query terakhir
            echo $this->db->error(); // Menampilkan pesan error
            die('Error: ' . $this->db->_error_message()); // Menampilkan pesan error
        }
        return $result;
    }

    public function get_peserta_data()
    {
        $this->db->select('*');
        $this->db->from('tb_peserta');
        $this->db->join('tb_siswa', 'tb_peserta.id_siswa = tb_siswa.id_siswa');
        $this->db->join('tb_kelas', 'tb_siswa.id_kelas = tb_kelas.id_kelas');
        $this->db->join('tb_jenis_ujian', 'tb_peserta.id_jenis_ujian = tb_jenis_ujian.id_jenis_ujian');
        $query = $this->db->get();
        return $query->result();
    }

    public function delete_data($where, $table)
    {
        return $this->db->delete($table, $where);
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table) {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}

