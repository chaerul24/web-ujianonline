<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('status') != 'admin_login') {
            redirect(base_url('auth'));
        }
        $this->load->model('m_peserta'); // Memuat model M_peserta
        $this->load->model('m_data');
    }

    public function index() {
        $idkls = $this->input->get('idkls');
        $idsiswa = $this->input->get('idsiswa');

        if (isset($idkls) && isset($idsiswa)) {
            $query = $this->m_peserta->get_peserta($idkls, $idsiswa);
        } elseif (isset($idkls)) {
            $query = $this->m_peserta->get_peserta2($idkls);
        } elseif (isset($idsiswa)) {
            $query = $this->m_peserta->get_peserta3($idsiswa);
        } else {
            $query = $this->m_peserta->get_peserta4();
        }

        if ($query) {
            $data['peserta'] = $query->result();
        } else {
            $data['peserta'] = [];
        }

        $data['kelas'] = $this->m_data->get_data('tb_kelas')->result();
        $data['siswa'] = $this->m_data->get_data('tb_siswa')->result();

        $this->load->view('admin/v_peserta', $data);
    }

    public function update() {
        $id = $this->input->post('id');
        $peserta = $this->input->post('peserta');
        $tanggal = $this->input->post('tanggal');
        $jam = $this->input->post('jam');
        $jenis = $this->input->post('jenis');

        // Log untuk debugging
        log_message('debug', 'Data yang diterima: ' . print_r($this->input->post(), true));

        if (empty($peserta) || empty($tanggal) || empty($jam) || empty($jenis)) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Semua field harus diisi semua !</h4></div>');
            redirect(base_url('peserta'));
        } else {
            $data = array(
                'id_siswa' => $peserta,
                'id_jenis_ujian' => $jenis,
                'tanggal_ujian' => $tanggal,
                'jam_ujian' => $jam,
                'status_ujian' => 1
            );

            $where = array('id_peserta' => $id);
            $this->m_peserta->update_data($where, $data, 'tb_peserta'); // Menggunakan model M_peserta untuk update

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Data berhasil di Update.</h4></div>');
            redirect(base_url('peserta'));
        }
    }

    public function hapus($id) {
        $where = array('id_peserta' => $id);
        $this->m_data->delete_data($where, 'tb_peserta');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message"><i class="icon fa fa-check"></i><b>Selamat! <br></b> Anda telah berhasil menghapus data peserta</div>');
        redirect(base_url('peserta'));
    }

    public function edit($id) {
        $where = array('id_peserta' => $id);
        $data['peserta'] = $this->m_data->edit_data($where, 'tb_peserta')->result();
        $data['jenis_ujian'] = $this->m_data->get_data('tb_jenis_ujian')->result();
        $data['siswa'] = $this->m_data->get_data('tb_siswa')->result();
        $this->load->view('admin/v_peserta_edit', $data);
    }
}
?>
