<?php 
$this->load->view('admin/head');
?>
<!-- tambahkan custom css disini -->
<style>
    .alur-group {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }
    .alur-group input {
        flex: 1;
        margin-right: 10px;
    }
    .alur-group .removeAlurButton {
        background-color: #d9534f;
        color: white;
        border: none;
        padding: 5px 10px;
    }
    #addAlurButton {
        background-color: #337CCF;
        color: white;
        border: none;
        padding: 5px 10px;
    }
</style>

<?php
$this->load->view('admin/topbar');
$this->load->view('admin/sidebar');
?>
<!-- Content Header (Page header) -->

<!-- Main content -->
<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-success" style="overflow-x: auto;">
            <div class="box-header with-border">
                <center><h3 class="box-title">Edit Data</h3></center>
            </div>
            <!-- /.box-header -->
            <?php if (isset($materi_pelajaran)) { ?>
            <!-- form start -->
            <form action="<?=base_url('materi_pelajaran/update');?>" method="post" class="form-horizontal" enctype="multipart/form-data">
              <div class="box-body">
                <input type="hidden" name="id_materi_pelajaran" value="<?= $materi_pelajaran->id_materi_pelajaran;?>">
                <input type="hidden" name="old_file" value="<?= $materi_pelajaran->file;?>">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Materi Pelajaran</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="materi_pelajaran" value="<?= $materi_pelajaran->materi_pelajaran;?>" required>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Alur Tujuan Pembelajaran</label>
                  <div class="col-sm-10" id="alurContainer">
                    <?php 
                    $alur = explode(',', $materi_pelajaran->alur_tujuan_pembelajaran);
                    foreach($alur as $a): ?>
                    <div class="alur-group">
                      <input type="text" class="form-control" name="alur_tujuan_pembelajaran[]" value="<?= $a; ?>" required>
                      <button type="button" class="btn removeAlurButton">Hapus</button>
                    </div>
                    <?php endforeach; ?>
                  </div>
                  <div class="col-sm-10 col-sm-offset-2">
                    <button type="button" class="btn btn-success mt-2" id="addAlurButton">Tambah Alur Tujuan Pembelajaran</button>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Deskripsi</label>
                  <div class="col-sm-10">
                    <textarea name="deskripsi" class="form-control" id="editor" rows="8"><?= $materi_pelajaran->deskripsi;?></textarea>
                  </div>
                </div>


                <div class="form-group">
                  <div class="col-sm-10 col-sm-offset-2">
                    <a href="<?=base_url('materi_pelajaran')?>" class="btn btn-default btn-flat"><span class="fa fa-arrow-left"></span> Batal</a>
                    <button type="submit" class="btn btn-primary btn-flat" title="Simpan Data"><span class="fa fa-save"></span> Simpan</button>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer"></div> 
              <!-- /.box-footer -->
            </form>
            <?php } else { ?>
              <div class="alert alert-danger">Data tidak ditemukan.</div>
            <?php } ?>
        </div>
    </div>
</div>
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
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#data').DataTable();

    $('.alert-message').alert().delay(3000).slideUp('slow');

    CKEDITOR.replace('editor');

    // Add new input field for Alur Tujuan Pembelajaran
    $('#addAlurButton').click(function(){
      $('#alurContainer').append('<div class="alur-group mt-2"><input type="text" class="form-control" name="alur_tujuan_pembelajaran[]" placeholder="Masukkan Alur Tujuan Pembelajaran" required><button type="button" class="btn removeAlurButton">Hapus</button></div>');
    });

    // Remove input field for Alur Tujuan Pembelajaran
    $(document).on('click', '.removeAlurButton', function(){
      $(this).parent('.alur-group').remove();
    });
  });
</script>

<style>
    .alur-group {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }
    .alur-group input {
        flex: 1;
        margin-right: 10px;
    }
    .alur-group .removeAlurButton {
        background-color: #337CCF;
        color: white;
        border: none;
        padding: 5px 10px;
    }
    #addAlurButton {
        background-color: #337CCF;
        color: white;
        border: none;
        padding: 5px 10px;
    }
</style>
<?php
$this->load->view('admin/foot');
?>
