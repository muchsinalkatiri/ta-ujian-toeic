<?php 
$this->load->view('v_admin/v_admin_header');
?>
<link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">  
</div> <!-- TUTUP HEADER -->

<nav aria-label="breadcrumb"> <!-- buka breadcumb -->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Paket Soal</li>
  </ol>
</nav> <!-- tutup breadcumb -->

<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 
<div class="card shadow mb-4">
  <div class="card-header py-2 ">
    <h6 class="m-0 font-weight-bold text-gray-900">Tambah Paket Soal</h6>
  </div>
  <div class="card-body">
    <form class="user" action="<?php echo base_url('admin/soal/paket_soal') ?>" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-8">
          <div class="row" > 
            <div class="col-sm-6">
              <div  class="font-weight-bold  mb-1">Nama Paket Soal</div> 
            </div>
            <div class="col-sm-6">
              <div  class="font-weight-bold  mb-1">File Audio</div> 
            </div> 
          </div> <!-- tutup validasi -->
          <div class="row" > <!-- open validasi -->
            <div class="col-sm-6">
              <div id="notifications1" class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('nama_paket'); ?></div> 
            </div>
            <div class="col-sm-6">
              <div id="notifications2" class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('file_audio'); ?></div> 
              <div id="notifications3" class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo $this->session->flashdata('msg1'); ?></div> 
            </div> 
          </div> <!-- tutup validasi -->
          <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <input type="text" class="form-control" value="<?php echo set_value('nama_paket'); ?>" id="nama_paket" placeholder="Nama Paket" name="nama_paket">
            </div>
            <div class="col-sm-6">
              <input type="file"  class="form-control" value="<?php echo set_value('file_audio'); ?>" id="file_audio" name="file_audio" placeholder="File Audio" onkeyup="showAudio()">
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
            <div id="div_audio" style="display: none; " class="col-sm-4 ">
              <div class="row" >
                <div class="col-sm-12">
                  <div  class="font-weight-bold  mb-1">Audio Listening</div> 
                </div>
                <div class="col-sm-12">
                  <audio src="" type="audio/mpeg"  id="id_audio" class="form-control"  controls></audio>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="card shadow mb-4">
      <div class="card-header py-2 ">
        <h6 class="m-0 font-weight-bold text-gray-900">Data Paket Soal</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
        <table class="table table-striped table-bordered nowrap text-center" id="dataTable"  cellspacing="0">
            <thead>
             <tr>
              <th>NAMA PAKET</th>
              <th>FILE AUDIO</th>
              <th style="width: 200px; " >JUMLAH SOAL</th>
              <th>ISI PAKET SOAL</th>
              <th>ACTION</th>
            </tr>
          </thead>
          <tbody >
           <?php foreach ($paket_soal as $data_paket_soal ) {?>
            <tr>
              <td><?php echo $data_paket_soal->nama_paket ?></td>
              <td>              
                <audio  controls controlsList="nodownload">
                  <source  type="audio/mpeg" src="<?php echo base_url()."uploads/sound-ujian/".$data_paket_soal->file_audio ?>">
                  </audio>
                </td>
                <td>
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <div class="mr-1 font-weight-bold text-gray-800"><i class="fa fa-volume-up"></i> <?php echo $data_paket_soal->jumlah_soal_listening ;?>%</div>
                    </div>
                    <div class="col">
                      <div class="progress progress-sm ">
                        <div class="progress-bar bg-info" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $data_paket_soal->jumlah_soal_listening ;?>%;"></div>
                      </div>
                    </div>
                  </div>
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <div class="mr-1 font-weight-bold text-gray-800"><i class="fa fa-book-open"></i> <?php echo $data_paket_soal->jumlah_soal_reading ;?>%</div>
                    </div>
                    <div class="col">
                      <div class="progress progress-sm ">
                        <div class="progress-bar bg-warning" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $data_paket_soal->jumlah_soal_reading;?>%;"></div>
                      </div>
                    </div>
                  </div>
                  <div class="mr-1 font-weight-bold text-gray-800"><?php $total= $data_paket_soal->jumlah_soal/2;  echo $total.'% ('.$data_paket_soal->jumlah_soal.'/200)' ;?></div>
                </td>
                <td>
                  <a  href="<?php echo base_url(). 'admin/soal/part_soal/listening/' . $data_paket_soal->nama_paket ?>" class="mb-1 text-xs btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-volume-up fa-sm"></i>
                    </span>
                    <span class="text ">Soal Listening</span>
                  </a>
                  <br>
                  <a href="<?php echo base_url(). 'admin/soal/part_soal/reading/' . $data_paket_soal->nama_paket ?>" class="text-xs btn btn-warning btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-book-open fa-sm"></i>
                    </span>
                    <span class="text ">Soal Reading</span>
                  </a>
                </td>
                <td><center>
                  <a href="#" class="btn-sm btn-success btn-circle" data-toggle="modal" data-target="#ModalDetail<?php echo $data_paket_soal->id_paket; ?>" ><i class="fa fa-info"></i></a>
                  <a href="<?php echo base_url(). 'admin/soal/paket_soal/update/' . $data_paket_soal->id_paket ?>" class="btn-sm btn-primary btn-circle"   ><i class="fa fa-edit"></i></a>
                  <a href="#" class="btn-sm btn-danger btn-circle" data-toggle="modal" data-target="#ModalHapus<?php echo $data_paket_soal->id_paket; ?>" ><i class="fa fa-trash"></i></a>
                </center></td>  
              </tr>

              <!-- MODAL Detail -->
              <div  class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="ModalDetail<?php echo $data_paket_soal->id_paket; ?>">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <strong>ID PAKET</strong> : <?php echo $data_paket_soal->id_paket; ?><br>
                      <strong>NAMA PAKET</strong> : <?php echo $data_paket_soal->nama_paket; ?><br>
                      <strong>TANGGAL DIBUAT</strong> : <?php echo $data_paket_soal->tanggal_dibuat; ?><br>
                      <strong>FILE AUDIO</strong> : <?php echo $data_paket_soal->file_audio; ?><br>
                      <strong>JUMLAH SOAL LISTENING</strong> : <?php echo $data_paket_soal->jumlah_soal_listening; ?><br>
                      <strong>JUMLAH SOAL READING</strong> : <?php echo $data_paket_soal->jumlah_soal_reading; ?><br>
                      <strong>JUMLAH SOAL TOTAL</strong> : <?php echo $data_paket_soal->jumlah_soal; ?><br>
                      <strong>PENJELASAN LISTENING</strong> : <?php echo $data_paket_soal->penjelasan_listening; ?><br>
                      <strong>PENJELASAN READING</strong> : <?php echo $data_paket_soal->penjelasan_reading; ?><br>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                  </div>
                </div>
              </div>
              <!--END MODAL detail-->

              <!-- MODAL Hapus -->
              <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="ModalHapus<?php echo $data_paket_soal->id_paket; ?>">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Delete this data?</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">Apakah kamu yakin ingin menghapus Paket: <?php echo $data_paket_soal->nama_paket; ?> ?</div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                      <a href="<?php echo base_url(). 'admin/soal/paket_soal/delete/' . $data_paket_soal->id_paket?>" class="btn btn-danger btn-icon-split">
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
        });
      });

      $('#notifications').slideDown('slow').delay(5000).slideUp('slow');
      $('#notifications1').slideDown('slow').delay(5000).slideUp('slow');
      $('#notifications2').slideDown('slow').delay(5000).slideUp('slow');
      $('#notifications3').slideDown('slow').delay(5000).slideUp('slow');
    </script>
    <script type="text/javascript">
      function showAudio() {
        var x = document.getElementById("file_audio");  

        var myDiv = document.getElementById("div_audio");
        if (x.value != "")
        {
          myDiv.style.display = "block";
        } else {
          myDiv.style.display = "none";
        }    
      }
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
