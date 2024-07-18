<?php
defined('BASEPATH') or exit('no direct script access allowed');

class M_hasil extends CI_Model
{
    public function get_peserta2($id)
    {
        $this->db->select('*');
        $this->db->from('tb_peserta');
        $this->db->join('tb_materi_pelajaran', 'tb_peserta.id_materi_pelajaran = tb_materi_pelajaran.id_materi_pelajaran');
        $this->db->join('tb_jenis_ujian', 'tb_peserta.id_jenis_ujian=tb_jenis_ujian.id_jenis_ujian');
        $this->db->join('tb_siswa', 'tb_peserta.id_siswa=tb_siswa.id_siswa');
        $this->db->where('tb_peserta.id_peserta', $id);
        $this->db->order_by('nilai', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_cetak_jawaban($id){
        $this->db->select('*'); //mengambil semua
        $this->db->from('tb_peserta'); //nama tabel
        $this->db->join('tb_siswa', 'tb_peserta.id_siswa = tb_siswa.id_siswa'); //menggabungkan
        $this->db->join('tb_materi_pelajaran', 'tb_peserta.id_materi_pelajaran = tb_materi_pelajaran.id_materi_pelajaran');
        $this->db->join('tb_soal_ujian', 'tb_materi_pelajaran.alur_tujuan_pembelajaran = tb_soal_ujian.alur_tujuan_pembelajaran');
        $this->db->join('tb_jawaban', 'tb_peserta.id_peserta = tb_jawaban.id_peserta');
        $this->db->where('tb_peserta.id_peserta', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_peserta3()
    {
        $this->db->select('*');
        $this->db->from('tb_peserta');
        $this->db->join('tb_materi_pelajaran', 'tb_peserta.id_materi_pelajaran = tb_materi_pelajaran.id_materi_pelajaran');
        $this->db->join('tb_jenis_ujian', 'tb_peserta.id_jenis_ujian=tb_jenis_ujian.id_jenis_ujian');
        $this->db->join('tb_siswa', 'tb_peserta.id_siswa=tb_siswa.id_siswa');
        $this->db->order_by('nilai', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_soal_ujian()
    {
        $this->db->select('*');
        $this->db->from('tb_soal_ujian');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_jawaban()
    {
        $this->db->select('*');
        $this->db->from('tb_jawaban');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_data_peserta($id) {
        $this->db->select('*');
        $this->db->from('tb_peserta');
        $this->db->join('tb_materi_pelajaran', 'tb_peserta.id_materi_pelajaran = tb_materi_pelajaran.id_materi_pelajaran');
        $this->db->join('tb_jenis_ujian', 'tb_peserta.id_jenis_ujian=tb_jenis_ujian.id_jenis_ujian');
        $this->db->join('tb_siswa', 'tb_peserta.id_siswa=tb_siswa.id_siswa');
        $this->db->where('tb_peserta.id_peserta', $id);
        $this->db->order_by('nilai', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }



    public function __construct()
    {
        parent::__construct();
    }

    // Fungsi untuk mendapatkan jawaban siswa berdasarkan id peserta dan nomor soal
    public function getStudentAnswerByQuestion($id_peserta, $nomor_soal)
    {
        $this->db->select('jawaban');
        $this->db->from('tb_jawaban');
        $this->db->where('id_peserta', $id_peserta);
        $this->db->where('nomor_soal', $nomor_soal);
        return $this->db->get()->row();
    }
}
