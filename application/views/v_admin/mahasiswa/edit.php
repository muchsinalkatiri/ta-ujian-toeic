<?php 
$this->load->view('v_admin/v_admin_header');
?> 
<link href="<?php echo base_url(); ?>assets/vendor/datetimepicker/css/bootstrap-datepicker.css" rel="stylesheet">
</div> <!-- TUTUP HEADER -->

<nav aria-label="breadcrumb"> <!-- buka breadcumb -->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/mahasiswa') ?>">Data Mahasiswa</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah Data Mahasiswa</li>
  </ol>
</nav> <!-- tutup breadcumb -->

<div class="row ">
	<div class="col-lg-8 ">
		<div class="card shadow mb-7">
			<div class="card-header py-3 ">
			</div>
			<div class="card-body">
                <?php foreach($mahasiswa as $data_mahasiswa){
                	$split = explode(',', $data_mahasiswa->ttl);
                	$tempat_lahir = $split[0];
                	$tanggal_lahir = $split[1];
                 ?>
				<form class="user" action="<?php echo base_url('admin/mahasiswa/update/' . $data_mahasiswa->nim); ?>" method="post" enctype="multipart/form-data">
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
							<input type="text" readonly class="form-control form-control-user" id="nim" placeholder="Nim" name="nim" value="<?php echo $data_mahasiswa->nim?>">
						</div>
						<div class="col-sm-6">
							<input type="text" class="form-control form-control-user"  id="nama" name="nama" placeholder="Nama Lengkap" value="<?php echo $data_mahasiswa->nama?>">
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
							<input type="text" class="form-control form-control-user"  id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir"value="<?php echo $tempat_lahir; ?>" >
						</div>
						<div class="col-sm-6" >
							<input type="text"  name="tanggal_lahir" id="tanggal_lahir" class="tanggal form-control-user form-control"  placeholder="Tanggal Lahir (dd-mm-yyyy)" value="<?php echo $tanggal_lahir; ?>" >
						</div>
					</div>
					<div class="row" id="notifications3"> <!-- open validasi -->
	                    <div class="col-sm-12">
	                    	<div style="padding-left: 15px; " class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('alamat'); ?></div>
	                    </div> 
	                </div> <!-- tutup validasi -->
					<div class="form-group">
						<input type="text" class="form-control form-control-user" id="alamat" name="alamat"  placeholder="Alamat Lengkap" value="<?php echo $data_mahasiswa->alamat?>">
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
								<?php if ($data_mahasiswa->jurusan == 'D-III M. Informatika'){ ?>
								<option selected value="D-III M. Informatika">D-III M. Informatika</option>
								<option value="D-IV T. Informatika">D-IV T. Informatika</option>
								<?php }elseif(($data_mahasiswa->jurusan == 'D-IV T. Informatika')){ ?>
								<option value="D-III M. Informatika">D-III M. Informatika</option>
								<option selected value="D-IV T. Informatika">D-IV T. Informatika</option>
								<?php }?>
							</select>
						</div>
						<div class="col-sm-6" >
							<input type="text"  name="notlp" id="notlp" class=" form-control form-control-user" placeholder="Nomor Telepon" value="<?php echo $data_mahasiswa->notlp?>">
						</div>
					</div>
					<hr>
					<button type="submit" class="btn bg-gray-900 text-gray-100 btn-user btn-block">
						Edit
					</button>
				</form>
                <?php } ?>
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