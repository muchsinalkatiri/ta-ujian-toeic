<?php 
$this->load->view('v_admin/v_admin_header');
?>
<link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> 
<link href="<?php echo base_url(); ?>assets/vendor/datetimepicker/css/bootstrap-datetimepicker.css" rel="stylesheet"> 
</div> <!-- TUTUP HEADER -->

<nav aria-label="breadcrumb"> <!-- buka breadcumb -->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Paket Soal</li>
  </ol>
</nav> <!-- tutup breadcumb -->

<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 
<div class="card shadow mb-4">

  <div class="card-body">
    <form class="user" action="<?php echo base_url('admin/sesi_ujian') ?>" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-12">
          <div class="row" > 
            <div class="col-sm-4">
              <div  class="font-weight-bold  mb-1">Nama Sesi Ujian</div> 
            </div>
            <div class="col-sm-4">
              <div  class="font-weight-bold  mb-1">Waktu Mulai</div> 
            </div> 
            <div class="col-sm-4">
              <div  class="font-weight-bold  mb-1">Waktu Berakhir</div> 
            </div> 
          </div> <!-- tutup validasi -->
          <div class="row" > <!-- open validasi -->
            <div class="col-sm-4">
              <div id="notifications1" class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('nama_sesi_ujian'); ?></div> 
            </div>
            <div class="col-sm-4">
              <div id="notifications2" class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('waktu_dimulai'); ?></div> 
            </div>
            <div class="col-sm-4">
              <div id="notifications3" class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('waktu_berakhir'); ?></div>  
            </div> 
          </div> <!-- tutup validasi -->
          <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
              <input type="text" class="form-control" value="<?php echo set_value('nama_sesi_ujian'); ?>" id="nama_sesi_ujian" placeholder="Nama Sesi Ujian" name="nama_sesi_ujian">
            </div>
            <div class="col-sm-4">
              <input type="text"  class="form-control time" value="<?php echo set_value('waktu_dimulai'); ?>" id="waktu_dimulai" name="waktu_dimulai" placeholder="Waktu Dimulai" >
            </div>
            <div class="col-sm-4">
              <input type="text"  class="form-control time" value="<?php echo set_value('waktu_berakhir'); ?>" id="waktu_berakhir" name="waktu_berakhir" placeholder="Waktu Berakhir" >
            </div>
          </div>
          <?php if($this->session->userdata('level')=='0'){ ?>
            <button type="submit" class="btn bg-gray-900 text-gray-100 btn-user btn-block">
              Tambahkan
            </button>
            <?php }else{ ?>
              <button type="submit" class="btn bg-gray-700 text-gray-100 btn-user btn-block">
                Tambahkan
              </button>
              <?php } ?>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable"  cellspacing="0">
            <thead>
              <tr class="text-xs ">
                <th>NAMA SESI</th>
                <th>WAKTU DIMULAI</th>
                <th>WAKTU BERAKHIR</th>
                <th>NAMA ADMIN</th>
                <th>PESERTA</th>
                <th>STATUS</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($sesi_ujian as $sesi ) {
                if ($sesi->status == 'dihentikan') {
                  $status = 'dihentikan';
                }else{                  
                  if ($sesi->waktu_berakhir > date('Y-m-d H:i:s') && $sesi->waktu_dimulai < date('Y-m-d H:i:s')) {
                    $status = 'tersedia';
                  }elseif ($sesi->waktu_berakhir < date('Y-m-d H:i:s') ){
                    $status = 'berakhir';
                  }elseif ($sesi->waktu_dimulai > date('Y-m-d H:i:s')){
                    $status = 'belum dibuka';
                  }
                }
                ?>
                <tr>
                  <td><a href="<?php echo base_url(). 'admin/sesi_ujian/peserta/' . $sesi->id_sesi_ujian?>" class="btn-sm text-gray-100 bg-gray-900" ><?php echo $sesi->nama_sesi_ujian ?></a></td>
                  <td><?php echo $sesi->waktu_dimulai ?></td>
                  <td><?php echo $sesi->waktu_berakhir ?></td>
                  <td><?php echo $sesi->nama_admin ?></td>
                  <td><?php echo $sesi->jumlah_peserta ?></td>
                  <td><?php echo $status ?></td>
                  <td><center>
                    <?php if($sesi->status != 'dihentikan'){ ?>
                      <a href="#" class="d-none d-sm-inline-block btn btn-sm bg-gray-900 text-white shadow-sm" data-toggle="modal" data-target="#ModalHentikan<?php echo $sesi->id_sesi_ujian; ?>" ><i class="fas fa-stop  text-danger"></i> Hentikan Sesi</a>
                      <?php } ?>
                      <a href="#" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#ModalHapus<?php echo $sesi->id_sesi_ujian; ?>" ><i class="fa fa-trash"></i></a>
                    </center></td>
                  </tr>



                  <!-- MODAL Hentikan -->
                  <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="ModalHentikan<?php echo $sesi->id_sesi_ujian; ?>">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Hentikan sesi ini?</h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">Apakah kamu yakin ingin hentikan sesi <?php echo $sesi->nama_sesi_ujian; ?> ?</div>
                        <div class="modal-footer">
                          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                          <a href="<?php echo base_url(). 'admin/sesi_ujian/berhenti/'.$sesi->id_sesi_ujian?>" class="btn btn-danger btn-icon-split">
                            <span class="icon text-white-50">
                              <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">Hentikan</span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--END MODAL Hentikan-->
                  <!-- MODAL Hapus -->
                  <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="ModalHapus<?php echo $sesi->id_sesi_ujian; ?>">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Delete this data?</h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">Apakah kamu yakin ingin menghapus <?php echo $sesi->id_sesi_ujian; ?> ?</div>
                        <div class="modal-footer">
                          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                          <a href="<?php echo base_url(). 'admin/sesi_ujian/delete/' . $sesi->id_sesi_ujian?>" class="btn btn-danger btn-icon-split">
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

        <script src="<?php echo base_url(); ?>assets/vendor/datetimepicker/js/bootstrap-datetimepicker.js"></script>
        <script type="text/javascript">
          $(document).ready(function() {
            $('#dataTable').DataTable({
            });
          });

          $('#notifications').slideDown('slow').delay(5000).slideUp('slow');
          $('#notifications1').slideDown('slow').delay(5000).slideUp('slow');
          $('#notifications2').slideDown('slow').delay(5000).slideUp('slow');
          $('#notifications3').slideDown('slow').delay(5000).slideUp('slow');
        </script>
        <script type="text/javascript">
          $(document).ready(function () {
            $('.time').datetimepicker({format: 'yyyy-mm-dd hh:ii:ss', todayBtn: true,
              autoclose: true,
              pickerPosition: "top-left"});
          });
        </script>