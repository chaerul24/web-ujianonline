<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruang_ujian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != 'siswa_login') {
            redirect(base_url() . 'auth?alert=belum_login');
        }
        $this->load->model('m_data'); // Pastikan model dimuat
    }

    public function soal()
    {
        $id_peserta = $this->uri->segment(3);
        $peserta = $this->db->query('SELECT * FROM tb_peserta WHERE id_peserta = ?', array($id_peserta))->row_array();

        if ($peserta) {
            $id_materi_pelajaran = $peserta['id_materi_pelajaran'];
            $soal_ujian = $this->db->query('SELECT * FROM tb_soal_ujian WHERE id_materi_pelajaran = ? ORDER BY RAND()', array($id_materi_pelajaran));

            if ($soal_ujian === FALSE) {
                $error = $this->db->error();
                log_message('error', 'Error: ' . $error['message']);
                show_error('Terjadi kesalahan dalam mengambil data soal ujian.');
            } else {
                if ($soal_ujian->num_rows() > 0) {
                    $where = array('id_peserta' => $id_peserta);
                    $data2 = array('status_ujian' => 1);
                    $this->m_data->update_data($where, $data2, 'tb_peserta');

                    $data = array(
                        "soal_ujian" => $soal_ujian->result(),
                        "total_soal" => $soal_ujian->num_rows(),
                        "id" => $peserta
                    );

                    // Debug: Log hasil query
                    log_message('debug', 'Soal Ujian: ' . print_r($data['soal_ujian'], true));
                    
                    $this->load->view('ujian/v_soal_ujian', $data);
                } else {
                    show_error('Tidak ada soal ujian yang ditemukan untuk materi pelajaran ini.');
                }
            }
        } else {
            show_error('Data peserta tidak ditemukan.');
        }
    }

    public function jawab_aksi()
    {
        $id_peserta = $this->input->post('id_peserta');
        $jumlah = $this->input->post('jumlah_soal');
        $id_soal = $this->input->post('soal');
        $jawaban = $this->input->post('jawaban');
        $data = array();

        for ($i = 0; $i < $jumlah; $i++) {
            $nomor = $id_soal[$i];
            $data[] = array(
                'id_peserta' => $id_peserta,
                'id_soal_ujian' => $nomor,
                'jawaban' => $jawaban[$nomor]
            );
        }

        $this->db->insert_batch('tb_jawaban', $data);
        $cek = $this->db->query('SELECT id_jawaban, jawaban, tb_soal_ujian.kunci_jawaban FROM tb_jawaban JOIN tb_soal_ujian ON tb_jawaban.id_soal_ujian = tb_soal_ujian.id_soal_ujian WHERE id_peserta = ?', array($id_peserta));
        foreach ($cek->result_array() as $d) {
            $where = array('id_jawaban' => $d['id_jawaban']);
            $data_update = array(
                'skor' => ($d['jawaban'] == $d['kunci_jawaban']) ? 1 : 0
            );
            $this->m_data->update_data($where, $data_update, 'tb_jawaban');
        }

        $benar = 0;
        $salah = 0;
        $total_nilai = 0;
        foreach ($cek->result_array() as $c) {
            if ($c['jawaban'] == $c['kunci_jawaban']) {
                $benar++;
            } else {
                $salah++;
            }
            $total_nilai += $c['skor'];
        }
        $total_nilai = ($benar / $jumlah) * 100;

        $data = array(
            'benar' => $benar,
            'salah' => $salah,
            'status_ujian' => 2,
            'nilai' => $total_nilai
        );
        $where = array('id_peserta' => $id_peserta);
        $this->m_data->update_data($where, $data, 'tb_peserta');
        redirect(base_url('jadwal_ujian'));
    }
}
?>
