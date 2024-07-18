<?php
$this->load->view('ujian/head');
?>

<!-- tambahkan custom css disini -->
<style>
    #timer_place {
        margin: 0 auto;
        text-align: center;
    }

    #counter {
        border-radius: 7px;
        border: 2px solid gray;
        padding: 7px;
        font-size: 2em;
        font-weight: bolder;
    }
</style>

<?php
$this->load->view('ujian/topbar');
?>

<?php

// if (isset($_SESSION["waktu_start"])) {
//     $lewat = time() - $_SESSION["waktu_start"];
// } else {
//     $_SESSION["waktu_start"] = time();
//     $lewat = 0;
// }

?>
<!-- Content Header (Page header) -->

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-3">
            <div class="box box-success">
                <div class="box-header text-center">
                    <h4 class="box-title">Waktu Anda</h4>
                </div>
                <div class="box-body" id="timer_place">
                    <h1 id="counter" align="center"></h1>
                </div>
                <div class="box-footer">

                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="box box-success box-solid">
                <div class="box-header with-border" style="background-color: #337CCF">
                    <center>
                        <h3 class="box-title">Soal Ujian</h3>
                    </center>
                </div><!-- /.box-header -->
                <div class="box-body" style="overflow-y: scroll; height: 525px;">
                    <form id="formSoal" role="form" action="<?php echo base_url(); ?>ruang_ujian/jawab_aksi" method="post" onsubmit="return confirm('Anda Yakin ?')">
                        <input type="hidden" name="id_peserta" value="<?php echo $id['id_peserta']; ?>">
                        <input type="hidden" name="jumlah_soal" value="<?php echo $total_soal; ?>">

                        <?php $no = 0;
                        foreach ($soal_ujian as $s) {
                            $no++ ?>
                            <div class="form-group">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <td><?php echo $no; ?>. <?php echo $s->pertanyaan; ?></td>
                                        </tr>
                                        <tr>
                                            <td><input type='hidden' name='soal[]' value='<?php echo $s->id_soal_ujian; ?>' /></td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="jawaban[<?php echo $s->id_soal_ujian; ?>]" value="A" required /> <?php echo $s->a; ?></td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="jawaban[<?php echo $s->id_soal_ujian; ?>]" value="B" required /> <?php echo $s->b; ?></td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="jawaban[<?php echo $s->id_soal_ujian; ?>]" value="C" required /> <?php echo $s->c; ?></td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="jawaban[<?php echo $s->id_soal_ujian; ?>]" value="D" required /> <?php echo $s->d; ?></td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="jawaban[<?php echo $s->id_soal_ujian; ?>]" value="E" required /> <?php echo $s->e; ?></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        <?php } ?>
                        <button type="submit" class="btn btn-primary btn-flat pull-right" style="background-color: #337CCF">Simpan</button>
                    </form>
                    <div class="box-footer">

                    </div>
                </div><!-- /.box-body -->
            </div>
        </div>
    </div>
</section><!-- /.content -->

<?php
$this->load->view('ujian/js');
?>

<!-- tambahkan custom js disini -->
<script type="text/javascript">
    var waktu = 60;
    var waktuSekarang = 0;
    const counter = document.getElementById('counter');

    var countdown = setInterval(function() {
        waktuSekarang++;
        var waktuSisa = waktu - waktuSekarang;

        counter.innerHTML = waktuSisa;

        if (waktuSisa <= 0) {
            clearInterval(countdown);
            alert("Waktu ujian habis")
        }
    }, 1000) // 1000 miliseconds = 1 detik
</script>

<?php
$this->load->view('ujian/foot');
?>