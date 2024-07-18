<?php
$this->load->view('admin/head');
?>

<!-- tambahkan custom css disini -->

<?php
$this->load->view('admin/topbar');
$this->load->view('admin/sidebar');
?>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success" style="overflow-x: scroll;">
                <div class="box-header">
                    <center><h4 class="box-title">Daftar Soal Ujian</h4></center>
                    <a href="<?= base_url('soal') ?>"><button type="button" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Tambah</button></a>
                </div>
                <div class="box-body">
                    <?= $this->session->flashdata('message'); ?>
                    <?php if (isset($soal_ujian) && !empty($soal_ujian)): ?>
                        <table id="data" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pertanyaan</th>
                                    <th>Ranah Kognitif</th>
                                    <th>Pilihan Ganda</th>
                                    <th>Kunci Jawaban</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($soal_ujian as $d) { ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $d->pertanyaan; ?></td>
                                        <td><?php echo $d->ranah_kognitif; ?></td>
                                        <td>
                                            <ol type="A">
                                                <li><?php echo ($d->kunci_jawaban == 'A') ? "<b>{$d->a}</b>" : $d->a; ?></li>
                                                <li><?php echo ($d->kunci_jawaban == 'B') ? "<b>{$d->b}</b>" : $d->b; ?></li>
                                                <li><?php echo ($d->kunci_jawaban == 'C') ? "<b>{$d->c}</b>" : $d->c; ?></li>
                                                <li><?php echo ($d->kunci_jawaban == 'D') ? "<b>{$d->d}</b>" : $d->d; ?></li>
                                                <li><?php echo ($d->kunci_jawaban == 'E') ? "<b>{$d->e}</b>" : $d->e; ?></li>
                                            </ol>
                                        </td>
                                        <td><?php echo $d->kunci_jawaban; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-warning btn-flat btn-xs">Action</button>
                                                <button type="button" class="btn btn-warning btn-flat btn-xs dropdown-toggle" data-toggle="dropdown">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="<?= base_url('soal_ujian/edit/') . $d->id_soal_ujian; ?>">Edit Data</a></li>
                                                    <li><a href="<?= base_url('soal_ujian/hapus/') . $d->id_soal_ujian; ?>" onclick="return confirm('Apakah yakin data ini dihapus?')">Hapus Data</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p>No questions available.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- ./row -->
</section><!-- /.content -->

<?php
$this->load->view('admin/js');
?>

<!-- tambahkan custom js disini -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- Include DataTables JS -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#data').dataTable();

    $('.alert-message').alert().delay(3000).slideUp('slow');
});

    CKEDITOR.replace('deskripsi');
</script>
<?php
$this->load->view('admin/foot');
?>
