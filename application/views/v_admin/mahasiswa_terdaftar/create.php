<?php 
$this->load->view('v_admin/v_admin_header');
?> 
<link href="<?php echo base_url(); ?>assets/vendor/datetimepicker/css/bootstrap-datepicker.css" rel="stylesheet">
</div> <!-- TUTUP HEADER -->
<div class="row ">
	<div class="col-lg-12">
		<div class="card shadow mb-7">
			<div class="card-header py-3 ">
				<h6 class="m-0 font-weight-bold text-gray-900">Mahasiswa Terdaftar</h6>
			</div>
			<div class="card-body">
				<form class="user" action="<?php echo base_url('admin/mahasiswa_terdaftar/create') ?>" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-sm-12" >
							<div id="notifications">
								<?php echo $this->session->flashdata('msg'); ?>
							</div>
						</div>
						<div class="col-sm-8">
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
								<div class="col-sm-6">
									<div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger  text-uppercase mb-1"><?php echo form_error('foto'); ?></div>
								</div>
							</div> <!-- tutup validasi -->
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="text"  name="email" id="email" class=" form-control form-control-user" value="<?php echo set_value('email'); ?>"  placeholder="Email" />
								</div>
								<div class="col-sm-6 ">
									<a style="text-decoration: none;" id="btnFile" class="text-gray-600 form-control form-control-user" href="#" onclick="return false;" >Foto</a>
									<input style="display:none" type="file"  name="foto" id="inputFile"  class=" form-control form-control-user"  />
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
							<button type="submit" class="btn bg-gray-900 text-gray-100 btn-user btn-block">
								Tambahkan
							</button>
						</div>
						<div class="col-sm-4">
							<center>
								<h2 >Foto</h2>
								<img id="gambar_nodin"  alt="Preview Gambar" style='width:300px;height:300px; border-radius: 50%;  ' src="<?php echo base_url()."assets/img/default-user.png"?>"> 
							</center>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>


	<?php 
	$this->load->view('v_admin/v_admin_footer');
	?>


	<script src="<?php echo base_url(); ?>assets/vendor/datetimepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('.tanggal').datepicker({
				format: "dd-mm-yyyy",
				autoclose:true
			});
		});
	</script>

	<script>   
		$('#notifications').slideDown('slow').delay(5000).slideUp('slow');
		$('#notifications1').slideDown('slow').delay(5000).slideUp('slow');
		$('#notifications2').slideDown('slow').delay(5000).slideUp('slow');
		$('#notifications3').slideDown('slow').delay(5000).slideUp('slow');
		$('#notifications4').slideDown('slow').delay(5000).slideUp('slow');
		$('#notifications5').slideDown('slow').delay(5000).slideUp('slow');

		function bacaGambar(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('#gambar_nodin').attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}

		$("#inputFile").change(function(){
			bacaGambar(this);
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(e) {
			$('#btnFile').click(function(){
				$('#inputFile').click();
			});

		});
	</script>