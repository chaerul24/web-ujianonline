<?php 
$this->load->view('admin/head');
?>
<!--tambahkan custom css disini-->

<?php
$this->load->view('admin/topbar');
$this->load->view('admin/sidebar');
?>
<!-- Content Header (Page header) -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success" style="overflow-x: scroll;">
                <div class="box-header with-border">
                    <center><h3 class="box-title">Edit Data</h3></center>
                </div>
                <?php
                
                if (!empty($siswa)) { foreach ($siswa as $a) { ?>
                    <!-- form start -->
                    <form action="<?= base_url('siswa/update'); ?>" method="post" class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama Siswa</label>
                                <input type="hidden" name="id" value="<?= isset($a->id_siswa) ? $a->id_siswa : ''; ?>">
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama" value="<?= isset($a->nama_siswa) ? $a->nama_siswa : ''; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">NIS (Nomor Induk Siswa)</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nis" value="<?= isset($a->nis) ? $a->nis : ''; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama Kelas</label>
                                <div class="col-sm-10">
                                    <select class="select2 form-control" name="kelas" required="">
                                        <?php foreach ($kelas as $k) { ?>
                                            <option value="<?= $k->id_kelas ?>" <?php if ($a->id_kelas == $k->id_kelas) { echo "selected"; } ?>><?= $k->nama_kelas; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="username" value="<?= isset($a->username) ? $a->username : ''; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password" value="<?= isset($a->password) ? $a->password : ''; ?>" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10">
                                    <a href="<?= base_url('siswa') ?>" class="btn btn-default btn-flat"><span class="fa fa-arrow-left"></span> Batal</a>
                                    <button type="submit" class="btn btn-primary btn-flat" title="Simpan Data Pengawas"><span class="fa fa-save"></span> Simpan</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer"></div> 
                        <!-- /.box-footer -->
                    </form>
                <?php } } else { ?>
                    <div class="alert alert-danger">Data tidak ditemukan!</div>
                <?php } ?>
            </div>
        </div>
    </div>
</section><!-- /.content -->


<?php 
$this->load->view('admin/js');
?>
<!--tambahkan custom js disini-->

<script type="text/javascript">
  $(document).ready(function() {
    $('#data').dataTable();
  });

  $('.select2').select2();

  $('.alert-message').alert().delay(3000).slideUp('slow');
</script>

<?php
$this->load->view('admin/foot');
?>