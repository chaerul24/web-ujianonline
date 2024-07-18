<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != 'admin_login') {
            redirect(base_url('auth'));
        }
    }

    public function index()
    {
        $data['siswa'] = $this->db->query('SELECT tb_siswa.*, tb_kelas.nama_kelas FROM tb_siswa JOIN tb_kelas ON tb_siswa.id_kelas = tb_kelas.id_kelas')->result();
        $data['kelas'] = $this->m_data->get_data('tb_kelas')->result();
        $this->load->view('admin/v_siswa', $data);
    }

    public function siswa_aksi()
    {
        $nama     = $this->input->post('nama');
        $nis      = $this->input->post('nis');
        $kelas    = $this->input->post('kelas');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data = array(
            'nama_siswa' => $nama,
            'nis'        => $nis,
            'id_kelas'   => $kelas,
            'username'   => $username,
            'password'   => $password,
        );

        $this->m_data->insert_data($data, 'tb_siswa');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-message"><i class="icon fa fa-check"></i><b>Selamat! <br></b> Anda telah berhasil menambahkan data siswa</div>');
        redirect(base_url('siswa'));
    }

    public function hapus($id)
    {
        $where = array('id_siswa' => $id);
        $this->m_data->delete_data($where, 'tb_siswa');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message"><i class="icon fa fa-check"></i><b>Selamat! <br></b> Anda telah berhasil menghapus data siswa</div>');
        redirect(base_url('siswa'));
    }

    public function edit($id)
    {
        $where = array('id_siswa' => $id);
        $query = $this->m_data->edit_data($where, 'tb_siswa');
    
        if ($query !== false) {
            $data['siswa'] = $query->result();
            $data['kelas'] = $this->m_data->get_data('tb_kelas')->result(); // Pastikan data kelas juga dikirim ke view
            $this->load->view('admin/v_siswa_edit', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message"><i class="icon fa fa-times"></i><b>Maaf! <br></b> Terjadi kesalahan saat mengambil data siswa</div>');
            redirect(base_url('siswa'));
        }
    }    

    public function update()
    {
        $id       = $this->input->post('id');
        $nama     = $this->input->post('nama');
        $nis      = $this->input->post('nis');
        $kelas    = $this->input->post('kelas');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $where = array('id_siswa' => $id);

        if ($password == "") {
            $data = array(
                'nama_siswa' => $nama,
                'nis'        => $nis,
                'id_kelas'   => $kelas,
                'username'   => $username
            );
        } else {
            $data = array(
                'nama_siswa' => $nama,
                'nis'        => $nis,
                'id_kelas'   => $kelas,
                'username'   => $username,
                'password'   => $password
            );
        }

        if ($this->m_data->update_data($where, $data, 'tb_siswa')) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-message"><i class="icon fa fa-check"></i><b>Selamat! <br></b> Anda telah berhasil mengupdate data siswa</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message"><i class="icon fa fa-times"></i><b>Maaf! <br></b> Terjadi kesalahan saat mengupdate data siswa</div>');
        }

        redirect(base_url('siswa'));
    }
}
