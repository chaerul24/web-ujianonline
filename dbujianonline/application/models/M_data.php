<?php
defined('BASEPATH') or exit('no direct script access allowed');

class M_data extends CI_Model
{
    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function get_peserta_by_id($id_peserta)
    {
        return $this->db->get_where('tb_peserta', array('id_peserta' => $id_peserta))->row_array();
    }

	public function get_peserta($id_siswa)
    {
        $this->db->select('*');
        $this->db->from('tb_peserta');
        $this->db->join('tb_materi_pelajaran', 'tb_peserta.id_materi_pelajaran = tb_materi_pelajaran.id_materi_pelajaran');
        $this->db->where('tb_peserta.id_siswa', $id_siswa);
        return $this->db->get()->result();
    }

    public function insert_data($data, $table)
    {
        return $this->db->insert($table, $data);
    }

    public function delete_data($where, $table)
    {
        return $this->db->delete($table, $where);
    }    
    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $result = $this->db->update($table, $data);
        log_message('debug', 'Last Query: ' . $this->db->last_query());
        return $result;
    }
    
    public function get_soal_ujian_by_materi_pelajaran($id_materi_pelajaran)
    {
        return $this->db->get_where('tb_soal_ujian', array('id_materi_pelajaran' => $id_materi_pelajaran))->result();
    }

    public function update_status_ujian($id_peserta, $status)
    {
        $this->db->where('id_peserta', $id_peserta);
        $this->db->update('tb_peserta', array('status_ujian' => $status));
    }

    public function update_skor_jawaban($id_peserta)
{
    // Lakukan kueri untuk mengambil jumlah jawaban yang benar untuk peserta dengan $id_peserta
    $this->db->select('COUNT(*) as jumlah_benar');
    $this->db->from('tb_jawaban');
    $this->db->where('id_peserta', $id_peserta);
    $this->db->where('jawaban', 'benar'); // Anggap 'benar' sebagai tanda jawaban yang benar
    $query = $this->db->get();
    $result = $query->row();

    if ($result) {
        $jumlah_benar = $result->jumlah_benar;
        
        // Simpan jumlah jawaban yang benar ke dalam tabel peserta_ujian
        $data = array('jumlah_benar' => $jumlah_benar);
        $this->db->where('id_peserta', $id_peserta);
        $this->db->update('tb_peserta_ujian', $data);

        // Tambahkan logika lain jika diperlukan
    }
}
// Pada model m_data.php

public function get_hasil_ujian($id_peserta)
{
    // Ambil data hasil ujian dari database berdasarkan $id_peserta
    $this->db->select('*');
    $this->db->from('tb_hasil_ujian');
    $this->db->where('id_peserta', $id_peserta);
    return $this->db->get()->result(); 
}

    public function UpdateNilai($where, $data, $table)
    {
        $this->db->where('id_jawaban', $where);
        $this->db->update($table, $data);
    }

    public function UpdateNilai2($where, $data, $table)
    {
        $this->db->where('id_peserta', $where);
        $this->db->update($table, $data);
    }
    public function get_kelas_by_id($id_kelas)
    {
        $this->db->where('id_kelas', $id_kelas);
        $query = $this->db->get('tb_kelas');
        return $query->row(); // Mengembalikan satu objek
    }    
    
}


