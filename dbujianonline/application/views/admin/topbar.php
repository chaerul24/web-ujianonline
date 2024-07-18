<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        .navbar-static-top {
            background-color: #337CCF;
        }
    </style>
</head>
<body class="skin-green sidebar-mini fixed">
<div class="wrapper">

<header class="main-header">
    <!-- Logo -->
    <span class="logo" style="display: block; text-align: center; background-color: #337CCF">
        <!-- logo for regular state and mobile devices -->
        <img src="<?= base_url('image/for dark bg.png') ?>" class="logo" style="max-width: 70%; max-height: 80%; margin-top: 5px; background-color: #337CCF">
    </span>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background-color: #337CCF">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" style="">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= base_url('image/avatar.png') ?>" class="user-image" alt="User Image">
              <span class="hidden-xs">Halo, <?php echo $this->session->userdata('nama'); ?></span>
            </a>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>

  <!-- Tambahkan kode lain di sini -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>