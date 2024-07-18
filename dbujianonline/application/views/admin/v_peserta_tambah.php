<!-- Load Views -->
<?php 
$this->load->view('admin/head');
$selected_siswa = $this->input->post('id');
?>
<!--tambahkan custom css disini-->
<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap-datepicker.min.css'); ?>">
<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/bootstrap-datepicker.min.js'); ?>"></script>

<?php
$this->load->view('admin/topbar');
$this->load->view('admin/sidebar');
?>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?= $this->session->flashdata('message'); ?>
        </div>

        <div class="col-md-12">
            <div class="box box-success" style="overflow-x: scroll;">
                <div class="box-header with-border">
                    <center><h3 class="box-title">Tambah Peserta Ujian</h3></center>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="" method="get">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Pilih Kelas</label>
                            <div class="col-sm-10">
                                <select class="select2 form-control" name="kelas" required="">
                                    <option selected="selected" disabled="" value="">- Pilih Kelas -</option>
                                    <?php foreach($kelas as $a) { ?>
                                        <option value="<?=$a->id_kelas?>"><?= $a->nama_kelas;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary btn-flat" title="Pilih Kelas">Pilih Kelas</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.col-->

        <div class="col-md-12">
            <div class="box box-success" style="overflow-x: scroll;">
                <form class="form-horizontal" action="<?=base_url('peserta_tambah/insert_');?>" method="post">
                    <div class="box-body">
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tanggal Ujian</label>
                            <div class="col-sm-10">
                                <div class="input-group date" id="datepicker">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="date" class="form-control pull-right" id="date" name="tanggal_ujian" placeholder="Pilih tanggal" autocomplete="off" required="">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jam Ujian</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                    <input type="time" class="form-control" id="time" name="jam_ujian" required="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jenis Ujian</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="id_jenis_ujian" required>
                                    <option selected="selected" disabled="" value="">- Pilih Jenis Ujian -</option>
                                    <?php foreach ($jenis_ujian as $a) { ?>
                                        <option value="<?= $a->id_jenis_ujian ?>"><?= $a->jenis_ujian; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>


                    <div class="box-body">
                        <table id="data" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Nama siswa</th>
                                    <th>NIS</th>
                                    <th>Kelas</th>
                                    <th width="13%">
                                        <input type="checkbox" class="check-all" id="cek-semua"/> Pilih Semua
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $no=1;
                                foreach($siswa as $d) { 
                                    // Tentukan apakah siswa dipilih atau tidak
                                    $checked = (isset($selected_siswa) && is_array($selected_siswa) && in_array($d->id_siswa, $selected_siswa)) ? 'checked' : '';
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d->nama_siswa; ?></td>
                                    <td><?php echo $d->nis; ?></td>
                                    <td><?php echo $d->nama_kelas; ?></td>
                                    <td>
                                        <!-- Tambahkan properti checked -->
                                        <input type="checkbox" name="id[]" value="<?php echo $d->id_siswa; ?>" <?php echo $checked; ?> />
                                        </td>
                                </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>

                    <div class="box-footer">
                        <a href="<?=base_url('peserta')?>" class="btn btn-default btn-flat"><span class="fa fa-arrow-left"></span> Kembali</a>
                        <button type="submit" class="btn btn-primary btn-flat"><span class="fa fa-save"></span> Simpan</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
        <!-- /.col-->
    </div>
    <!-- ./row -->
</section><!-- /.content -->

<?php 
$this->load->view('admin/js');
?>

<!--tambahkan custom js disini-->
<script type="text/javascript">
   $(document).ready(function(){
    $('#datepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd',
        todayHighlight: true
    });

    // Fungsi untuk menangani perubahan pada kotak centang siswa individual
    $('input[name="id[]"]').change(function() {
        // Hapus centang dari semua kotak centang kecuali yang baru saja dipilih
        $('input[name="id[]"]').not(this).prop('checked', false);
    });

    // Nonaktifkan fungsi yang mencentang semua kotak centang saat "Pilih Semua" diklik
    $('#cek-semua').click(function(){
        $('input:checkbox').prop('checked', this.checked);
    });
});
</script>

<script>
    $(document).ready(function(){
        // Menggunakan class selector untuk memilih semua checkbox
        $('.single-checkbox').click(function() {
            // Jika checkbox saat ini dicentang
            if ($(this).is(':checked')) {
                // Uncheck semua checkbox kecuali checkbox yang saat ini dipilih
                $('.single-checkbox').not(this).prop('checked', false);  
            }
        });
    });
</script>



<script type="text/javascript">
    $('#cek-semua').click(function(){
        $('input:checkbox').prop('checked', this.checked);
    });

    $(function(){
        $('#data').dataTable();
    });

    $('#datepicker').datepicker({
        autoclose: true,
        todayHighlight: true,
        orientation: "bottom auto",
        format: 'yyyy-mm-dd'
    });

    $('#date').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    });

    $('#timepicker').timepicker({
        showInputs: false,
        showMeridian: false
    });

    $('#time').timepicker({
        showInputs: false,
        showMeridian: false
    });

    $('.select2').select2();

    $('.alert-dismissible').alert().delay(3000).slideUp('slow');
</script>

<?php
$this->load->view('admin/foot');
?>
