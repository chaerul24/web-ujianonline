<?php
class Jadwal_ujian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != 'siswa_login') {
            redirect(base_url() . 'auth?alert=belum_login');
        }
        $this->load->model('m_data');
    }

    public function index()
    {
        $nama_siswa = $this->session->userdata('nama');

        // Query untuk mengambil jadwal ujian siswa
        $query = $this->db->query('SELECT tb_peserta.id_peserta, tb_siswa.nama_siswa, tanggal_ujian, jam_ujian, tb_jenis_ujian.jenis_ujian, status_ujian 
        FROM tb_peserta
        JOIN tb_siswa ON tb_peserta.id_siswa=tb_siswa.id_siswa 
        JOIN tb_jenis_ujian ON tb_peserta.id_jenis_ujian=tb_jenis_ujian.id_jenis_ujian
        WHERE tb_siswa.nama_siswa = ?', array($nama_siswa));

        // Convert result to array
        $data['jadwal_ujian'] = $query->result();

        // Debug: Log hasil query
        log_message('debug', 'Jadwal Ujian: ' . print_r($data['jadwal_ujian'], true));

        // Load view dengan data jadwal ujian
        $this->load->view('siswa/v_jadwal_ujian', $data);
    }
}
