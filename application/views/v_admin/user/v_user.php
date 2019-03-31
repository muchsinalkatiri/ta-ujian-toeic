<?php 
$this->load->view('v_admin/v_admin_header');
?> 
</div> <!-- TUTUP HEADER -->
<div class="row ">
	<div class="col-lg-12">
		<div class="card shadow mb-7">
			<div class="card-header py-3 ">
				<nav class="navbar">
					<h6 class="text-lg m-0 font-weight-bold text-gray-900"><?php if($data_user->level == '0' ){$level = 'Super Admin';} elseif($data_user->level == '1'){$level = 'Admin';} ?>Profile</h6>
					<ul class="navbar-nav ml-auto">
						<a class="text-gray-900 text-lg" href="<?php echo base_url('admin/user/edit') ?>" >
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
								<td><strong>ID</strong></td>
								<td><?php echo $data_user->id_admin ?></td>
							</tr>
							<tr>
								<td><strong>Nama</strong></td>
								<td><?php echo $data_user->nama ?></td>
							</tr>
							<tr>
								<td><strong>Username</strong></td>
								<td><?php echo$data_user->username ?></td>
							</tr>
							<tr>
								<td><strong>Tanggal Pendaftaran</strong></td>
								<td><?php echo $data_user->tanggal_pendaftaran ?></td>
							</tr>
							<tr> 
								<td><strong>Level</strong></td>
								<td><?php echo $level ?></td>
							</tr>  
						</table>
					</div>
					<div class="col-sm-4 ">
						<center>
							<h2 >Foto</h2>
							<img class="card shadow mb-7" class="img-profile rounded-circle" id="gambar_nodin"  alt="Preview Gambar" style='width:300px;height:300px; border-radius: 50%;  ' src="<?php echo base_url()."uploads/img-user/admin/".$data_user->foto ?>"> 
						</center>
					</div>
				</div>
			</div>
		</div>
	</div>


	<?php 
	$this->load->view('v_admin/v_admin_footer');
	?> 

	<script>   
		$('#notifications').slideDown('slow').delay(5000).slideUp('slow');
	</script>