<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soal_ujian extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        if (!$this->session->userdata('status') || !in_array($this->session->userdata('status'), ['admin_login', 'guru_login'])) {
            redirect('auth');
        }
        $this->load->model('m_data');
        $this->load->model('m_soal');
    }

    public function index()
    {
        $data['soal_ujian'] = $this->m_data->get_data('tb_soal_ujian')->result();
        $this->load->view('admin/v_soal_ujian', $data);
    }

    public function edit($id)
    {
        $data['soal'] = $this->m_data->edit_data(array('id_soal_ujian' => $id), 'tb_soal_ujian')->row();      
        $this->load->view('admin/v_soal_ujian_edit', $data);      
    }

    public function update() {
        $id = $this->input->post('id');
        $pertanyaan = $this->input->post('soal');
        $ranah_kognitif = $this->input->post('ranah_kognitif');
        $a = $this->input->post('a');
        $b = $this->input->post('b');
        $c = $this->input->post('c');
        $d = $this->input->post('d');
        $e = $this->input->post('e');
        $kunci_jawaban = $this->input->post('kunci');
    
        // Log data yang diterima
        log_message('debug', 'Data yang diterima: ' . print_r($this->input->post(), true));
    
        if (empty($pertanyaan) || empty($ranah_kognitif) || empty($a) || empty($b) || empty($c) || empty($d) || empty($e) || empty($kunci_jawaban)) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Semua field harus diisi semua !</h4></div>');
            redirect(base_url('soal_ujian'));
        } else {
            $data = array(
                'pertanyaan' => $pertanyaan,
                'ranah_kognitif' => $ranah_kognitif,
                'a' => $a,
                'b' => $b,
                'c' => $c,
                'd' => $d,
                'e' => $e,
                'kunci_jawaban' => $kunci_jawaban
            );
    
            $where = array('id_soal_ujian' => $id);
    
            // Log data yang akan diupdate dan kondisi where
            log_message('debug', 'Data yang akan diupdate: ' . print_r($data, true));
            log_message('debug', 'Kondisi WHERE: ' . print_r($where, true));
    
            $this->m_soal->update_data($where, $data, 'tb_soal_ujian');
    
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Data berhasil di Update.</h4></div>');
            redirect(base_url('soal_ujian'));
        }
    }    

    public function hapus($id)
    {
        $where = ['id_soal_ujian' => $id];
        $this->m_data->delete_data($where, 'tb_soal_ujian');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Perhatian, Data telah berhasil dihapus!</h4></div>');
        redirect(base_url('soal_ujian'));
    }
}
?>
