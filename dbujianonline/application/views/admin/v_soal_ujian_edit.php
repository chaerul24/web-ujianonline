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
                <div class="box-header with-border">
                    <center><h3 class="box-title">Edit Data</h3></center>
                </div>
                <div class="box-body">
                    <form action="<?= base_url('soal_ujian/update');?>" method="post" class="form-horizontal">
                        <input type="hidden" name="id" value="<?= $soal->id_soal_ujian; ?>" />
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tulis Soal Ujian</label>
                            <div class="col-sm-10">
                                <textarea name="soal" class="soal" required><?= $soal->pertanyaan; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Ranah Kognitif</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="ranah_kognitif">
                                    <option value='C1' <?= ($soal->ranah_kognitif == 'C1') ? 'selected' : '' ?>>C1</option>
                                    <option value='C2' <?= ($soal->ranah_kognitif == 'C2') ? 'selected' : '' ?>>C2</option>
                                    <option value='C3' <?= ($soal->ranah_kognitif == 'C3') ? 'selected' : '' ?>>C3</option>
                                    <option value='C4' <?= ($soal->ranah_kognitif == 'C4') ? 'selected' : '' ?>>C4</option>
                                    <option value='C5' <?= ($soal->ranah_kognitif == 'C5') ? 'selected' : '' ?>>C5</option>
                                    <option value='C6' <?= ($soal->ranah_kognitif == 'C6') ? 'selected' : '' ?>>C6</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jawaban A</label>
                            <div class="col-sm-10">
                                <textarea rows="2" style="width: 100%" name="a" required><?= $soal->a; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jawaban B</label>
                            <div class="col-sm-10">
                                <textarea rows="2" style="width: 100%" name="b" required><?= $soal->b; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jawaban C</label>
                            <div class="col-sm-10">
                                <textarea rows="2" style="width: 100%" name="c" required><?= $soal->c; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jawaban D</label>
                            <div class="col-sm-10">
                                <textarea rows="2" style="width: 100%" name="d" required><?= $soal->d; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jawaban E</label>
                            <div class="col-sm-10">
                                <textarea rows="2" style="width: 100%" name="e" required><?= $soal->e; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Kunci Jawaban</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="kunci">
                                    <option value="A" <?= ($soal->kunci_jawaban == 'A') ? 'selected' : '' ?>>A</option>
                                    <option value="B" <?= ($soal->kunci_jawaban == 'B') ? 'selected' : '' ?>>B</option>
                                    <option value="C" <?= ($soal->kunci_jawaban == 'C') ? 'selected' : '' ?>>C</option>
                                    <option value="D" <?= ($soal->kunci_jawaban == 'D') ? 'selected' : '' ?>>D</option>
                                    <option value="E" <?= ($soal->kunci_jawaban == 'E') ? 'selected' : '' ?>>E</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="button" class="btn btn-default btn-flat" onclick="window.history.back();" title="Kembali ke halaman sebelumnya"><span class="fa fa-arrow-left"></span> Kembali</button>
                                <button type="submit" class="btn btn-primary btn-flat" title="Simpan Perubahan"><span class="fa fa-save"></span> Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->

<?php
$this->load->view('admin/js');
?>

<!-- tambahkan custom js disini -->
<script type="text/javascript">
    $(document).ready(function() {
        $('.soal').summernote({
            height: 200,
        });
    });
</script>

<?php
$this->load->view('admin/foot');
?>
