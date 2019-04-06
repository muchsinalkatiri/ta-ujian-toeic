<?php 
    $this->load->view('v_admin/v_admin_header');
 ?>
  <link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">  

            <a href="<?php echo base_url('admin/admin/create') ?>" class="d-none d-sm-inline-block btn btn-sm bg-gray-900 text-gray-100 shadow-sm" ><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
          </div> <!-- TUTUP HEADER -->

          <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 

          <div class="card shadow mb-4">
          	<div class="card-body">
          		<div class="table-responsive">
          			<table class="table table-bordered text-center" id="dataTable"  cellspacing="0">
          				<thead>
          					<tr>
          						<th>FOTO</th>
                      <th>NAMA</th>
                      <th>USERNAME</th>
                      <th>LEVEL</th>
          						<th>ACTION</th>
          					</tr>
          				</thead>
          				<tbody>
          					<?php foreach ($admin as $data_admin ) {
                      if($data_admin->level == 0){
                        $level='Super Admin';
                      }elseif ($data_admin->level == 1) {
                        $level='Admin';
                      }
                      ?>
          						<tr>
          							<td><center><img class="card shadow mb-7" id="gambar_nodin"  alt="Preview Gambar" style='width:50px;height:50px; border-radius: 50%;  ' src="<?php echo base_url()."uploads/img-user/admin/".$data_admin->foto ?>"></center> </td>
                        <td><?php echo $data_admin->nama ?></td>
                        <td><?php echo $data_admin->username ?></td>
                        <td><?php echo $level ?></td>
          							<td>
                          <center>
                            <a href="#" class="btn btn-success btn-circle" data-toggle="modal" data-target="#ModalDetail<?php echo $data_admin->id_admin; ?>" ><i class="fa fa-info"></i></a>
            								<a href="<?php echo base_url(). 'admin/admin/update/' . $data_admin->id_admin ?>" class="btn btn-primary btn-circle"  ><i class="fa fa-edit"></i></a>
                            <?php if($data_admin->level != '0'){ ?>
            								<a href="#" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#ModalHapus<?php echo $data_admin->id_admin; ?>" ><i class="fa fa-trash"></i></a>
                            <?php } ?>
                          </center>
          							</td>
          						</tr>


            <!-- MODAL Detail -->
            <div  class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="ModalDetail<?php echo $data_admin->id_admin; ?>">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <strong>ID</strong> : <?php echo $data_admin->id_admin; ?><br>
                    <strong>USERNAME</strong> : <?php echo $data_admin->username; ?><br>
                    <strong>NAMA</strong> : <?php echo $data_admin->nama; ?><br>
                    <strong>TANGGAL PENDAFTARAN</strong> : <?php echo $data_admin->tanggal_pendaftaran; ?><br>
                    <strong>PASSWORD</strong> : <?php echo $data_admin->password; ?><br>
                    <strong>LEVEL</strong> : <?php echo $level; ?><br>
                    <strong>EMAIL</strong> : <?php echo $data_admin->email; ?><br>
                    <center><img class="card shadow mb-7" id="gambar_nodin"  alt="Preview Gambar" style='width:180px;height:180px; border-radius: 50%;  ' src="<?php echo base_url()."uploads/img-user/admin/".$data_admin->foto; ?>"> </center>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>
            </div>
            <!--END MODAL detail-->

            <!-- MODAL Hapus -->
            <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="ModalHapus<?php echo $data_admin->id_admin; ?>">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete this data?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">Apakah kamu yakin ingin menghapus <?php echo $data_admin->nama; ?> ?</div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a href="<?php echo base_url(). 'admin/admin/delete/' . $data_admin->id_admin?>" class="btn btn-danger btn-icon-split">
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
          	</div>



<?php 
    $this->load->view('v_admin/v_admin_footer');
 ?>


<script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#dataTable').DataTable({
      columnDefs: [ {
        targets: [1   ],
        render: function ( data, type, row ) {
          return data.length > 10 ?
          data.substr( 0, 10 ) +'…' :
          data;
        }
      } ]
    });
  });

</script>
<script>   
    $('#notifications').slideDown('slow').delay(3000).slideUp('slow');
</script>


