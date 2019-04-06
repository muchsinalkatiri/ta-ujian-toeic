<?php 
    $this->load->view('v_admin/v_admin_header');
 ?>
  <link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">  

          </div> <!-- TUTUP HEADER -->

          <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 

          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable"  cellspacing="0">
                  <thead>
                    <tr>

                                          <th>ID</th>
                      <th>TIPE USER</th>
                      <th>ID USER</th>
                      <th>TANGGAL PEMBUATAN</th>
                      <th>STATUS RESET</th>
                      <th>ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($lp as $data_lp ) {
                      ?>
                      <tr>
                        <td><?php echo $data_lp->id_token ?></td>
                        <td><?php echo $data_lp->tipe_user ?></td>
                        <td><?php echo $data_lp->id_user ?></td>
                        <td><?php echo $data_lp->tanggal_pembuatan ?></td>
                        <td><?php echo $data_lp->status_reset ?></td>
                        <td><center>
                          <a href="#" class="btn btn-success btn-circle" data-toggle="modal" data-target="#ModalDetail<?php echo $data_lp->id_token; ?>" ><i class="fa fa-info"></i></a>
                          <a href="#" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#ModalHapus<?php echo $data_lp->id_token; ?>" ><i class="fa fa-trash"></i></a>
                        </center></td>
                      </tr>


            <!-- MODAL Detail -->
            <div  class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="ModalDetail<?php echo $data_lp->id_token; ?>">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <strong>ID TOKEN</strong> : <?php echo $data_lp->id_token; ?><br>
                    <strong>TOKEN</strong> : <?php echo $data_lp->token; ?><br>
                    <strong>ID USER</strong> : <?php echo $data_lp->id_user; ?><br>
                    <strong>TANGGAL PEMBUATAN</strong> : <?php echo $data_lp->tanggal_pembuatan; ?><br>
                    <strong>TIPE USER</strong> : <?php echo $data_lp->tipe_user; ?><br>
                    <strong>STATUS RESET</strong> : <?php echo $data_lp->status_reset; ?><br>
                    <strong>TANGGAL GANTI PASSWORD</strong> : <?php echo $data_lp->tanggal_ganti_password; ?><br>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>
            </div>
            <!--END MODAL detail-->

            <!-- MODAL Hapus -->
            <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="ModalHapus<?php echo $data_lp->id_token; ?>">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete this data?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">Apakah kamu yakin ingin menghapus data ini ?</div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a href="<?php echo base_url(). 'admin/data_lupa_password/delete/' . $data_lp->id_token; ?>" class="btn btn-danger btn-icon-split">
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

<script>   
    $('#notifications').slideDown('slow').delay(3000).slideUp('slow');
</script>


