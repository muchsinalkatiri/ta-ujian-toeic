<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Register</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-success">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block " style="background: url('<?php echo base_url('assets/img/register.jpg'); ?>'); background-size: cover; background-position: center;"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Register</h1>
              </div>
              <form class="user" action="<?php echo base_url('register') ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-sm-12" >
                    <div id="notifications">
                      <?php echo $this->session->flashdata('msg'); ?>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="row" id="notifications1"> <!-- open validasi -->
                      <div class="col-sm-6">
                        <div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('nim'); ?></div>
                      </div>
                      <div class="col-sm-6">
                        <div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('username'); ?></div>
                      </div> 
                    </div> <!-- tutup validasi -->
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" value="<?php echo set_value('nim'); ?>" id="nim" placeholder="Nim" name="nim">
                      </div>
                      <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo set_value('username'); ?>" id="username" name="username" placeholder="Username">
                      </div>
                    </div>
                    <div class="row" id="notifications2" > <!-- open validasi -->
                      <div class="col-sm-6">
                        <div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('notlp2'); ?></div>
                      </div>
                      <div class="col-sm-6">
                        <div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('angkatan'); ?></div>
                      </div> 
                    </div> <!-- tutup validasi -->
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user"  id="notlp2" value="<?php echo set_value('notlp2'); ?>" name="notlp2" placeholder="Nomer Telepon Aktif">
                      </div>
                      <div class="col-sm-6" >
                        <input type="year"  name="angkatan" id="angkatan" value="<?php echo set_value('angkatan'); ?>" class="form-control-user form-control"  placeholder="Tahun Masuk Polinema" />
                      </div>
                    </div>
                    <div class="row" id="notifications4"> <!-- open validasi -->
                      <div class="col-sm-6">
                        <div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger  text-uppercase mb-1"><?php echo form_error('email'); ?></div>
                      </div>
                    </div> <!-- tutup validasi -->
                    <div class="form-group row">
                      <div class="col-sm-12 mb-3 mb-sm-0">
                        <input type="text"  name="email" id="email" class=" form-control form-control-user" value="<?php echo set_value('email'); ?>"  placeholder="Email" />
                      </div>
                    </div>
                    <div class="row" id="notifications5"> <!-- open validasi -->
                      <div class="col-sm-6">
                        <div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger  text-uppercase mb-1"><?php echo form_error('password'); ?></div>
                      </div>
                      <div class="col-sm-6">
                        <div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger  text-uppercase mb-1"><?php echo form_error('confirm_password'); ?></div>
                      </div>
                    </div> <!-- tutup validasi -->
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password"  name="password" id="password" class=" form-control form-control-user" value="<?php echo set_value('password'); ?>"  placeholder="Password" />
                      </div>
                      <div class="col-sm-6 ">
                        <input type="password"  name="confirm_password" id="confirm_password" class=" form-control form-control-user"   placeholder="Konfirmasi Passowrd" />
                      </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Register Account
                    </button>
                    <hr>
                    <a href="<?php echo base_url('login') ?>" class="btn btn-google btn-user btn-block">
                      Already have an account? Login!
                    </a>
                  </div>
                </div>
              </form>
              <hr>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url(); ?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>
<script>   
  $('#notifications').slideDown('slow').delay(5000).slideUp('slow');
  $('#notifications1').slideDown('slow').delay(5000).slideUp('slow');
  $('#notifications2').slideDown('slow').delay(5000).slideUp('slow');
  $('#notifications3').slideDown('slow').delay(5000).slideUp('slow');
  $('#notifications4').slideDown('slow').delay(5000).slideUp('slow');
  $('#notifications5').slideDown('slow').delay(5000).slideUp('slow');


</script>