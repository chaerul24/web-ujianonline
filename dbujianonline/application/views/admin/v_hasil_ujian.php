<?php
$this->load->view('admin/head');
?>

<!--tambahkan custom css disini-->

<?php
$this->load->view('admin/topbar');
$this->load->view('admin/sidebar');
?>


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="box box-success" style="overflow-x: scroll;">
                <div class="box-header">
                    <center>
                        <h4 class="box-title">Hasil Ujian</h4>
                    </center>
                </div>
                <form action="" method="get" class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Materi Pelajaran</label>
                            <div class="col-sm-10">
                                <select class="select2 form-control" name="id" required="">
                                    <option selected="selected" disabled="">- Pilih Materi Pelajaran -</option>
                                    <?php foreach ($kelas as $a) { ?>
                                        <option value="<?= $a->id_materi_pelajaran ?>"> | <?= $a->materi_pelajaran; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <a href="<?= base_url('hasil_ujian'); ?>" class="btn btn-default btn-flat"><span class="fa fa-refresh"></span> Refresh</a>
                                <button type="submit" class="btn btn-primary btn-flat" title="Filter Data Soal Ujian"><span class="fa fa-filter"></span> Filter</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">

                    </div>
                    <!-- /.box-footer -->
                </form>

            </div>

            <!-- Default box -->
            <div class="box box-success" style="overflow-x: scroll;">
                <div class="box-header">
                    <?php if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                    ?>
                        <a href="<?= base_url() . 'hasil_ujian/print_all?id=' . $id ?>" class="btn btn-danger btn-flat" target="_blank"><i class="fa fa-file-pdf-o"></i> Cetak Sesuai Filter</a>
                    <?php } ?>

                    <a href="<?= base_url('hasil_ujian/print_all') ?>" class="btn btn-primary btn-flat pull-right" target="_blank"><i class="fa fa-print"></i> Cetak Semua Hasil Ujian</a>
                </div>
                <div class="box-body">
                    <table id="data" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Nama Siswa</th>
                                <th>NIS</th>
                                <th>Tanggal Ujian</th>
                                <th>Jam Ujian</th>
                                <th>Jenis Ujian</th>
                                <th>Benar</th>
                                <th>Salah</th>
                                <th>Nilai</th>
                                <th>Cetak</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($hasil as $d) {
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d->nama_siswa; ?></td>
                                    <td><?php echo $d->nis; ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($d->tanggal_ujian)); ?></td>
                                    <td><?php echo date('H:i:s', strtotime($d->jam_ujian)); ?></td>
                                    <td><?php echo $d->jenis_ujian; ?></td>
                                    <td>
                                        <?php
                                        if (isset($d->benar) && $d->benar !== '') {
                                            echo $d->benar;
                                        } else {
                                            echo "<span class='btn btn-xs btn-default'>Belum Ujian</span>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if (isset($d->salah) && $d->salah !== '') {
                                            echo $d->salah;
                                        } else {
                                            echo "<span class='btn btn-xs btn-default'>Belum Ujian</span>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if (isset($d->nilai) && $d->nilai !== '') {
                                            echo $d->nilai;
                                        } else {
                                            echo "<span class='btn btn-xs btn-default'>Belum Ujian</span>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if (isset($d->nilai) && $d->nilai !== '') {
                                            echo "<a href='" . base_url('hasil_ujian/cetak/' . $d->id_peserta) . "' class='btn btn-xs btn-danger' title='Cetak Hasil Ujian dalam PDF' target='_blank'><span class='fa fa-file-pdf-o'></span></a>";
                                        } else {
                                            echo "<span class='btn btn-xs btn-default'>Belum Ujian</span>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php if (isset($d->nilai) && $d->nilai !== '') : ?>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalJawaban<?= $d->id_peserta ?>">
                                                <span class='fa fa-search'></span>
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="modalJawaban<?= $d->id_peserta ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <!-- pdf -->
                                                        <iframe id="pdf_cetak" width="100%"  height="500" src="<?= base_url('hasil_ujian/cetak_jawaban/' . $d->id_peserta); ?>."></iframe>
                                                        <script>
                                                            let zoomLevel = 1;
                                                            var iframe = document.getElementById("pdf_cetak");
                                                            iframe.style.transform = `scale(1)`;
                                                            iframe.style.transformOrigin = '0 0';

                                                            function adjustIframeHeight() {
                                                                const iframeContentHeight = iframe.contentWindow.document.body.scrollHeight;
                                                                iframe.style.height = `${iframeContentHeight * zoomLevel}px`;
                                                            }
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php else : ?>
                                            <button type="button" class="btn btn-primary btn-xs" disabled><span class='fa fa-search'></span></button>
                                        <?php endif; ?>
                                    </td>
                                    <!-- <td>Jawaban Nomor <?= $d->id_soal_ujian . ", " . ($d->skor == 1 ? 'Benar' : 'Salah') . ', ' . $d->jawaban; ?></td> -->

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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
        $('#data').dataTable();
        $('.select2').select2();
    });

    $('.alert-message').alert().delay(3000).slideUp('slow');
</script>
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


    // Remove input field for Alur Tujuan Pembelajaran
    $(document).on('click', '.removeAlurButton', function() {
        $(this).parent('.alur-group').remove();
    });
</script>
<?php
$this->load->view('admin/foot');
?>