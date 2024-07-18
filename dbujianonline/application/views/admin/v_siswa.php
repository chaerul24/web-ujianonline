<?php
$this->load->view('admin/head');
?>
<!--tambahkan custom css disini-->

<?php
$this->load->view('admin/topbar');
$this->load->view('admin/sidebar');
?>
<!-- Content Header (Page header) -->


<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">

      <?= $this->session->flashdata('message'); ?>

      <!-- Default box -->
      <div class="box box-success" style="overflow-x: scroll;">
        <div class="box-header">
          <center><h4 class="box-title">Data Siswa</h4></center>
          <h3 class="box-title"></h3>
          <?php echo '<button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#modal-data" onclick="$(\'#modal-data-body\').load(\'' . base_url('siswa/create') . '\')"><span class="fa fa-plus"></span> Tambah</button>' ?>

          <a href="<?php echo base_url('kelas'); ?>"><button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#" ><span ></span>Data Kelas</button></a>

          
        </div>
        <!-- /.box-header -->

        <div class="box-body">
        <table id="data" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="1%">No</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Username</th>
            <th>Action</th>
            <!-- <th width="12%"></th> -->
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($siswa as $m) { ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $m->nis; ?></td>
                <td><?php echo $m->nama_siswa; ?></td>
                <td><?php echo $m->nama_kelas; ?></td>
                <td><?php echo $m->username; ?></td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning btn-flat btn-xs">Action</button>
                        <button type="button" class="btn btn-warning btn-xs btn-flat dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?= base_url('siswa/edit/') . $m->id_siswa; ?>">Edit Data</a></li>
                            <li><a href="<?= base_url('siswa/hapus/') . $m->id_siswa; ?>" onclick="return confirm('Apakah yakin data peserta ini di hapus?')">Hapus Data</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
        </div>
      </div>
    </div>
  </div>
</section><!-- /.content -->

<!-- /. modal tambah data siswa  -->
<div class="modal fade" id="modal-data">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Tambah Data siswa</h4></center>

      <!-- /.form dengan modal -->
      <form method="post" action="<?php echo base_url('siswa/siswa_aksi'); ?>">
    <div class="modal-body">
      <div class="form-group">
      <label class="font-weight-bold">Nama</label>
        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Siswa" required="">
      </div>
    <div class="form-group">
      <label class="font-weight-bold">NIS</label>
        <input type="number" class="form-control" name="nis" placeholder="Masukkan NIS Siswa">
      </div>
    <div class="form-group">
      <label class="font-weight-bold">Kelas</label>
        <select class="select2 form-control" name="kelas" required="">
          <?php foreach($kelas as $k) { ?>
            <option value="<?= $k->id_kelas ?>"><?= $k->nama_kelas; ?></option>
          <?php } ?>
        </select>
      </div>
    <div class="form-group">
      <label class="font-weight-bold">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required="">
      </div>
    <div class="form-group">
      <label class="font-weight-bold">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Masukkan Username" required="">
      </div>
    </div>
  <!-- /.box-body -->
  <div class="modal-footer">
    <button type="submit" class="btn btn-primary btn-flat" style="background-color: #337CCF" title="Simpan Data siswa">Simpan</button>
  </div> 
  <!-- /.box-footer -->
</form>
</div>
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