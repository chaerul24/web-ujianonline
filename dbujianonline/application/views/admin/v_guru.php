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
  <div class="row" >
    <div class="col-md-12" >
      <?= $this->session->flashdata('message'); ?>
      <!-- Default box -->
      <div class="box box-success" style="overflow-x: scroll;">
        <div class="box-header">
          <center><h4 class="box-title"> Guru</h4></center>
          <h3 class="box-title"></h3>
          <?php echo '<button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#modal-data" onclick="$(\'#modal-data-body\').load(\'' . base_url('siswa/create') . '\')"><span class="fa fa-plus"></span> Tambah</button>' ?>
        </div>
        <!-- /.box-header -->

        <div class="box-body">
          <table id="data" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="1%">No</th>
                <th>NIP</th>
                <th>Nama Guru</th>
                <th>Username</th>
                <th>Action</th>
                <!-- <th width="12%"></th> -->
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($guru as $m) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $m->nip; ?></td>
                  <td><?php echo $m->nama_guru; ?></td>
                  <td><?php echo $m->username; ?></td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-warning btn-flat btn-xs">Action</button>
                      <button type="button" class="btn btn-warning btn-xs btn-flat dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="<?= base_url('guru/edit/') . $m->id_guru; ?>">Edit Data</a></li>
                        <li><a href="<?= base_url('guru/hapus/') . $m->id_guru; ?>" onclick="return confirm('Apakah yakin data peserta ini di hapus?')">Hapus Data</a></li>
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

<!-- Modal form -->
<div class="modal fade" id="modal-data">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <center><h4 class="modal-title">Tambah Data Guru</h4></center>
            </div>
            <form method="post" action="<?php echo base_url('guru/guru_aksi'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="font-weight-bold">Nama Guru</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Guru" required>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">NIP</label>
                        <input type="number" class="form-control" name="nip" placeholder="Masukkan NIP Guru">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-flat" style="background-color: #337CCF">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
$this->load->view('admin/js');
?>
<!-- tambahkan custom js disini -->


!-- Include jQuery -->
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