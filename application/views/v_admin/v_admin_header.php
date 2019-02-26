<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADMIN</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <!-- <link href="<?php echo base_url(); ?>assets/cpanel/css/font-awesome.css" rel="stylesheet" /> -->
    <!--CUSTOM BASIC STYLES-->
    <link href="<?php echo base_url(); ?>assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet" />

    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets\font-awesome-4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fontawesome-free-5.7.1-web/css/all.min.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">UJIAN TOEIC</a>
            </div>

            <div class="header-right">
                <a href="<?php echo base_url() ?>" class="btn btn-info" title="Logout"><i class="fa fa-home fa-2x"></i></a>
                <a href="<?php echo base_url('user/logout') ?>" class="btn btn-danger" title="Logout"><i class="fa fa-sign-out-alt fa-2x"></i></a>
            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                            <img src="<?php echo base_url(); ?>assets/img/user.jpg" class="img-thumbnail" />

                            <div class="inner-text">
                                <?php echo $this->session->userdata('username') ?>
                            </div>
                        </div>

                    </li>


                    <li>
                        <a class="active-menu" href="<?php echo base_url('dashboard') ?>"><i class="fa fa-tachometer-alt "></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-desktop "></i>Data User <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="panel-tabs.html"><i class="fas fa-user-graduate"></i>Data Admin</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('mahasiswa') ?>"><i class="fa fa-user "></i>Data Mahasiswa</a>
                            </li>
                            <li>
                                <a href="progress.html"><i class="fa fa-user-plus"></i>Data Mahasiswa Terdaftar</a>
                            </li>
                            

                        </ul>
                    </li>
                    <li>

                        <li>
                            <a href="<?php echo base_url('user/logout') ?>"><i class="fa fa-sign-out-alt "></i>Logout</a>
                        </li>
                    </ul>

                </div>

            </nav>
            <!-- /. NAV SIDE  -->

            <div id="page-wrapper">
            <div id="page-inner">

