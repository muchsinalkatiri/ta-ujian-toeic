<?php 
$this->load->view('v_mahasiswa/v_mahasiswa_header');
?> 

<link href="<?php echo base_url(); ?>assets/vendor/datetimepicker/css/bootstrap-datetimepicker.css" rel="stylesheet"> 
<?php 
$split = explode(',', $data_mahasiswa->ttl);
$tempat_lahir = $split[0];
$tanggal_lahir = $split[1];
?>

<div class="container ">
	<div class="row ">
		<div class="col-lg-12">
			<div class="card shadow mb-7">
				<div class="card-header py-3 ">
					<nav class="navbar">
						<h6 class="text-lg m-0 font-weight-bold text-gray-900">Update Profile</h6>
					</nav>
				</div>
				<div class="card-body">
					<form class="user" action="<?php echo base_url('mahasiswa/user/edit/'); ?>" method="post" enctype="multipart/form-data">
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
										<input readonly type="text" class="form-control form-control-user" id="nim" placeholder="Nim" name="nim" value="<?php echo set_value('nim', $data_mahasiswa->nim) ?>">
									</div>
									<div class="col-sm-6">
										<input type="text" class="form-control form-control-user" value="<?php echo set_value('username', $data_mahasiswa->username) ?>" id="username" name="username" placeholder="Username">
									</div>
								</div>
								<div class="row" id="notifications2"> <!-- open validasi -->
									<div class="col-sm-6">
										<div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('nama'); ?></div>
									</div>
									<div class="col-sm-6">
										<div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('notlp2'); ?></div>
									</div> 
								</div> <!-- tutup validasi -->
								<div class="form-group row">
									<div class="col-sm-6 mb-3 mb-sm-0">
										<input  type="text" class="form-control form-control-user" id="nama" placeholder="Nama" name="nama" value="<?php echo set_value('nama', $data_mahasiswa->nama) ?>">
									</div>
									<div class="col-sm-6">
										<input type="text" class="form-control form-control-user" value="<?php echo set_value('notlp2', $data_mahasiswa->notlp2) ?>" id="notlp2" name="notlp2" placeholder="No Tlp">
									</div>
								</div>
								<div class="row" id="notifications3" > <!-- open validasi -->
									<div class="col-sm-12">
										<div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('alamat'); ?></div>
									</div>
								</div> <!-- tutup validasi -->
								<div class="form-group row">
									<div class="col-sm-12" >
										<input type="text"  name="alamat" id="alamat" value="<?php echo set_value('alamat', $data_mahasiswa->alamat) ?>" class="form-control-user form-control"  placeholder="Alamat Lengkap" />
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
										<input type="text"  name="email" id="email" class=" form-control form-control-user" value="<?php echo set_value('email', $data_mahasiswa->email) ?>"  placeholder="Email" />
									</div>
									<div class="col-sm-6 ">
										<a style="text-decoration: none;" id="btnFile" class="text-gray-600 form-control form-control-user" href="#" onclick="return false;" >Foto</a>
										<input style="display:none" type="file"  name="foto" id="inputFile"  class=" form-control form-control-user"  />
									</div>
								</div>

								<div class="row" id="notifications6" > <!-- open validasi -->
									<div class="col-sm-6">
										<div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('tempat_lahir'); ?></div>
									</div>
									<div class="col-sm-6">
										<div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('tanggal_lahir'); ?></div>
									</div> 
								</div> <!-- tutup validasi -->
								<div class="form-group row">
									<div class="col-sm-6 mb-3 mb-sm-0">
										<input type="text" class="form-control form-control-user"  id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" >
									</div>
									<div class="col-sm-6" >
										<input type="text"  name="tanggal_lahir" id="tanggal_lahir" class="time form-control-user form-control"  placeholder="Tanggal Lahir (dd-mm-yyyy)" value="<?php echo $tanggal_lahir; ?>" >
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
										<input type="password"  name="password" id="password" class=" form-control form-control-user"   placeholder="Password" />
									</div>
									<div class="col-sm-6 ">
										<input type="password"  name="confirm_password" id="confirm_password" class=" form-control form-control-user"   placeholder="Konfirmasi Passowrd" />
									</div>
								</div>
								<hr>
								<button type="submit" class="btn bg-gray-900 text-gray-100 btn-user btn-block">
									Update
								</button>
							</div>
							<div class="col-sm-4 ">
								<center>
									<h2 >Foto</h2>
									<img class="card shadow mb-7" id="gambar_nodin"  alt="Preview Gambar" style='width:300px;height:300px; border-radius: 50%;  ' src="<?php echo base_url()."uploads/img-user/".$data_mahasiswa->foto ?>"> 
									<h7>Max Size 1 mb</h7>
								</center>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<?php 
$this->load->view('v_mahasiswa/v_mahasiswa_footer');
?> 


<script src="<?php echo base_url(); ?>assets/vendor/datetimepicker/js/bootstrap-datetimepicker.js"></script>

<script>   
	$('#notifications, #notifications1 , #notifications2, #notifications3, #notifications4, #notifications5, #notifications6').slideDown('slow').delay(5000).slideUp('slow');
</script>

<script type="text/javascript">
	$(document).ready(function () {
		$('.time').datetimepicker({format: 'dd-mm-yyyy', todayBtn: true,
			autoclose: true,
			pickerPosition: "top-left"});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(e) {
		$('#btnFile').click(function(){
			$('#inputFile').click();
		});

	});

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