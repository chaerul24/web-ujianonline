<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_soal extends CI_Model {

    public function get_joinsoal($id)
    {
        $query = 'SELECT * FROM tb_soal_ujian join tb_materi_pelajaran ON tb_soal_ujian.id_materi_pelajaran=tb_materi_pelajaran.id_materi_pelajaran WHERE tb_soal_ujian.id_soal_ujian="'.$id.'"';
        return $this->db->query($query);
    }

    public function update_data($where, $data, $table) {
        $this->db->where($where);
        $this->db->update($table, $data);
        log_message('debug', 'Query update: ' . $this->db->last_query());
    }
}
?>
