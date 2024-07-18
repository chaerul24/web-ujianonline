<form action="<?= base_url('siswa/siswa_aksi'); ?>" method="post" class="form-horizontal">
  <div class="box-body">
    <?php if ($this->session->flashdata('message')): ?>
      <div class="alert alert-success">
        <?= $this->session->flashdata('message'); ?>
      </div>
    <?php endif; ?>

    <?php if (validation_errors()): ?>
      <div class="alert alert-danger">
        <?= validation_errors(); ?>
      </div>
    <?php endif; ?>
    
    <div class="form-group">
      <label class="col-sm-2 control-label">Nama</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="nama_siswa" required>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">NIS</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="nis">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Kelas</label>
      <div class="col-sm-10">
        <select class="select2 form-control" name="id_kelas" required>
          <?php foreach($kelas as $k) { ?>
            <option value="<?= $k->id_kelas ?>"><?= $k->nama_kelas; ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Username</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="username" required>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" name="password" required>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
  <div class="box-footer">
    <button type="submit" class="btn btn-primary btn-flat pull-right" title="Simpan Data siswa">Simpan</button>
  </div>
  <!-- /.box-footer -->
</form>
