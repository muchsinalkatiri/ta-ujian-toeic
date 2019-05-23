<?php 
$this->load->view('v_admin/v_admin_header');
?>
<link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> 
</div> <!-- TUTUP HEADER -->

<nav aria-label="breadcrumb"> <!-- buka breadcumb -->
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Data nilai</li>
	</ol>
</nav> <!-- tutup breadcumb -->

<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 
<div class="card shadow mb-4">
	<div class="card-body">
		<table class="table table-bordered text-xs text-center" id="dataTable2"  cellspacing="0">
			<button onclick="printdatanilai()" class="mb-2 btn-sm btn btn-warning" type="button"><span class="fa fa-print"></span> Cetak Pdf</button>
			<thead>
				<tr >
					<th>SESI</th>
					<th>NIM</th>
					<th>SOAL TERJAWAB</th>
					<th>JAWABAN BENAR</th>
					<th>SCORE</th>
					<th>TOTAL SCORE</th>
					<th>LEVEL OF COMPETENT</th>
					<th>KIRIM</th>
					<th>ACTION</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($data_nilai as $nilai ) {
					?>
					<tr>
						<td><?php echo $nilai->nama_sesi_ujian ?></td>
						<td><?php echo $nilai->nim ?></td>
						<td><?php echo $nilai->terjawab_listening ?> Listening & <br> <?php echo $nilai->terjawab_reading ?> Reading</td>
						<td><?php echo $nilai->benar_listening ?> Listening & <br> <?php echo $nilai->benar_reading ?> Reading</td>
						<td>Listening : <?php echo $nilai->score_listening ?> & <br>Reading : <?php echo $nilai->score_reading ?></td>
						<td><?php echo $nilai->total_score ?></td>
						<td><?php echo $nilai->level_of_competent ?></td>
						<td><center>
							<a  class="d-none d-sm-inline-block btn btn-sm bg-danger text-gray-100 shadow-sm mb-1" style="width: 100px;"  href="<?php echo base_url('kirim/admin_kirim_email/'.$nilai->id_data_nilai)?>" ><i class="fas fa-envelope  text-white"></i> Email</a><br>
							<a  class="d-none d-sm-inline-block btn btn-sm bg-success text-gray-100 shadow-sm" style="width: 100px;"  href="<?php echo base_url('kirim/admin_kirim_whatsapp/'.$nilai->id_data_nilai)?>" ><i class="fab fa-whatsapp  text-white"></i> Whatsapp</a>
						</center></td>
						<td><center>
							<a href="#" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $nilai->id_data_nilai; ?>" ><i class="fa fa-trash"></i></a>
						</center></td>
					</tr>
					<!-- MODAL Hapus -->
					<div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="ModalHapus<?php echo $nilai->id_data_nilai; ?>">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Delete this data?</h5>
									<button class="close" type="button" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<div class="modal-body">Apakah kamu yakin ingin menghapus <?php echo $nilai->id_data_nilai; ?> ?</div>
								<div class="modal-footer">
									<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
									<a href="<?php echo base_url(). 'admin/ujian/data_nilai/delete/' . $nilai->id_data_nilai?>" class="btn btn-danger btn-icon-split">
										<span class="icon text-white-50">
											<i class="fas fa-trash"></i>
										</span>
										<span class="text">Delete</span>
									</a>
								</div>
							</div>
						</div>
					</div>
					<!--END MODAL Hapus-->
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>







	<?php 
	$this->load->view('v_admin/v_admin_footer');
	?>

	<script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/datatables/buttons.html5.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/datatables/buttons.print.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.buttons.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/datatables/js/buttons.flash.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#dataTable2').DataTable({
				"searching": false,
				dom: 'Bfrtip',
				buttons: [
				{
					extend: 'print',
					exportOptions: {
						columns: [ 0,1,2,3,4,5,6]
					},
					footer: true,
					title: function(){
						var printTitle = 'Data Nilai';
						return printTitle
					},
					customize: function ( win ) {
						$(win.document.body)
						.css( 'font-size', '10pt' )
						.prepend(
							'<div style="text-align: center; width: 100%;"><img src="<?php echo base_url(); ?>assets/img/logo_polinema.png" style="position:absolute; opacity: 0.1; width: 800px; height: auto; margin-left: -370px;margin-top: 200px; " /></div>'
							);

						$(win.document.body).find( 'table' )
						.addClass( 'compact' )
						.css( 'font-size', 'inherit' );
					}

				}
				]
			});
			$(document).ready(function() {
				$('.dt-buttons').attr('hidden',true);
			});
		});

		function printdatanilai(){
			$(".buttons-print")[0].click();
		}

		$('#notifications').slideDown('slow').delay(5000).slideUp('slow');
	</script>