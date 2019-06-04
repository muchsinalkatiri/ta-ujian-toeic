<?php 
$this->load->view('v_mahasiswa/v_mahasiswa_header');
?> 

<div class="container ">
	<div class="row ">
		<div class="col-lg-12">
		<!-- <a  class="d-none d-sm-inline-block btn btn-sm bg-danger text-gray-100 shadow-sm mb-2"  href="<?php echo base_url('kirim/kirim_email/')?>" ><i class="fas fa-envelope  text-white-50"></i> Send Detail Score to Email</a> -->
			<div class="card shadow mb-7">
				<div class="card-header py-3 ">
					<nav class="navbar">
						<h6 class="text-lg m-0 font-weight-bold text-gray-900">Profile</h6>
						<ul class="navbar-nav ml-auto">
							<a class="text-gray-900 text-lg" href="<?php echo base_url('mahasiswa/user/edit') ?>" >
								<span class="fa fa-cog"></span> Edit Profile
							</a>
						</ul>
					</nav>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-sm-8">
							<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 
							<table class="table">
								<tr>
									<td><strong>NIM</strong></td>
									<td><?php echo $data_mahasiswa_terdaftar->nim ?></td>
								</tr>
								<tr>
									<td><strong>Nama</strong></td>
									<td><?php echo $data_mahasiswa_terdaftar->nama ?></td>
								</tr>
								<tr>
									<td><strong>Username</strong></td>
									<td><?php echo$data_mahasiswa_terdaftar->username ?></td>
								</tr>
								<tr>
									<td><strong>Tanggal Pendaftaran</strong></td>
									<td><?php echo $data_mahasiswa_terdaftar->tanggal_pendaftaran ?></td>
								</tr>
								<tr>
									<td><strong>Email</strong></td>
									<td><?php echo $data_mahasiswa_terdaftar->email ?></td>
								</tr>
								<td><strong>Notlp</strong></td>
								<td><?php echo $data_mahasiswa_terdaftar->notlp2 ?></td>
							</tr>
							<td><strong>Angkatan</strong></td>
							<td><?php echo $data_mahasiswa_terdaftar->angkatan ?></td>
						</tr>
					</tr>
					<td><strong>Tempat dan Tanggal Lahir</strong></td>
					<td><?php echo $data_mahasiswa_terdaftar->ttl ?></td>
				</tr>
			</tr>
			<td><strong>Alamat</strong></td>
			<td><?php echo $data_mahasiswa_terdaftar->alamat ?></td>
		</tr>
		<tr> 
			<td><strong>Level</strong></td>
			<td>Mahasiswa</td>
		</tr>
	</table>
</div>
<div class="col-sm-4 ">
	<center>
		<h2 >Foto</h2>
		<img class="card shadow mb-7" class="img-profile rounded-circle" id="gambar_nodin"  alt="Preview Gambar" style='width:300px;height:300px; border-radius: 50%;  ' src="<?php echo base_url()."uploads/img-user/".$data_mahasiswa_terdaftar->foto ?>">
	</center>
</div>
</div>
</div>
</div>
</div>
</div>


<?php 
$this->load->view('v_mahasiswa/v_mahasiswa_footer');
?> 

<script>   
	$('#notifications').slideDown('slow').delay(5000).slideUp('slow');
</script>