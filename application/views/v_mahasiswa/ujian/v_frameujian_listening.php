	<link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


	<link href="<?php echo base_url(); ?>assets/css/sb-admin-2.css" rel="stylesheet">
	<?php $split = explode('4_5', $this->uri->segment('4')); $id_data_ujian = $split[0];//ambil data id ujian dari link  ?> 
	<?php $split = explode('4_5', $this->uri->segment('4')); $nomer_soal = $split[1];//ambil data id ujian dari link  ?> 

	<body id="page-top" class="bg-gray-100" onload="myFunction()">
	<div id="loading" style="opacity: 1; position: fixed; left: 0; top: 0; width: 100%; height: 100%; z-index: 99; ">
		<div class="card shadow mb-4">
		    <div style="height: 700px; "  class=" card-body">
		      <div class="row">
		        <div class="col-md-5">
		        </div> 
		        <div class="col-md-2">
		          <div class="ball ball-1"></div>
		          <div class="ball ball-2"></div>
		          <div class="ball ball-3"></div><br><br><br><br>
		          <h2>Loading...</h2>
		        </div> 
		        <div class="col-md-5">
		        </div>  
		      </div>
		    </div>
		  </div>
	</div>
	  <div id="page" style="opacity: 0; " >
		<div  class="card shadow mb-4" >
			<div class="card-body" >
				<div class="row">
					<div class="col-sm-8" style="color: #000000; ">
					<?php if(!empty($soal->nomer_soal) ){ ?> <!-- jika soal belum dimasukan -->
						<?php if($soal->nomer_soal == 1 ){ ?> <!-- untuk soal nomer 1, khusus, pembukaan section listening  -->
							<h3 class="text-center" style=" font-weight: bold; ">Section 1</h3>
							<h1  class="text-center" style=" font-weight: 800; border-bottom: solid 3px; ">Listening Test</h1>
						<?php } ?> <!-- tutup -->
						<?php if(!empty($paket->penjelasan_listening) && $soal->nomer_soal == 1 ){ ?> <!-- penjelasan  -->
							<p class="text-justify mb-3" style="border:1px; border-style:solid; border-color:gray; border-radius: 5px; padding: 3px;"><?php echo $paket->penjelasan_listening; ?></p>
						<?php } ?> <!-- tutup -->
						<?php if($soal->nomer_soal == 1 || $soal->nomer_soal == 11 || $soal->nomer_soal == 41 || $soal->nomer_soal == 71 ){ ?> <!-- untuk soal pembukaan part  -->
							<h3 style="border-bottom: solid 2px; "><b>Part : <?php echo $part->nama_part; ?></b></h3>
						<?php } ?> <!-- tutup -->

						<?php if($part->directions != "" && ($soal->nomer_soal == 1 || $soal->nomer_soal == 11 || $soal->nomer_soal == 41 || $soal->nomer_soal == 71 )){ ?> <!-- jika directions ada -->
							<div class="mb-2" style="border:1px; border-style:solid; border-color:gray; border-radius: 5px; padding: 3px;">
								<span  style="font-style: italic; ">Directions</span>
								<h5 class="text-justify" ><?php echo $part->directions; ?></h5>
							</div>
						<?php } ?> <!-- tutup -->

						<?php if($part->example != "" && ($soal->nomer_soal == 1 || $soal->nomer_soal == 11 || $soal->nomer_soal == 41 || $soal->nomer_soal == 71 )){ ?> <!-- jika example ada -->
							<div class="mb-2" style="border:1px; border-style:solid; border-color:gray; border-radius: 5px; padding: 3px;">
								<span  style="font-weight: bold; ">Example</span>
								<h5 class="text-justify" ><?php echo $part->example; ?></h5>
							</div>
						<?php } ?> <!-- tutup -->

						<?php if($soal->nomer_soal == 1){ ?>
							<p class="mt-3" style="border-bottom :solid 1px; "><b>Now Part 1 Will Begin</b></p>
						<?php } ?> <!-- tutup -->

						<?php if($soal->id_kelompok_soal != 0){ ?>
						<?php echo $kelompok->bacaan; ?>
						<?php } ?> <!-- tutup -->

						<?php if($soal->nomer_soal >= 1 && $soal->nomer_soal <= 10){ ?> <!-- untuk soal nomer 1-10  -->
							<p>
								<ol> 
									<li value="<?php echo $soal->nomer_soal ?>">									
										<img class="card shadow mb-7"  alt="Preview Gambar" style=' border-radius: 5%;  ' src="<?php echo base_url()."uploads/img-soal/photograps/".$soal->isi_soal?>"> 
									</li>
								</ol>
							</p>
						<?php } ?> <!-- tutup -->


						<?php if($soal->nomer_soal >= 11 && $soal->nomer_soal <= 40){ ?> <!-- untuk soal nomer 1-10  -->
							<p>
								<ol> 
									<li value="<?php echo $soal->nomer_soal ?>">									
									</li>
								</ol>
							</p>
							
						<?php } ?> <!-- tutup -->

						<?php if($soal->nomer_soal >= 41 && $soal->nomer_soal <= 100){ ?> <!-- untuk soal nomer 1-10  -->
								<ol> 
									<li value="<?php echo $soal->nomer_soal ?>"><?php echo $soal->isi_soal ?></li>
								</ol>
						<?php } ?> <!-- tutup -->

							<form  method="post">
								<div class="ml-5">
								<?php if(!empty($jawaban->jawaban) && $jawaban->jawaban== 'a'){?>
									<input type="radio" checked  name="jawaban_siswa" value="a"/> <b>A.</b> <?php echo $soal->opsi_a; ?><br>
								<?php }else{ ?>
									<input type="radio"  name="jawaban_siswa" value="a"/> <b>A.</b> <?php echo $soal->opsi_a; ?><br>
								<?php } ?>
								<?php if(!empty($jawaban->jawaban) && $jawaban->jawaban== 'b'){?>
									<input type="radio" checked  name="jawaban_siswa" value="b"/> <b>B.</b> <?php echo $soal->opsi_b; ?><br>
								<?php }else{ ?>
									<input type="radio"  name="jawaban_siswa" value="b"/> <b>B.</b> <?php echo $soal->opsi_b; ?><br>
								<?php } ?>
								<?php if(!empty($jawaban->jawaban) && $jawaban->jawaban== 'c'){?>
									<input type="radio" checked  name="jawaban_siswa" value="c"/> <b>C.</b> <?php echo $soal->opsi_c; ?><br>
								<?php }else{ ?>
									<input type="radio"  name="jawaban_siswa" value="c"/> <b>C.</b> <?php echo $soal->opsi_c; ?><br>
								<?php } ?>
								<?php if(!empty($jawaban->jawaban) && $jawaban->jawaban== 'd'){?>
									<input type="radio" checked  name="jawaban_siswa" value="d"/> <b>D.</b> <?php echo $soal->opsi_d; ?><br>
								<?php }else{ ?>
									<input type="radio"  name="jawaban_siswa" value="d"/> <b>D.</b> <?php echo $soal->opsi_d; ?><br>
								<?php } ?>

								</div>
								<input type=hidden name=nomer_soal value=<?php echo $soal->nomer_soal; ?>>
								<input type=hidden name=id_data_ujian value=<?php echo $ujian->id_data_ujian; ?>>
								<center>
									<?php if($soal->nomer_soal != 1){ ?>
						            <button type="submit" class="mt-2 btn bg-gray-900 text-gray-100" formaction="<?php echo base_url('mahasiswa/ujian/masukan_jawaban/1') ?>">
						              <i class="fa fa-arrow-circle-left"></i> Previous
	            					</button>
									<?php } ?> <!-- tutup -->
						            <button type="submit" class="mt-2 btn bg-gray-900 text-gray-100 " formaction="<?php echo base_url('mahasiswa/ujian/masukan_jawaban/0') ?>">
						              Confirm
	            					</button>
									<?php if($soal->nomer_soal != 100){ ?>
						            <button type="submit"  class="mt-2 btn bg-gray-900 text-gray-100 " formaction="<?php echo base_url('mahasiswa/ujian/masukan_jawaban/2') ?>">
						              Next <i class="fa fa-arrow-circle-right"></i> 
	            					</button>
									<?php } ?> <!-- tutup -->
            					</center>
							</form>
					<?php }else{ ?> <!-- jika nomer soal kosong -->
						Soal Tidak Tersedia
						<?php $next = $nomer_soal +1; $prev=$nomer_soal-1; ?>
						<center>
							<?php if($nomer_soal != 1){ ?>
							<a type="submit"  class="mt-5 btn bg-gray-900 text-gray-100 " href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_5'.$prev); ?>">
				              <i class="fa fa-arrow-circle-left"></i> Previous  
	    					</a>
							<?php } ?> <!-- tutup -->
							<?php if($nomer_soal != 100){ ?>
							<a type="submit"  class="mt-5 btn bg-gray-900 text-gray-100 " href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_5'.$next); ?>">
				              Next <i class="fa fa-arrow-circle-right"></i> 
	    					</a>
							<?php } ?> <!-- tutup -->
    					</center>
					<?php } ?> <!-- tutup -->
					</div>
					<div class="col-sm-4">
						<?php 
						$this->load->view('v_mahasiswa/ujian/v_panel_soal');
						?> 
					</div>
				</div>
		</div>
	</div>
	</div>
</body>



	<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

	<script src="<?php echo base_url(); ?>assets/js/sb-admin-2.min.js"></script>
	    <script>
        function myFunction()
        {
            document.getElementById("page").style.opacity = 1;
            document.getElementById("loading").style.opacity = 0;
            document.getElementById("loading").style.display = "none";
        }
    </script>