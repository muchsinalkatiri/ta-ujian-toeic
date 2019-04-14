<?php 
$this->load->view('v_admin/v_admin_header');
?> 
</div> <!-- TUTUP HEADER -->

<nav aria-label="breadcrumb"> <!-- buka breadcumb -->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/soal/paket_soal') ?>">Data Paket Soal</a></li>
    <li class="breadcrumb-item active" aria-current="page">Update Paket Soal</li>
  </ol>
</nav> <!-- tutup breadcumb -->

<div class="row ">
	<div class="col-lg-12">
		<div class="card shadow mb-7">
			<div class="card-header py-3 ">
			</div>
			<div class="card-body">
				<form class="user" action="<?php echo base_url('admin/soal/paket_soal/update/'.$paket_soal->id_paket); ?>" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-sm-12">
							<div class="row" > 
								<div class="col-sm-4">
									<div  class="font-weight-bold  mb-1">Nama Paket Soal</div> 
								</div>
								<div class="col-sm-4">
									<div  class="font-weight-bold  mb-1">File Audio</div> 
								</div> 
								<div class="col-sm-4">
									<div  class="font-weight-bold  mb-1">Audio Listening</div> 
								</div> 
							</div> 
							<div class="row" > <!-- open validasi -->
								<div class="col-sm-4">
									<div id="notifications1" class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('nama_paket'); ?></div> 
								</div>
								<div class="col-sm-4">
									<div id="notifications2" class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('file_audio'); ?></div> 
									<div id="notifications3" class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo $this->session->flashdata('msg1'); ?></div> 
								</div> 
							</div> <!-- tutup validasi -->
							<div class="mb-5 form-group row">
								<div class="col-sm-4 mb-3 mb-sm-0">
									<input type="hidden" class="form-control" value="<?php echo $paket_soal->id_paket; ?>" id="id_paket" placeholder="Nama Paket" name="id_paket">
									<input type="text" class="form-control" value="<?php echo set_value('nama_paket', $paket_soal->nama_paket) ?>" id="nama_paket" placeholder="Nama Paket" name="nama_paket">
								</div>
								<div class="col-sm-4">
									<input type="file"  class="form-control" value="<?php echo set_value('file_audio'); ?>" id="file_audio" name="file_audio" placeholder="File Audio" onkeyup="showAudio()">
								</div>
								<div  class="col-sm-4 ">
									<div id="div_audio">
										<audio src="<?php echo base_url()."uploads/sound-ujian/".$paket_soal->file_audio ?>" type="audio/mpeg"  id="id_audio" class="form-control"  controls></audio>
									</div>
								</div>
							</div>
							<div class=" row" >
								<div class="col-sm-6">
									<div  class="font-weight-bold  mb-1">Penjelasan Listening</div> 
								</div>
								<div class="col-sm-6">
									<div  class="font-weight-bold  mb-1">Penjelasan Reading</div> 
								</div> 
							</div>
							<div class="row" > <!-- open validasi -->
								<div class="col-sm-6">
									<div id="notifications4" class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('penjelasan_listening'); ?></div> 
								</div>
								<div class="col-sm-6">
									<div id="notifications5" class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('penjelasan_reading'); ?></div> 
								</div> 
							</div> <!-- tutup validasi -->
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<textarea rows="5" type="text" class="form-control" id="penjelasan_listening" placeholder="Penjelasan Listening" name="penjelasan_listening"><?php echo set_value('penjelasan_listening', $paket_soal->penjelasan_listening) ?></textarea>
								</div>
								<div  class="col-sm-6 ">
									<textarea rows="5" type="text" class="form-control"  id="penjelasan_reading" placeholder="Penjelasan Reading" name="penjelasan_reading"><?php echo set_value('penjelasan_reading', $paket_soal->penjelasan_reading) ?></textarea>
								</div>
							</div>
						</div>
					</div>
					<?php if($this->session->userdata('level')=='0'){ ?>
						<button type="submit" class="btn bg-gray-900 text-gray-100 btn-user btn-block">
							Update
						</button>
						<?php }else{ ?>
							<button type="submit" class="btn bg-gray-700 text-gray-100 btn-user btn-block">
								Update
							</button>
							<?php } ?>
						</form>
					</div>
				</div>
			</div>
		</div>

		<?php 
		$this->load->view('v_admin/v_admin_footer');
		?>

		<script>   
			$('#notifications').slideDown('slow').delay(5000).slideUp('slow');
			$('#notifications1').slideDown('slow').delay(5000).slideUp('slow');
			$('#notifications2').slideDown('slow').delay(5000).slideUp('slow');
			$('#notifications3').slideDown('slow').delay(5000).slideUp('slow');
			$('#notifications4').slideDown('slow').delay(5000).slideUp('slow');
			$('#notifications5').slideDown('slow').delay(5000).slideUp('slow');

			function bacaAudio(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function (e) {
						$('#id_audio').attr('src', e.target.result);
					}

					reader.readAsDataURL(input.files[0]);
				}
			}


			$("#file_audio").change(function(){
				bacaAudio(this);
			});
		</script>