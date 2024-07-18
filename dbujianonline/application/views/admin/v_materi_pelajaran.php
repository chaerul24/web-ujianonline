<?php 
$this->load->view('admin/head');
?>
<!-- tambahkan custom css disini -->

<head>
  <!-- Tambahkan CKEditor script -->
  <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
</head>


<?php
$this->load->view('admin/topbar');
$this->load->view('admin/sidebar');
?>
<!-- Content Header (Page header) -->

<section class="content">
  <div class="row"> 
    <div class="col-md-12">
    <?= $this->session->flashdata('message'); ?>
    <!-- Default box -->
    <div class="box box-success" style="overflow-x: scroll;">
        <div class="box-header">
            <center><h4 class="box-title">Materi</h4></center>
            <h3 class="box-title"></h3>
            <?php echo '<button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#modal-data" onclick="$(\'#modal-data-body\').load(\'' . base_url('siswa/create') . '\')"><span class="fa fa-plus"></span> Tambah</button>' ?>
        </div>
        <div class="box-body">
        <table id="data" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="1%">No</th>
                    <th>Materi Pelajaran</th>
                    <th>Alur Tujuan Pembelajaran</th>
                    <th>Deskripsi</th>
                    <th>File</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($materi_pelajaran as $m) { ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $m->materi_pelajaran; ?></td>
                    <td><?php echo $m->alur_tujuan_pembelajaran; ?></td>
                    <td><?php echo $m->deskripsi; ?></td>
                    <td><?php echo $m->file; ?></td>
                    <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-warning btn-flat btn-xs">Action</button>
                      <button type="button" class="btn btn-warning btn-flat btn-xs dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="<?= base_url('materi_pelajaran/edit/') . $m->id_materi_pelajaran; ?>">Edit Data</a></li>
                        <li><a href="<?= base_url('materi_pelajaran/hapus/') . $m->id_materi_pelajaran; ?>" onclick="return confirm('Apakah yakin data peserta ini di hapus?')">Hapus Data</a></li>
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

<div class="modal fade" id="modal-data">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Tambah Materi Pelajaran</h4></center>
      </div>
      <form method="post" action="<?php echo base_url('materi_pelajaran/materi_pelajaran_aksi'); ?>">
        <div class="modal-body">
          <div class="form-group">
            <label class="font-weight-bold">Materi Pelajaran</label>
            <input type="text" class="form-control" name="materi_pelajaran" placeholder="Masukkan Materi Pelajaran" required="">
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Alur Tujuan Pembelajaran</label>
            <div id="alurContainer">
              <div class="alur-group">
                <input type="text" class="form-control" name="alur_tujuan_pembelajaran[]" placeholder="Masukkan Alur Tujuan Pembelajaran" required>
              </div>
            </div>
            </div>
            <button type="button" class="btn btn-success mt-2" id="addAlurButton" style="background-color: #337CCF">Tambah Alur Tujuan Pembelajaran</button>
          </div>
          <div class="modal-body">
          <div class="form-group">
            <label class="font-weight-bold">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" id="editor" rows="8"></textarea>
            <i class="text-danger"><?= form_error('deskripsi') ?></i>
          </div>
          <div class="form-group">
            <label class="font-weight-bold">File</label>
            <input type="file" class="form-control" name="file" placeholder="Masukkan File">
            <i class="text-danger"><?= form_error('file') ?></i>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-flat" style="background-color: #337CCF" title="Simpan Data siswa">Simpan</button>
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

        // Add new input field for Alur Tujuan Pembelajaran
        $('#addAlurButton').click(function(){
    $('#alurContainer').append('<div class="alur-group mt-2" style="margin-bottom: 5px;"><input type="text" class="form-control" name="alur_tujuan_pembelajaran[]" placeholder="Masukkan Alur Tujuan Pembelajaran" required style="margin-bottom: 10px;"><button type="button" class="btn removeAlurButton" style="background-color: #337CCF; color: white; ">Hapus</button></div>');
});

        // Remove input field for Alur Tujuan Pembelajaran
        $(document).on('click', '.removeAlurButton', function(){
            $(this).parent('.alur-group').remove();
        });

    CKEDITOR.replace('deskripsi');
</script>
<?php
$this->load->view('admin/foot');
?>