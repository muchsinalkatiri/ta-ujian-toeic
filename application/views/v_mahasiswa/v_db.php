<?php 
$this->load->view('v_mahasiswa/v_mahasiswa_header');
?> 


<!-- Page Heading -->
<div class="container" >
	<div class="container">
		<h1 class="h3 mb-4 text-gray-800"><?php echo $page_title ?></h1>
		<div class="row">

			<div class="col-xl-4 col-md-6 mb-5">
				<div class="card  border-left-gray-800 shadow h-100 py-3">
					<div class="card-body">
						<a class="nav-link  text-gray-100" href="<?php echo base_url('mahasiswa/user') ?>">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="h4 mb-0 font-weight-bold text-gray-900">Profile</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-user fa-2x text-gray-500"></i>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-6 mb-5">
				<div class="card  border-left-gray-800 shadow h-100 py-3">
					<div class="card-body">
						<a class="nav-link  text-gray-100" href="<?php echo base_url('mahasiswa/ujian') ?>">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="h4 mb-0 font-weight-bold text-gray-900">Ujian</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-file-alt fa-2x text-gray-500"></i>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-6 mb-5">
				<div class="card  border-left-gray-800 shadow h-100 py-3">
					<div class="card-body">
						<a class="nav-link  text-gray-100" href="<?php echo base_url('mahasiswa/dashboard') ?>">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="h4 mb-0 font-weight-bold text-gray-900">Hasil Ujian</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-chart-bar fa-2x text-gray-500"></i>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-6 mb-5">
				<div class="card  border-left-gray-800 shadow h-100 py-3">
					<div class="card-body">
						<a class="nav-link  text-gray-100" href="<?php echo base_url('mahasiswa/user') ?>">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="h4 mb-0 font-weight-bold text-gray-900">Profile</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-user fa-2x text-gray-500"></i>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-6 mb-5">
				<div class="card  border-left-gray-800 shadow h-100 py-3">
					<div class="card-body">
						<a class="nav-link  text-gray-100" href="<?php echo base_url('mahasiswa/dashboard') ?>">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="h4 mb-0 font-weight-bold text-gray-900">Ujian</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-file-alt fa-2x text-gray-500"></i>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-6 mb-5">
				<div class="card  border-left-gray-800 shadow h-100 py-3">
					<div class="card-body">
						<a class="nav-link  text-gray-100" href="<?php echo base_url('mahasiswa/dashboard') ?>">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="h4 mb-0 font-weight-bold text-gray-900">Hasil Ujian</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-chart-bar fa-2x text-gray-500"></i>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>




	<?php 
	$this->load->view('v_mahasiswa/v_mahasiswa_footer');
	?> 	