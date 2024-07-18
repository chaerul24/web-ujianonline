<?php $this->load->view('admin/head'); ?>
<?php $this->load->view('admin/topbar'); ?>
<?php $this->load->view('admin/sidebar'); ?>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?= $this->session->flashdata('message'); ?>
            <div class="box box-success" style="overflow-x: scroll;">
                <div class="box-header">
                    <center><h3 class="box-title">Data Kelas</h3></center>
                    <a href="<?= base_url('siswa') ?>" class="btn btn-default btn-flat"><span class="fa fa-arrow-left"></span> Kembali</a>
                    <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#modal-default"><span class="fa fa-plus"></span> Tambah</button>
                </div>
                <div class="box-body">
                    <table id="data" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Nama Kelas</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($kelas as $m): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $m->nama_kelas; ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-warning btn-flat btn-xs">Action</button>
                                            <button type="button" class="btn btn-warning btn-xs btn-flat dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="<?= base_url('kelas/edit/') . $m->id_kelas; ?>">Edit Data</a></li>
                                                <li><a href="<?= base_url('kelas/hapus/') . $m->id_kelas; ?>" onclick="return confirm('Apakah yakin data ini akan dihapus?')">Hapus Data</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <center><h4 class="modal-title">Tambah Data Kelas</h4></center>
            </div>
            <form method="post" action="<?= base_url('kelas/kelas_aksi'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="font-weight-bold">Nama Kelas</label>
                        <input type="text" class="form-control" name="nama_kelas" placeholder="Masukkan Nama Kelas" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-flat">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$this->load->view('admin/js');
?>
<!--tambahkan custom js disini-->

<script type="text/javascript">
  $(document).ready(function() {
    $('#data').dataTable();
  });

  $('.alert-message').alert().delay(3000).slideUp('slow');
</script>

<?php
$this->load->view('admin/foot');
?>

<!--tambahkan custom js disini-->

<!-- Include jQuery -->
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
</script>

<?php
$this->load->view('admin/foot');
?>