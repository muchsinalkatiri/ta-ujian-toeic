<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Ujian Toeic - Login admin</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.css" rel="stylesheet">

</head>
<?php echo $this->session->flashdata('msg1'); ?>
<body class="bg-gray-900">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block" style="background: url('<?php echo base_url('assets/img/login.jpg'); ?>'); background-size: cover; background-position: center;"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login Admin</h1>
                  </div>
                  <?php echo $this->session->flashdata('msg'); ?>
                  <form class="user" action="<?php echo base_url('user/login/admin') ?>" method="post" enctype="multipart/form-data" >
                    <div class="row" id="notifications1"> <!-- open validasi -->
                      <div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('username'); ?></div>
                    </div> <!-- tutup validasi -->
                    <div class="form-group">
                      <input  type="text" class="form-control form-control-user" id="username" name="username"  placeholder="Enter Username...">
                    </div>
                    <div class="row" id="notifications2"> <!-- open validasi -->
                      <div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('password'); ?></div>
                    </div> <!-- tutup validasi -->
                    <div class="form-group">
                      <input  type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" onclick="myFunction()" for="customCheck">Show Password</label>
                      </div>
                    </div>
                    <button type="submit" class="btn bg-gray-900 text-gray-100 btn-user btn-block">
                      Login
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?php echo base_url('user/forgot_password') ?>">Lupa Password?</a>
                  </div>
                </div>
              </div>
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
</script>
<script type="text/javascript">
 function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>