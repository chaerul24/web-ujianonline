<?php $this->load->view('admin/head'); ?>
<?php $this->load->view('admin/topbar'); ?>
<?php $this->load->view('admin/sidebar'); ?>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success" style="overflow-x: scroll;">
                <div class="box-header with-border">
                    <center><h3 class="box-title">Edit Data</h3></center>
                </div>
                <?php if (!empty($kelas)) { foreach ($kelas as $k): ?>
                    <form action="<?= base_url('kelas/update'); ?>" method="post" class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama Kelas</label>
                                <input type="hidden" name="id" value="<?= $k->id_kelas; ?>">
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama" value="<?= $k->nama_kelas; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10">
                                    <a href="<?= base_url('kelas') ?>" class="btn btn-default btn-flat"><span class="fa fa-arrow-left"></span> Batal</a>
                                    <button type="submit" class="btn btn-primary btn-flat"><span class="fa fa-save"></span> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php endforeach; } else { ?>
                    <div class="alert alert-danger">Data tidak ditemukan!</div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('admin/js'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#data').DataTable();  // Changed to DataTable with capital D
    });

    $('.select2').select2();
    $('.alert-message').alert().delay(3000).slideUp('slow');
</script>
<?php $this->load->view('admin/foot'); ?>
