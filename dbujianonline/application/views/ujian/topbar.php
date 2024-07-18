</head>
<body class="hold-transition skin-green layout-top-nav fixed" >
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top" style="background-color: #337CCF">
      <div class="container">
        <div class="navbar-header">
        <img src="<?= base_url('image/for dark bg.png') ?>" class="logo" style="max-width: 60%; max-height: 60%; margin-top: 5px; background-color: #337CCF">
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="<?=base_url('image/avatar.png')?>" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">Halo, <?php echo $this->session->userdata('nama');?></span>
              </a>              
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">