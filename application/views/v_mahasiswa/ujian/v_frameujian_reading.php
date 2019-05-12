	<link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


	<link href="<?php echo base_url(); ?>assets/css/sb-admin-2.css" rel="stylesheet">
	<?php $split = explode('4_5', $this->uri->segment('4')); $id_data_ujian = $split[0];//ambil data id ujian dari link  ?> 

	<body id="page-top" class="bg-gray-100">
		<div class="card shadow mb-4">
			<div class="card-body">
				<div class="row">
					<div class="col-sm-8">
						<?php if($soal->nomer_soal >= 1 && $soal->nomer_soal <= 10){ ?> <!-- untuk soal nomer 1-10  -->
							<p>
								<?php echo $soal->nomer_soal."." ?>
								<img class="card shadow mb-7"  alt="Preview Gambar" style=' border-radius: 5%;  ' src="<?php echo base_url()."uploads/img-soal/photograps/".$soal->isi_soal?>"> 
							</p>
							<form>
								<div class="ml-5">
									<input type="radio" name="jawaban_siswa" value="a"/> <b>A.</b> <?php echo $soal->opsi_a; ?><br>
									<input type="radio" name="jawaban_siswa" value="b"/> <b>B.</b> <?php echo $soal->opsi_b; ?><br>
									<input type="radio" name="jawaban_siswa" value="c"/> <b>C.</b> <?php echo $soal->opsi_c; ?><br>
									<input type="radio" name="jawaban_siswa" value="d"/> <b>D.</b> <?php echo $soal->opsi_d; ?><br>
								</div>
							</form>
							<?php } ?>
						</div>
						<div class="col-sm-4">
							<nav>
								<div class="nav nav-tabs" id="nav-tab" role="tablist">
									<li class="nav-item nav-link "><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_51') ?>">Listening</a></li>
									<li class="nav-item nav-link active"><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_51') ?>">Reading</a></li>
								</div>
							</nav>
							Panel reading
						</div>
					</div>
					<br><a href="<?php echo base_url('mahasiswa/ujian/frameujian/'.$id_data_ujian.'4_52') ?>" class="btn btn-secondary btn-icon-split btn-sm">
					<span class="text">Nomer 2</span>
				</a>
			</div>
		</div>
	</body>



	<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

	<script src="<?php echo base_url(); ?>assets/js/sb-admin-2.min.js"></script>