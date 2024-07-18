<?php 
$this->load->view('admin/head');
?>

<!--tambahkan custom css disini-->

<?php
$this->load->view('admin/topbar');
$this->load->view('admin/sidebar');
?>

<!-- Content Header (Page header) -->


<!-- Main content -->
<section class="content">

<div class="row">
    <div class="col-md-12">
    <div class="callout" style="background-color: #337CCF;">
                <h4 class="text-center" style="color: #FFFFFF">Selamat Datang, <?php echo $this->session->userdata('nama');?> </h4>
            </div>
        </div>
    </div>
<!--     
    <div class="box box-success box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Tentang Website</h3>
        </div>/.box-header -->
        <div class="box-body">
            <dl>
                <dt></dt>
                <dd>
                    <ol>
                        <!-- Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. -->
                    </ol>
                </dd>
            </dl>
            
    </div>

</section><!-- /.content -->
  
<?php 
$this->load->view('admin/js');
?>

<!--tambahkan custom js disini-->

<script type="text/javascript">

	$(function(){
		$('#data-tables').dataTable();
	});

	$('.alert-message').alert().delay(3000).slideUp('slow');

</script>


<?php
$this->load->view('admin/foot');
?>

