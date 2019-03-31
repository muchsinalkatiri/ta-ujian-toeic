<?php 
    $this->load->view('v_admin/v_admin_header');
 ?>
  <link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">  

            <a href="<?php echo base_url('admin/mahasiswa/create') ?>" class="d-none d-sm-inline-block btn btn-sm bg-gray-900 text-gray-100 shadow-sm" ><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
          </div> <!-- TUTUP HEADER -->

          <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 

          <div class="card shadow mb-4">
          	<div class="card-body">
          		<div class="table-responsive">
          			<table class="table table-bordered" id="dataTable"  cellspacing="0">
          				<thead>
          					<tr>
          						<th>NIM</th>
                      <th>NAMA</th>
                      <th>ALAMAT</th>
          						<th>TTL</th>
          						<th>NOTLP</th>
          						<th>ACTION</th>
          					</tr>
          				</thead>
          				<tbody>
          					<?php foreach ($mahasiswa as $data_mahasiswa ) {?>
          						<tr>
          							<td><?php echo $data_mahasiswa->nim ?></td>
                        <td><?php echo $data_mahasiswa->nama ?></td>
                        <td><?php echo $data_mahasiswa->alamat ?></td>
          							<td><?php echo $data_mahasiswa->ttl ?></td>
          							<td><?php echo $data_mahasiswa->notlp ?></td>
          							<td><center>
                          <a href="#" class="btn btn-success btn-circle" data-toggle="modal" data-target="#ModalDetail<?php echo $data_mahasiswa->nim; ?>" ><i class="fa fa-info"></i></a>
          								<a href="<?php echo base_url(). 'admin/mahasiswa/update/' . $data_mahasiswa->nim ?>" class="btn btn-primary btn-circle"  ><i class="fa fa-edit"></i></a>
          								<a href="#" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#ModalHapus<?php echo $data_mahasiswa->nim; ?>" ><i class="fa fa-trash"></i></a>
          							</center></td>
          						</tr>


            <!-- MODAL Detail -->
            <div  class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="ModalDetail<?php echo $data_mahasiswa->nim; ?>">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <strong>NIM</strong> : <?php echo $data_mahasiswa->nim; ?><br>
                    <strong>NAMA</strong> : <?php echo $data_mahasiswa->nama; ?><br>
                    <strong>ALAMAT</strong> : <?php echo $data_mahasiswa->alamat; ?><br>
                    <strong>TEMPAT/TANGGAL LAHIR</strong> : <?php echo $data_mahasiswa->ttl; ?><br>
                    <strong>JURUSAN</strong> : <?php echo $data_mahasiswa->jurusan; ?><br>
                    <strong>NOMOR TELEPON</strong> : <?php echo $data_mahasiswa->notlp; ?><br>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>
            </div>
            <!--END MODAL detail-->

            <!-- MODAL Hapus -->
            <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="ModalHapus<?php echo $data_mahasiswa->nim; ?>">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete this data?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">Apakah kamu yakin ingin menghapus <?php echo $data_mahasiswa->nim; ?> ?</div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a href="<?php echo base_url(). 'admin/mahasiswa/delete/' . $data_mahasiswa->nim ?>" class="btn btn-danger btn-icon-split">
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
        targets: [1,2,3],
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


