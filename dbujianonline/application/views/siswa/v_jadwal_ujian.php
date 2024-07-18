<?php
$this->load->view('siswa/head');
?>
<!--tambahkan custom css disini-->

<?php
$this->load->view('siswa/topbar');
$this->load->view('siswa/sidebar');
date_default_timezone_set('Asia/Jakarta');
?>
<!-- Content Header (Page header) -->

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Default box -->
            <div class="box box-success box-solid">
                <div class="box-header with-border" style="background-color: #337CCF">
                    <h3 class="box-title"><?php echo date('d F Y'); ?> | <span id="time"> </span></h3>
                </div>
                <center><h4 class="box-title">Jadwal Ujian</h4></center>

                <div class="box-body" style="overflow-x: scroll;">

                    <table id="data" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Waktu Ujian</th>
                                <th>Jenis Ujian</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            if (isset($jadwal_ujian) && is_array($jadwal_ujian) && count($jadwal_ujian) > 0) {
                                foreach ($jadwal_ujian as $d) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($d->tanggal_ujian)); ?> | <?php echo date('H:i:s', strtotime($d->jam_ujian)); ?></td>
                                        <td><?php echo $d->jenis_ujian; ?></td>
                                        <td>
                                            <?php 
                                            if ($d->status_ujian == 0) {
                                                echo "<span> Belum Mulai Ujian </span>";
                                            } else if ($d->status_ujian == 2) {
                                                echo "<span> Sudah Mengikuti Ujian </span>";
                                            } else if ($d->status_ujian == 1) {
                                                if (date('d-m-Y', strtotime($d->tanggal_ujian)) == date('d-m-Y') && date('H:i:s', strtotime($d->jam_ujian)) <= date('H:i:s')) {
                                                    echo "<a href='" . base_url() . "ruang_ujian/soal/" . $d->id_peserta . "' class='btn btn-xs btn-success'>Mulai Ujian</a>";
                                                } else if (date('d-m-Y', strtotime($d->tanggal_ujian)) == date('d-m-Y') && date('H:i:s', strtotime($d->jam_ujian)) > date('H:i:s')) {
                                                    echo "Waktu Ujian Habis";
                                                } else {
                                                    echo "Tunggu Waktu Ujian";
                                                }
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="7">Tidak ada data jadwal ujian</td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
</section><!-- /.content -->

<?php
$this->load->view('siswa/js');
?>
<!--tambahkan custom js disini-->
<script type="text/javascript">
    $('.alert-message').alert().delay(3000).slideUp('slow');
</script>

<script>
    window.setTimeout("waktu()", 1000);

    function showTime() {
        var a_p = "";
        var today = new Date();
        var curr_hour = today.getHours();
        var curr_minute = today.getMinutes();
        var curr_second = today.getSeconds();
        if (curr_hour < 12) {
            a_p = "AM";
        } else {
            a_p = "PM";
        }
        if (curr_hour == 0) {
            curr_hour = 12;
        }
        if (curr_hour > 12) {
            curr_hour = curr_hour - 12;
        }
        curr_hour = checkTime(curr_hour);
        curr_minute = checkTime(curr_minute);
        curr_second = checkTime(curr_second);
        document.getElementById('time').innerHTML = curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }
    setInterval(showTime, 500);
</script>
<?php
$this->load->view('admin/foot');
?>
