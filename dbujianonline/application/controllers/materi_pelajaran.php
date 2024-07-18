<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi_pelajaran extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('status') != 'admin_login' && $this->session->userdata('status') != 'guru_login') {
            redirect(base_url('auth'));
        }
        $this->load->model('m_data'); // pastikan model dimuat
    }

    public function index() {
        $data['materi_pelajaran'] = $this->m_data->get_data('tb_materi_pelajaran')->result();
        $this->load->view('admin/v_materi_pelajaran', $data);
    }

    public function materi_pelajaran_aksi() {
        $materipelajaran = $this->input->post('materi_pelajaran');
        $alur_tujuan_pembelajaran = $this->input->post('alur_tujuan_pembelajaran');
        $deskripsi = $this->input->post('deskripsi');
        $file = $this->input->post('file');

        $data = array(
            'materi_pelajaran' => $materipelajaran,
            'alur_tujuan_pembelajaran' => implode(',', $alur_tujuan_pembelajaran),
            'deskripsi' => $deskripsi,
            'file' => $file
        );

        $this->m_data->insert_data($data, 'tb_materi_pelajaran');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-message"><i class="icon fa fa-check"></i><b>Selamat !<br></b> Anda telah berhasil menambahkan data Mata Pelajaran</div>');
        redirect(base_url('materi_pelajaran'));
    }

    public function hapus($id) {
        $where = array('id_materi_pelajaran' => $id);
        $this->m_data->delete_data($where, 'tb_materi_pelajaran');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message"><i class="icon fa fa-check"></i><b>Selamat ! <br></b> Anda telah berhasil menghapus data materi pelajaran</div>');
        redirect(base_url('materi_pelajaran'));
    }

    public function edit($id) {
        $where = array('id_materi_pelajaran' => $id);
        $data['materi_pelajaran'] = $this->m_data->edit_data($where, 'tb_materi_pelajaran')->row();
        $this->load->view('admin/v_materi_pelajaran_edit', $data);
    }    

    public function update() {
        // Get POST data
        $id_materi_pelajaran = $this->input->post('id_materi_pelajaran');
        $materipelajaran = $this->input->post('materi_pelajaran');
        $alur_tujuan_pembelajaran = $this->input->post('alur_tujuan_pembelajaran');
        $deskripsi = $this->input->post('deskripsi');
        $filename = $this->input->post('file');
        
        // Configure upload parameters
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx|ppt|pptx';
        $config['max_size'] = 2048; // Max size in kilobytes (2MB)
        
        $this->load->library('upload', $config);
        
        // Handle file upload
        if ($this->upload->do_upload('file')) {
            $file_data = $this->upload->data();
            $file = $file_data['file_name'];
        } else {
            // Use the old file if no new file is uploaded
            $file = $this->input->post('old_file');
        }
        
        // Prepare data for update
        $where = array('id_materi_pelajaran' => $id_materi_pelajaran);
        $data = array(
            'materi_pelajaran' => $materipelajaran,
            'alur_tujuan_pembelajaran' => implode(',', $alur_tujuan_pembelajaran),
            'deskripsi' => $deskripsi
            // 'file' => $file
        );
        
        // Update data in the database
        if ($this->m_data->update_data($where, $data, 'tb_materi_pelajaran')) {
            // Set success flashdata message
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-message"><i class="icon fa fa-check"></i><b>Selamat! <br></b> Anda telah berhasil mengupdate data materi pelajaran</div>');
        } else {
            // Set error flashdata message
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message"><i class="icon fa fa-times"></i><b>Maaf! <br></b> Terjadi kesalahan saat mengupdate data materi pelajaran</div>');
        }
        
        // Redirect to the specified URL
        redirect(base_url('materi_pelajaran'));
    }
    
    
}