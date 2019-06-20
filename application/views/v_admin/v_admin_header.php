<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - <?php echo $page_title ?></title>
  

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
<!--   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.css">
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.js"></script> -->


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav  bg-gray-900 sidebar sidebar-dark accordion" id="accordionSidebar">


      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url() ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-pen"></i>
        </div>
        <div class="sidebar-brand-text mx-3">JTI.TOEIC</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <?php if($page_title == 'Dashboard'){?>
      <li class="nav-item active">
      <?php }elseif($page_title != 'Dashboard') { ?>
        <li class="nav-item">
        <?php } ?>
        <a class="nav-link" href="<?php echo base_url('admin/dashboard') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          User
        </div>

        <!-- Nav Item - Admin -->
        <?php 
        if($this->session->userdata('level')=='0'){
          if($page_title == 'Data Admin' || $page_title == 'Tambah Data Admin' || $page_title == 'Edit Data Admin'){?>
          <li class="nav-item active">
          <?php }elseif($page_title != 'Data Admin') { 
          ?>
          <li class="nav-item">
          <?php  
          }
          ?>
          <a class="nav-link" href="<?php echo base_url('admin/admin') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Admin</span></a>
          </li>
        <?php
        }
        ?>


          <!-- Nav Item - Pages USER -->
          <?php if($page_title == 'Data Mahasiswa' || $page_title == 'Tambah Data Mahasiswa' || $page_title == 'Edit Data Mahasiswa' || $page_title == 'Data Mahasiswa Terdaftar' || $page_title == 'Tambah Data Mahasiswa Terdaftar' || $page_title == 'Edit Data Mahasiswa Terdaftar'){?>
            <li class="nav-item active">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-users"></i>
                <span>Mahasiswa</span>
              </a>
              <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                <?php if($page_title == 'Data Mahasiswa' || $page_title == 'Tambah Data Mahasiswa' || $page_title == 'Edit Data Mahasiswa'  ){?>
                  <a class="collapse-item active " href="<?php echo base_url('admin/mahasiswa') ?>">Data Mahasiswa</a>
                <?php }elseif ($page_title != 'Data Mahasiswa' || $page_title != 'Tambah Data Mahasiswa' || $page_title != 'Edit Data Mahasiswa'){ ?>
                  <a class="collapse-item" href="<?php echo base_url('admin/mahasiswa') ?>">Data Mahasiswa</a>
                <?php } ?>
                <?php if($page_title == 'Data Mahasiswa Terdaftar' || $page_title == 'Tambah Data Mahasiswa Terdaftar' || $page_title == 'Edit Data Mahasiswa Terdaftar'  ){?>
                  <a class="collapse-item active " href="<?php echo base_url('admin/mahasiswa_terdaftar') ?>">Data Mahasiswa Terdaftar</a>
                <?php }elseif ($page_title != 'Data Mahasiswa Terdaftar' || $page_title != 'Tambah Data Mahasiswa Terdaftar' || $page_title != 'Edit Data Mahasiswa Terdaftar'){ ?>
                  <a class="collapse-item" href="<?php echo base_url('admin/mahasiswa_terdaftar') ?>">Data Mahasiswa Terdaftar</a>
                <?php } ?>
                </div>
              </div>
            </li>
            <?php }elseif ($page_title != 'Data Mahasiswa' || $page_title != 'Tambah Data Mahasiswa' || $page_title != 'Edit Data Mahasiswa' || $page_title != 'Data Mahasiswa Terdaftar' || $page_title != 'Tambah Data Mahasiswa Terdaftar' || $page_title != 'Edit Data Mahasiswa Terdaftar'){ ?>
              <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                  <i class="fas fa-fw fa-users"></i>
                  <span>Mahasiswa</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item " href="<?php echo base_url('admin/mahasiswa') ?>">Data Mahasiswa</a>
                    <a class="collapse-item" href="<?php echo base_url('admin/mahasiswa_terdaftar') ?>">Data Mahasiswa Terdaftar</a>
                  </div>
                </div>
              </li>
              <?php } ?>
              
        <!-- Nav Item - Data Lupa Passworrd-->
        <?php 
        if($this->session->userdata('level')=='0'){
          if($page_title == 'Data Lupa Password' ){?>
          <li class="nav-item active">
          <?php }elseif($page_title != 'Data Lupa Password') { 
          ?>
          <li class="nav-item">
          <?php  
          }
          ?>
          <a class="nav-link" href="<?php echo base_url('admin/data_lupa_password') ?>">
            <i class="fas fa-fw fa-key"></i>
            <span>Data Lupa Password</span></a>
          </li>
        <?php
        }
        ?>

              <!-- Divider -->
              <hr class="sidebar-divider">

              <!-- Heading -->
              <div class="sidebar-heading">
                Soal
              </div>

              <!-- Nav Item - Soal Menu -->
        <?php 
          if( $this->uri->segment('2') == 'soal' ){?>
          <li class="nav-item active">
          <?php }elseif($this->uri->segment('2') != 'soal' ) { 
          ?>
          <li class="nav-item">
          <?php  
          }
          ?>
          <a class="nav-link" href="<?php echo base_url('admin/soal/paket_soal') ?>">
            <i class="fas fa-fw fa-question"></i>
            <span>Data Soal</span></a>
          </li>
 
              <!-- Divider -->
              <hr class="sidebar-divider">

              <!-- Heading -->
              <div class="sidebar-heading">
                Ujian
              </div>
              <!-- Nav Item - Jawaban -->
        <?php 
          if( $this->uri->segment('3') == 'sesi_ujian' ){?>
          <li class="nav-item active">
          <?php }elseif($this->uri->segment('3') != 'sesi_ujian' ) { 
          ?>
          <li class="nav-item">
          <?php  
          }
          ?>
                <a class="nav-link" href="<?php echo base_url('admin/ujian/sesi_ujian') ?>">
                  <i class="fas fa-fw fa-reply"></i>
                  <span>Sesi Ujian</span></a>
                </li>

    <?php 
    if( $this->uri->segment('3') == 'data_ujian' || $this->uri->segment('3') == 'data_nilai' ){?>
      <li class="nav-item active">
    <?php }elseif($this->uri->segment('3') != 'data_ujian' ) { ?>
      <li class="nav-item ">
    <?php  
       }
    ?>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i class="fas fa-database"></i>
          <span>Ujian</span>
        </a>
    <?php 
    if( $this->uri->segment('3') == 'data_ujian' || $this->uri->segment('3') == 'data_nilai' ){?>
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionSidebar">
    <?php }elseif($this->uri->segment('3') != 'data_ujian' ) { ?>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
    <?php  
       }
    ?>
          <div class="bg-white py-2 collapse-inner rounded">
          <?php 
          if( $this->uri->segment('3') == 'data_ujian' ){?>
            <a class="collapse-item active" href="<?php echo base_url('admin/ujian/data_ujian') ?>">Data Ujian</a>
          <?php }elseif($this->uri->segment('3') != 'data_ujian' ) { 
          ?>
            <a class="collapse-item " href="<?php echo base_url('admin/ujian/data_ujian') ?>">Data Ujian</a>
          <?php  
          }
          ?>
        <?php 
          if( $this->uri->segment('3') == 'data_nilai' ){?>
            <a class="collapse-item active" href="<?php echo base_url('admin/ujian/data_nilai') ?>">Data Nilai</a>
        <?php }elseif($this->uri->segment('3') != 'data_nilai' ) { 
          ?>
            <a class="collapse-item" href="<?php echo base_url('admin/ujian/data_nilai') ?>">Data Nilai</a>
        <?php  
          }
          ?>
          </div>
        </div>
      </li>


        <?php 
          if( $this->uri->segment('2') == 'pengiriman' ){?>
          <li class="nav-item active">
          <?php }elseif($this->uri->segment('2') != 'pengiriman' ) { 
          ?>
          <li class="nav-item">
          <?php  
          }
          ?>
                <a class="nav-link" href="<?php echo base_url('admin/pengiriman') ?>">
                  <i class="fas fa-fw fa-paper-plane"></i>
                  <span>Pengiriman</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                  <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

              </ul>
              <!-- End of Sidebar -->

              <!-- Content Wrapper -->
              <div id="content-wrapper" class="d-flex flex-column ">

                <!-- Main Content -->
                <div id="content">

                  <!-- Topbar -->
                  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                      <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                     
                      <div class="topbar-divider d-none d-sm-block"></div>

                      <!-- Nav Item - User Information -->
                      <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('username') ?></span>
                          <img class="img-profile rounded-circle" src="<?php echo base_url()."uploads/img-user/admin/".$this->session->userdata('foto') ?>">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                          <a class="dropdown-item" href="<?php echo base_url('admin/user'); ?>">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                          </a>
                          <a class="dropdown-item" href="#">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Settings
                          </a>
                          <a class="dropdown-item" href="#">
                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                            Activity Log
                          </a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                          </a>
                        </div>
                      </li>

                    </ul>

                  </nav>
                  <!-- End of Topbar -->

                  <!-- Begin Page Content -->
                  <div class="container-fluid ">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between ">
                      <h1 class="h3 mb-3 text-gray-800"><?php echo $page_title ?></h1>

                      <!-- TUTUP HEADER DI BODY -->
