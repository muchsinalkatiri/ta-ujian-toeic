<?php 
$this->load->view('v_admin/v_admin_header');
?>
<link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">  
</div> <!-- TUTUP HEADER -->

<nav aria-label="breadcrumb"> <!-- buka breadcumb -->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/soal/paket_soal') ?>">Data Paket Soal</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Part Soal : Listening</li>
  </ol>
</nav> <!-- tutup breadcumb -->

<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 
<div class="card shadow mb-4">
  <div class="card-header py-2 ">
    <h6 class="m-0 font-weight-bold text-gray-900">Penjelasan Listening</h6>
  </div>
  <div class="card-body">
    <form class="user" action="<?php echo base_url('admin/soal/part_soal/listening/'.$paket_soal->nama_paket) ?>" method="post" enctype="multipart/form-data">
      <div class="row" > <!-- open validasi -->
        <div class="col-sm-6">
          <div id="notifications1" class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('penjelasan_listening'); ?></div> 
        </div> 
      </div> <!-- tutup validasi -->
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <textarea rows="5" type="text" class="form-control" id="penjelasan_listening" placeholder="Tulis Penjelasan Listening Untuk Paket ini disini" name="penjelasan_listening"><?php echo set_value('penjelasan_listening', $paket_soal->penjelasan_listening) ?></textarea>
        </div>
        <div  class="col-sm-6 ">
          <?php if($paket_soal->penjelasan_listening != ""){ ?>
            <textarea rows="5" readonly="" class="form-control" ><?php echo $paket_soal->penjelasan_listening; ?></textarea>
            <?php } ?>
          </div>
        </div>
        <div class="col-sm-6">
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
          </form>
        </div>
      </div>

      <div class="card shadow mb-4">
        <div class="card-header py-2 ">
          <h6 class="m-0 font-weight-bold text-gray-900">Paket Soal : <?php echo $paket_soal->nama_paket ?> (Soal 1-100)</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered nowrap text-center" id="dataTable"  cellspacing="0">
              <thead>
               <tr>
                <th>SOAL NOMOR</th>
                <th>NAMA PART</th>
                <th>DIRECTIONS & EXAMPLE</th>
                <th>JUMLAH SOAL</th>
                <th>DATA SOAL</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($part_soal as $data_part_soal ) {
                if($data_part_soal->nama_part == 'Photographs'){
                  $max_soal = 10;
                  $nama_part = 'photographs';
                }elseif($data_part_soal->nama_part == 'Question-Response'){
                  $max_soal = 30;
                  $nama_part = 'question_response';
                }elseif($data_part_soal->nama_part == 'Conversation'){
                  $max_soal = 30;
                  $nama_part = 'conversation';
                }elseif($data_part_soal->nama_part == 'Short Talks'){
                  $max_soal = 30;
                  $nama_part = 'short_talks';
                }
                $total_persen = ($data_part_soal->jumlah_soal * 100)/$max_soal;
                ?>
                <tr>
                  <td><?php echo $data_part_soal->untuk_soal_nomor ?></td>
                  <td><?php echo $data_part_soal->nama_part ?></td>
                  <td>
                  <a href="#" class="btn-sm btn-success btn-circle" data-toggle="modal" data-target="#ModalDetail<?php echo $data_part_soal->id_part
                  ; ?>" ><i class="fa fa-info"></i></a>
                   <a  href="<?php echo base_url(). 'admin/soal/part_soal/directions_example/' . $data_part_soal->id_part ?>" class="mb-1 text-xs btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-edit fa-sm"></i>
                    </span>
                    <span class="text ">Directions & Example</span>
                  </a>
                </td>
                <td>
                  <div class="col">
                    <div class="progress progress-sm ">
                      <div class="progress-bar bg-success" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $total_persen?>%;"></div>
                    </div>
                  </div>
                  <div class="mr-1 font-weight-bold text-gray-800"><?php echo $total_persen.'% ('.$data_part_soal->jumlah_soal.'/'.$max_soal.')' ;?></div>
                </td> 
                <td>
                 <a  href="<?php echo base_url(). 'admin/soal/' . $nama_part.'/data_soal/'.$data_part_soal->nama_paket.'4_5'.$data_part_soal->id_part ?>" class="mb-1 text-xs btn btn-danger btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-plus fa-sm"></i>
                  </span>
                  <span class="text ">Data Soal</span>
                </a>
              </td>
            </tr>

            <!-- MODAL detail -->
              <div  class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="ModalDetail<?php echo $data_part_soal->id_part; ?>">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Directions & Example</h5>
                      <a href="<?php echo base_url(). 'admin/soal/part_soal/directions_example/' . $data_part_soal->id_part ?>">
                        <span class="text"><i class="fas fa-edit fa-sm"></i> Edit</span>
                      </a>
                    </div>
                    <div class="modal-body">
                      <strong>Directions :</strong><br>
                      <?php echo $data_part_soal->directions; ?><br>
                      <strong>Example :</strong><br>
                      <?php echo $data_part_soal->example; ?><br>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                  </div>
                </div>
              </div>
              <!--END MODAL detail-->

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
          });
        });

        $('#notifications').slideDown('slow').delay(5000).slideUp('slow');
        $('#notifications1').slideDown('slow').delay(5000).slideUp('slow');
        $('#notifications2').slideDown('slow').delay(5000).slideUp('slow');
        $('#notifications3').slideDown('slow').delay(5000).slideUp('slow');
      </script>