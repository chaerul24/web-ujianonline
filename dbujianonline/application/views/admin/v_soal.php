<?php
    $this->load->view('admin/head');
    ?>
    <!--tambahkan custom css disini-->

    <head>
    <!-- Tambahkan CKEditor script -->
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    </head>

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

                <div class="box box-success" style="overflow-x: scroll;">
                <div class="box-header">
                    


                                <!-- /. modal  -->
                    <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            <center><h4 class="modal-title">Tambah Materi Pelajaran</h4></center>
                        </div>
                        <!-- /.form dengan modal -->
                        <form method="post" action="<?php echo base_url().'materi_pelajaran/materi_pelajaran_aksi'; ?>">
                            <div class="modal-body">    
                            <div class="form-group">
                                <label class="font-weight-bold">Nama Materi Pelajaran</label>
                                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Materi Pelajaran" required="">
                            </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-success btn-flat" style="background-color: #337CCF">Simpan</button>
                            </div>
                        </form>
                        <!-- /.tutup form dengan modal  -->
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->

                        <center><div class="box-title">Tambah Soal Ujian</div></center>

                    </div><!-- /.box-header -->
                    <form action="<?= base_url('soal/soal_aksi'); ?>" method="post">
    <div class="box-body">
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-2 control-label">Tulis Soal Ujian</label>
                <div class="col-sm-10">
                    <textarea name="pertanyaan" class="form-control" id="editor" rows="8"></textarea>
                    <i class="text-danger"><?= form_error('pertanyaan') ?></i>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Ranah Kognitif</label>
                <div class="col-sm-10">
                    <select class="form-control" name="ranah_kognitif" required>
                        <option selected="selected" disabled="" value="">- Pilih Ranah Kognitif -</option>
                        <option value='C1'>C1</option>
                        <option value='C2'>C2</option>
                        <option value='C3'>C3</option>
                        <option value='C4'>C4</option>
                        <option value='C5'>C5</option>
                        <option value='C6'>C6</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Jawaban A</label>
                <div class="col-sm-10">
                    <textarea rows="2" style="width: 100%" name="a" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Jawaban B</label>
                <div class="col-sm-10">
                    <textarea rows="2" style="width: 100%" name="b" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Jawaban C</label>
                <div class="col-sm-10">
                    <textarea rows="2" style="width: 100%" name="c" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Jawaban D</label>
                <div class="col-sm-10">
                    <textarea rows="2" style="width: 100%" name="d" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Jawaban E</label>
                <div class="col-sm-10">
                    <textarea rows="2" style="width: 100%" name="e" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Kunci Jawaban</label>
                <div class="col-sm-10">
                    <select class="form-control" name="kunci" required>
                        <option selected="selected" disabled="" value="">- Pilih Kunci Jawaban -</option>
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                        <option>D</option>
                        <option>E</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-flat" style="background-color: #337CCF">Simpan</button>
            </div>
        </div>
    </div>
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
        $(function() {
            $('#data-tables').dataTable();
        });

        $('.select2').select2();

        $('.alert-message').alert().delay(3000).slideUp('slow');

        CKEDITOR.replace('editor');
    </script>

    <?php
    $this->load->view('admin/foot');
    ?>