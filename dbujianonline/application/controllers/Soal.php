<?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Soal extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            if ($this->session->userdata('status') != 'admin_login') {
                if ($this->session->userdata('status') != 'guru_login') {
                    redirect('auth');
                }
            }
            $this->load->model('m_data');
        }

        public function index()
        {
            $data['soal'] = $this->m_data->get_data('tb_materi_pelajaran')->result();
            $this->load->view('admin/v_soal', $data);
        }

        // public function insert()
        // {
        //     $materipelajaran = $this->input->post('materi_pelajaran');
        //     $soal = $this->input->post('soal');
        //     $a = $this->input->post('a');
        //     $b = $this->input->post('b');
        //     $c = $this->input->post('c');
        //     $d = $this->input->post('d');
        //     $e = $this->input->post('e');
        //     $kunci = $this->input->post('kunci');

        //     $data = array(
        //         'id_materi_pelajaran' => $materipelajaran,
        //         'pertanyaan' => $soal,
        //         'a' => $a,
        //         'b' => $b,
        //         'c' => $c,
        //         'd' => $d,
        //         'e' => $e,
        //         'kunci_jawaban' => $kunci
        //     );

        //     // Debugging output
        //     log_message('debug', 'Data to be inserted: ' . json_encode($data));

        //     // Insert the data into the database
        //     if ($this->m_data->insert_data('tb_soal_ujian', $data)) {
        //         // Redirect to the desired page, e.g., back to the question list
        //         redirect('soal');
        //     } else {
        //         // Log the error
        //         log_message('error', 'Failed to insert data');
        //         // Show an error message or redirect
        //         show_error('Failed to insert data into the database.');
        //     }
        // }

        public function soal_aksi()
        {
            $soal = $this->input->post('pertanyaan');
            $ranah_kognitif = $this->input->post('ranah_kognitif');
            $a = $this->input->post('a');
            $b = $this->input->post('b');
            $c = $this->input->post('c');
            $d = $this->input->post('d');
            $e = $this->input->post('e');
            $kunci = $this->input->post('kunci');    

                $data = array(
                            'pertanyaan' => $soal,
                            'ranah_kognitif' => $ranah_kognitif,
                            'a' => $a,
                            'b' => $b,
                            'c' => $c,
                            'd' => $d,
                            'e' => $e,
                            'kunci_jawaban' => $kunci
                        );

            $this->m_data->insert_data($data, 'tb_soal_ujian');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-message"><i class="icon fa fa-check"></i><b>Selamat ! <br></b> Anda telah berhasil menambahkan data soal</div>');
            redirect(base_url('soal_ujian/index'));
        }



        public function edit($id)
        {
            $data['soal'] = $this->m_data->get_joinsoal($id)->result();
            $data['kelas'] = $this->m_data->get_data('tb_materi_pelajaran')->result();        
            $this->load->view('admin/v_soal_edit', $data);        
        }

        public function update()
    {
        $id                        = $this->input->post('id');
        $soal                      = $this->input->post('pertanyaan');
        $ranah_kognitif            = $this->input->post('ranah_kognitif');
        $a                         = $this->input->post('a');
        $b                         = $this->input->post('b');
        $c                         = $this->input->post('c');
        $d                         = $this->input->post('d');
        $e                         = $this->input->post('e');
        $kunci                     = $this->input->post('kunci');

        $where = array('id_soal_ujian' => $id);
        $data = array(
            'pertanyaan'                 => $soal,
            'ranah_kognitif'             => $ranah_kognitif,
            'a'                          => $a,
            'b'                          => $b,
            'c'                          => $c,
            'd'                          => $d,
            'e'                          => $e,
            'kunci_jawaban'              => $kunci
        );

        $this->m_data->update_data($where, $data, 'tb_soal_ujian');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Selamat, Soal telah berhasil diupdate!</h4></div>');
        redirect(base_url('soal'));
    }
        public function hapus($id) 
        {
            $where = array('id_soal_ujian' => $id);
            $this->m_data->delete_data($where, 'tb_soal_ujian');
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Perhatian, Data telah berhasil dihapus!</h4></div>');
            redirect(base_url('soal'));
        }
    }
