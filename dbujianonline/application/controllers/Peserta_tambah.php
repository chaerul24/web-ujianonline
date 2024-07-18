<?php
class Peserta_tambah extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct();
        if ($this->session->userdata('status') != 'admin_login') {
            redirect(base_url().'auth?alert=belum_login');
        }
        // Load necessary models and libraries here
        // $this->load->model('m_data');
        $this->load->model('m_peserta');
    }

    public function index()
    {
        if (isset($_GET['kelas'])) {
            $id = $this->input->get('kelas');
            $this->db->select('*');
            $this->db->from('tb_siswa');
            $this->db->join('tb_kelas', 'tb_siswa.id_kelas = tb_kelas.id_kelas');
            $this->db->where('tb_kelas.id_kelas', $id);
            $data['siswa'] = $this->db->get()->result();
        } else {
            $this->db->select('*');
            $this->db->from('tb_siswa');
            $this->db->join('tb_kelas', 'tb_siswa.id_kelas = tb_kelas.id_kelas');
            $data['siswa'] = $this->db->get()->result();
        }
        // Simpan data siswa yang dipilih sebelumnya
        $data['soal'] = $this->m_data->get_data('tb_materi_pelajaran')->result();
        $data['selected_siswa'] = $this->input->post('id');
        $data['kelas'] = $this->m_data->get_data('tb_kelas')->result();
        $data['jenis_ujian'] = $this->m_data->get_data('tb_jenis_ujian')->result();
        $this->load->view('admin/v_peserta_tambah', $data);
    }


    public function insert_()
    {
        // $materi_pelajaran = $this->input->post('materi_pelajaran');
        $tanggal_ujian = $this->input->post('tanggal_ujian');
        $jam_ujian = $this->input->post('jam_ujian');
        $jenis_ujian = $this->input->post('id_jenis_ujian');
        $id_siswa = $this->input->post('id'); // Mengambil array dari input 'id[]'
        
        // Periksa apakah ada data yang tidak diisi
        if ($tanggal_ujian == '' || $jam_ujian == '' || $jenis_ujian == '' || empty($id_siswa)) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Input Data Peserta Gagal !</h4> Cek kembali data yang diinputkan.</div>');
            redirect(base_url('peserta_tambah'));
        } else {
            // Lakukan iterasi untuk setiap siswa yang dipilih
            foreach ($id_siswa as $id) {
                // Siapkan data yang akan disimpan
                $data = array(
                    'id_siswa' => $id,
                    'id_jenis_ujian' => $jenis_ujian,
                    'tanggal_ujian' => $tanggal_ujian,
                    'jam_ujian' => $jam_ujian,
                    // Sesuaikan nilai default sesuai kebutuhan
                    'status_ujian' => 1,
                    'status_ujian_ujian' => 'default_value'
                );

                // Lakukan penyimpanan data menggunakan model
                $result = $this->m_peserta->insert_data('tb_peserta', $data);

                // Periksa apakah penyimpanan berhasil
                if (!$result) {
                    // Penanganan jika penyimpanan gagal
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Terjadi kesalahan saat menyimpan data !</h4></div>');
                    redirect(base_url('peserta_tambah'));
                    return; // Jangan lanjutkan iterasi jika ada kegagalan
                }
            }

            // Jika semua data berhasil disimpan
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Peserta Ujian berhasil dibuat !</h4></div>');
            redirect(base_url('peserta'));
        }
    }
}
?>