<?php 
$this->load->view('v_admin/v_admin_header');
?> 
</div>


<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 
<div class="row ">
	<div class="col-lg-10">
		<div class="card shadow mb-7">
			<div class="card-header py-1 ">
				<nav class="navbar">
					<a  href="#" class="text-gray-900 text-lg" data-toggle="modal" data-target="#ModalPengiriman"><h3 class="mt-2 "><img src="<?php echo base_url(); ?>/assets/img/wablas2.png" alt="Smiley face" width="42" height="42" align="middle"> <?php echo $pengiriman->nama_api; ?></h3></a>
					<ul class="navbar-nav ml-auto">
						<a class="text-gray-900 text-lg" href="https://wablas.com/login" >
							<span class="fa fa-cog"></span> Configuration <?php echo $pengiriman->nama_api; ?>
						</a>
					</ul>
				</nav>
			</div>
			<div class="card-body">
				<table class="table">
					<tr>
						<td><strong>Token :</strong></td>
						<td><?php echo $pengiriman->token; ?></td>
						<td>
							<a href="#"  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalEditToken" >
								<i class="fas fa-edit"></i> Update Token
							</a>
						</td>
					</tr>
				</table>
				<hr>
			</div>
		</div>
	</div>
</div>


<div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="ModalPengiriman">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">What is <?php echo $pengiriman->nama_api; ?> ?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<?php echo $pengiriman->keterangan; ?>
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>


<div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="ModalEditToken">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Update Token.</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form class="user" method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/pengiriman/edit/'.$pengiriman->nama_api); ?>" >
				<div class="modal-body">
					<input required="" type="text" name="token" value="<?php echo $pengiriman->token; ?> " class="form-control ">
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary btn-icon-split" type="submit" >
						<span class="icon text-white-50">
							<i class="fas fa-edit"></i>
						</span>
						<span class="text">Update</span>
					</button>
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php 
$this->load->view('v_admin/v_admin_footer');
?>

<script type="text/javascript">
        $('#notifications').slideDown('slow').delay(5000).slideUp('slow');
</script>