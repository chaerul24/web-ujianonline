<!-- admin/student_detail.php -->
<?php $this->load->view('admin/head'); ?>

<?php $this->load->view('admin/topbar'); ?>
<?php $this->load->view('admin/sidebar'); ?>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header">
                    <h4 class="box-title">Detail Jawaban Siswa</h4>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No. Soal</th>
                                <th>Jawaban Siswa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $nomor_soal; ?></td>
                                <td><?php echo $jawaban_siswa->jawaban; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('admin/js'); ?>
<!-- Custom JS -->
<script>
    $(document).ready(function() {
        // Tambahkan skrip JS kustom jika diperlukan
    });
</script>

<?php $this->load->view('admin/foot'); ?>
