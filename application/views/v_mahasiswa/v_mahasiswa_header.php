<!DOCTYPE html>
<html lang="en">

<head>


	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Mahasiswa - <?php echo $page_title ?></title>


	<link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


	<link href="<?php echo base_url(); ?>assets/css/sb-admin-2.css" rel="stylesheet">
</head>

<body id="page-top"  class="bg-gray-100">


	<div id="content-wrapper" style="min-height: 600px; " class="d-flex flex-column">
		<nav class="navbar navbar-expand navbar-light bg-gray-900 text-white topbar mb-4 static-top shadow">
			<ul class="nav navbar-nav">
				<li class="nav-item ">
					<a class="nav-link  text-gray-100" href="<?php echo base_url() ?>">
						<div class="sidebar-brand-icon rotate-n-15">
							<i class=" fa fa-pen fa-2x"></i>
						</div>
						<div class="sidebar-brand-text mx-1">JTI.TOEIC</div>
					</a>
				</li>
			</ul>

			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown no-arrow mx-1">
					<a class="nav-link " href="<?php echo base_url('mahasiswa/ujian'); ?>"  aria-haspopup="true" aria-expanded="false">
					<div style="font-size: 14px; ">
						<i class="fas fa-list fa-sm fa-fw  "></i>
							List Exam
					</div>
					</a>
					<!-- Dropdown - Messages -->

				</li>
				<div class="topbar-divider bg-gray-400 d-none d-sm-block"></div>
				<li class="nav-item dropdown no-arrow">
					<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="mr-2 d-none d-lg-inline text-gray-400 small"><?php echo $this->session->userdata('username') ?></span>
						<img class="img-profile rounded-circle" src="<?php echo base_url()."uploads/img-user/".$this->session->userdata('foto') ?>">
					</a>
					<div class="dropdown-menu bg-gray-900  dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
						<a class="dropdown-item bg-gray-900 text-gray-400" href="<?php echo base_url('mahasiswa/user'); ?>">
							<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-100"></i>
							Profile
						</a>
						<a class="dropdown-item bg-gray-900 text-gray-400" href="<?php echo base_url('mahasiswa/dashboard'); ?>">
							<i class="fas fa-list fa-sm fa-fw mr-2 text-gray-100"></i>
							List Exam
						</a>
						<a class="dropdown-item bg-gray-900 text-gray-400" href="#">
							<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-100"></i>
							Settings
						</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item bg-gray-900 text-gray-400" href="#" data-toggle="modal" data-target="#logoutModal">
							<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-100"></i>
							Logout
						</a>
					</div>
				</li>
			</ul>
		</nav>
		<div class="container-fluid"  ">
			<!-- <div  style="min-height: 470px;">  -->
