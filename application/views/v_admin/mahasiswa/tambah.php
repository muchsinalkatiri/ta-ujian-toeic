<?php 
$this->load->view('v_admin/v_admin_header');
?> 
<link href="<?php echo base_url(); ?>assets/vendor/datetimepicker/css/bootstrap-datepicker.css" rel="stylesheet">
</div> <!-- TUTUP HEADER -->
<div class="row ">
	<div class="col-lg-8 ">
		<div class="card shadow mb-7">
			<div class="card-header py-3 ">
			</div>
			<div class="card-body">
				<form class="user" action="<?php echo base_url('admin/mahasiswa/create') ?>" method="post" enctype="multipart/form-data">
					<div class="row" id="notifications1"> <!-- open validasi -->
						<div class="col-sm-6">
	                    	<div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('nim'); ?></div>
	                    </div>
	                    <div class="col-sm-6">
	                    	<div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('nama'); ?></div>
	                    </div> 
	                </div> <!-- tutup validasi -->
					<div class="form-group row">
						<div class="col-sm-6 mb-3 mb-sm-0">
							<input type="text" class="form-control form-control-user" value="<?php echo set_value('nim'); ?>" id="nim" placeholder="Nim" name="nim">
						</div>
						<div class="col-sm-6">
							<input type="text" class="form-control form-control-user" value="<?php echo set_value('nama'); ?>" id="nama" name="nama" placeholder="Nama Lengkap">
						</div>
					</div>
					<div class="row" id="notifications2" > <!-- open validasi -->
						<div class="col-sm-6">
	                    	<div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('tempat_lahir'); ?></div>
	                    </div>
	                    <div class="col-sm-6">
	                    	<div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('tanggal_lahir'); ?></div>
	                    </div> 
	                </div> <!-- tutup validasi -->
					<div class="form-group row">
						<div class="col-sm-6 mb-3 mb-sm-0">
							<input type="text" class="form-control form-control-user"  id="tempat_lahir" value="<?php echo set_value('tempat_lahir'); ?>" name="tempat_lahir" placeholder="Tempat Lahir">
						</div>
						<div class="col-sm-6" >
							<input type="text"  name="tanggal_lahir" id="tanggal_lahir" value="<?php echo set_value('tanggal_lahir'); ?>" class="tanggal form-control-user form-control"  placeholder="Tanggal Lahir (dd-mm-yyyy)" />
						</div>
					</div>
					<div class="row" id="notifications3"> <!-- open validasi -->
	                    <div class="col-sm-12">
	                    	<div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('alamat'); ?></div>
	                    </div> 
	                </div> <!-- tutup validasi -->
					<div class="form-group">
						<input type="text" class="form-control form-control-user" id="alamat" value="<?php echo set_value('alamat'); ?>" name="alamat"  placeholder="Alamat Lengkap">
					</div>
					<div class="row" id="notifications4"> <!-- open validasi -->
						<div class="col-sm-6">
	                    	<div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger  text-uppercase mb-1"><?php echo form_error('jurusan'); ?></div>
	                    </div>
	                    <div class="col-sm-6">
	                    	<div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('notlp'); ?></div>
	                    </div> 
	                </div> <!-- tutup validasi -->
					<div class="form-group row">
						<div class="col-sm-6 mb-3 mb-sm-0">
							<select style="font-size: 0.8rem; height: 50px;  border-radius: 10rem; " class="form-control" name="jurusan">
								<option value="" disabled selected>Jurusan</option>
								<option value="D-III M. Informatika">D-III M. Informatika</option>
								<option value="D-IV T. Informatika">D-IV T. Informatika</option>
							</select>
						</div>
						<div class="col-sm-6" >
							<input type="text"  name="notlp" id="notlp" class=" form-control form-control-user" value="<?php echo set_value('notlp'); ?>"  placeholder="Nomor Telepon" />
						</div>
					</div>
					<hr>
					<button type="submit" class="btn bg-gray-900 text-gray-100 btn-user btn-block">
						Tambahkan
					</button>
				</form>
			</div>
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
    $('#notifications1').slideDown('slow').delay(5000).slideUp('slow');
    $('#notifications2').slideDown('slow').delay(5000).slideUp('slow');
    $('#notifications3').slideDown('slow').delay(5000).slideUp('slow');
    $('#notifications4').slideDown('slow').delay(5000).slideUp('slow');
</script>