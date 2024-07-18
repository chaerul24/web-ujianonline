<?php
defined('BASEPATH') or exit('No direct script access allowed');

class hasil_ujian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != 'admin_login') {
            redirect(base_url('auth'));
        }
        $this->load->model('m_hasil');
        $this->load->model('m_data');
        $this->load->library('mypdf');
    }

    public function index()
    {
        if ($this->input->get('id')) {
            $id = $this->input->get('id_hasil_ujian');
            $data['hasil'] = $this->m_hasil->get_peserta2($id);
        } else {
            $data['hasil'] = $this->m_hasil->get_peserta3();
        }

        $data['soal'] = $this->m_hasil->get_soal_ujian();
        $data['jawaban'] = $this->m_hasil->get_jawaban();
    
        $data['kelas'] = $this->m_data->get_data('tb_materi_pelajaran');
        $data['kelas'] = $data['kelas'] ? $data['kelas']->result() : [];
        $data['hasil'] = $data['hasil'] ? $data['hasil'] : [];
    
        // var_dump($data['hasil']);
        $this->load->view('admin/v_hasil_ujian', $data);
    }

    public function cetak_jawaban($id){
        $data['cetak'] = $this->m_hasil->get_cetak_jawaban($id);
        $data['cetak'] = $data['cetak'] ? $data['cetak'] : [];
        $this->mypdf->generate('admin/v_cetak_detail', $data, 'Cetak Hasil Ujian', 'A4', 'Landscape');
    }

    public function print_all()
    {
        if (isset($_GET['id'])) {
            $id = $this->input->get('id');
            $data['cetak'] = $this->m_hasil->get_peserta2($id);
        } else {
            $data['cetak'] = $this->m_hasil->get_peserta3();
        }

        $data['cetak'] = $data['cetak'] ? $data['cetak'] : [];

        $this->mypdf->generate('admin/v_cetak', $data, 'Cetak Hasil Ujian', 'A4', 'Landscape');
    }

    public function cetak($id)
    {
        $data['cetak'] = $this->m_hasil->get_data_peserta($id);
        $data['cetak'] = $data['cetak'] ? $data['cetak'] : [];

        
        $this->mypdf->generate('admin/v_cetak', $data, 'Cetak Hasil Ujian', 'A4', 'Landscape');
    }
    

    // Method untuk menampilkan detail jawaban siswa
    public function student_detail($id_peserta, $nomor_soal) {
        // Mendapatkan jawaban siswa berdasarkan id_peserta dan nomor_soal
        $data['jawaban_siswa'] = $this->m_hasil->getStudentAnswerByQuestion($id_peserta, $nomor_soal);

        // Load view untuk menampilkan detail jawaban siswa
        $this->load->view('admin/student_detail', $data);
    }
    
}
?>
