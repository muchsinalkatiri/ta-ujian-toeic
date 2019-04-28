<?php 
$this->load->view('v_admin/v_admin_header');
?>
<link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> 
<link href="<?php echo base_url(); ?>assets/vendor/summernote/summernote.css" rel="stylesheet"> 
</div> <!-- TUTUP HEADER -->

<nav aria-label="breadcrumb"> <!-- buka breadcumb -->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/soal/paket_soal') ?>">Data Paket Soal</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/soal/part_soal/'.$paket_dan_part_soal->jenis_soal).'/'.$paket_dan_part_soal->nama_paket ?>">Data Part Soal</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Soal</li>
  </ol>
</nav> <!-- tutup breadcumb -->

<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-soal-tab" data-toggle="tab" href="#nav-soal" role="tab" aria-controls="nav-soal" aria-selected="true">Data Semua Soal</a>
    <a class="nav-item nav-link" id="nav-example-tab" data-toggle="tab" href="#nav-kelompok" role="tab" aria-controls="nav-kelompok" aria-selected="false">Kelompok Soal</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-soal" role="tabpanel" aria-labelledby="nav-soal-tab">
    <hr>
    <div class="row mb-2  ">
      <div class="col-lg-10">
        <h1 class="h3 mb-3 text-gray-800">Data Soal Paket : <?php echo $paket_dan_part_soal->nama_paket ?></h1>
      </div>
      <div class="col-lg-2" style="text-align: right;  ">
        <a href="<?php echo base_url(). 'admin/soal/'.$this->uri->segment('3').'/tambah/'.$paket_dan_part_soal->nama_paket.'4_5'.$paket_dan_part_soal->id_part.'4_50' ?>" class="d-none d-sm-inline-block btn btn-sm bg-gray-900 text-gray-100 shadow-sm" ><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Soal</a>
      </div>
    </div>
    <div class="card shadow mb-4">
      <div class="card-header py-2 ">
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered nowrap text-center" id="dataTable"  cellspacing="0">
            <thead>
             <tr>
              <th>NOMOR</th>
              <th>ISI SOAL</th>
              <th>JAWABAN</th>
              <th>TANGGAL DIBUAT</th>
              <th>TIPE</th>
              <th>ACTION</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data_soal as $soal ) {
              $opsi_a = strlen($soal->opsi_a) > 10 ? substr($soal->opsi_a,0,10)."..." : $soal->opsi_a;
              $opsi_b = strlen($soal->opsi_b) > 10 ? substr($soal->opsi_b,0,10)."..." : $soal->opsi_b;
              $opsi_c = strlen($soal->opsi_c) > 10 ? substr($soal->opsi_c,0,10)."..." : $soal->opsi_c;
              $opsi_d = strlen($soal->opsi_d) > 10 ? substr($soal->opsi_d,0,10)."..." : $soal->opsi_d;
              ?>
              <tr>
                <td><?php echo $soal->nomer_soal ?></td>
                <td><?php echo $soal->isi_soal ?></td> 
                <td class="text-left">
                <?php if($soal->jawaban == 'a' ){?><strong><?php echo 'a.'.$opsi_a?> <i class="fa fa-check"></i></strong><?php }else{echo 'a.'.$opsi_a;} ?><br>
                <?php if($soal->jawaban == 'b' ){?><strong><?php echo 'b.'.$opsi_b?> <i class="fa fa-check"></i></strong><?php }else{echo 'b.'.$opsi_b;} ?><br>
                <?php if($soal->jawaban == 'c' ){?><strong><?php echo 'c.'.$opsi_c?> <i class="fa fa-check"></i></strong><?php }else{echo 'c.'.$opsi_c;} ?><br>
                <?php if($soal->jawaban == 'd' ){?><strong><?php echo 'd.'.$opsi_d?> <i class="fa fa-check"></i></strong><?php }else{echo 'd.'.$opsi_d;} ?>
                </td>
                <td><?php echo $soal->tanggal_dibuat ?></td>
                <td>
                  <?php if($soal->id_kelompok_soal == 0) {echo 'Individu';}else{  ?>
                    <a href="<?php echo base_url().'admin/soal/'.$this->uri->segment('3').'/data_kelompok_soal/'.$soal->nama_paket.'4_5'.$soal->id_part.'4_5'.$soal->id_kelompok_soal ?>">Kelompok</a>
                    <?php } ?>
                  </td>
                  <td><center>
                    <a href="<?php echo base_url(). 'admin/soal/'.$this->uri->segment('3').'/edit/' . $soal->id_soal ?>" class="btn btn-primary btn-circle"  ><i class="fa fa-edit"></i></a>
                    <a href="#" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#ModalHapus<?php echo $soal->id_soal; ?>" ><i class="fa fa-trash"></i></a>
                  </center></td>
                </tr>

                <!-- MODAL Hapus -->
                <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="ModalHapus<?php echo $soal->id_soal; ?>">
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
                        <a href="<?php echo base_url(). 'admin/soal/'.$this->uri->segment('3').'/delete/' . $soal->id_soal?>" class="btn btn-danger btn-icon-split">
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
    </div>
    <div class="tab-pane fade" id="nav-kelompok" role="tabpanel" aria-labelledby="nav-kelompok-tab">
      <hr>
      <div class="row">
        <div class="col-lg-7">
          <div class="card shadow mb-4">
            <div class="card-header py-2 ">
              Tambah Kelompok
            </div>
            <div class="card-body">
              <form class="user" action="<?php echo base_url('admin/soal/'.$this->uri->segment('3').'/tambah_kelompok/'.$paket_dan_part_soal->nama_paket.'4_5'.$paket_dan_part_soal->id_part ) ?>" method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                  <div id="notifications4" class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('bacaan'); ?></div>
                  <textarea  required=""  type="text"  id="bacaan" placeholder="Tulis Bacaan Kelompok Soal Disini" name="bacaan"></textarea>
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
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-5">
              <div class="card shadow mb-4">
                <div class="card-header py-2 ">
                  Data Kelompok Soal
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered nowrap text-center" id="dataTable2"  cellspacing="0">
                      <thead>
                       <tr>
                        <th>ID</th>
                        <th>ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($kelompok_soal as $kelompok ) {
                        ?>
                        <tr>
                          <td><?php echo $kelompok->id_kelompok_soal ?></td>
                          <td><center>
                            <a href="<?php echo base_url(). 'admin/soal/'.$this->uri->segment('3').'/data_kelompok_soal/'.$paket_dan_part_soal->nama_paket.'4_5'.$paket_dan_part_soal->id_part.'4_5'.$kelompok->id_kelompok_soal ?>" class="d-none d-sm-inline-block btn btn-sm bg-gray-900 text-gray-100 shadow-sm" ><i class="fas fa-plus fa-sm text-white-50"></i> Detail Kelompok Soal</a>
                            <a href="<?php echo base_url(). 'admin/soal/'.$this->uri->segment('3').'/edit_kelompok/' . $kelompok->id_kelompok_soal ?>" class="btn btn-primary btn-circle"  ><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#ModalHapus<?php echo $kelompok->id_kelompok_soal; ?>" ><i class="fa fa-trash"></i></a>
                          </center></td>
                        </tr>

                        <!-- MODAL Hapus -->
                        <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="ModalHapus<?php echo $kelompok->id_kelompok_soal; ?>">
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
                                <a href="<?php echo base_url(). 'admin/soal/'.$this->uri->segment('3').'/delete_kelompok/' . $kelompok->id_kelompok_soal?>" class="btn btn-danger btn-icon-split">
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
            </div>
          </div>
        </div>
      </div>


      <?php 
      $this->load->view('v_admin/v_admin_footer');
      ?>


      <script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
      <script src="<?php echo base_url(); ?>/assets/vendor/summernote/summernote.js"></script>
      <script type="text/javascript">
        $(document).ready(function() {
          $('#dataTable').DataTable({
            columnDefs: [ {
              targets: [1],
              render: function ( data, type, row ) {
                return data.length > 5 ?
                data.substr( 0, 5 ) +'…' :
                data;
              }
            } ]
          });
        });

        $(document).ready(function() {
          $('#dataTable2').DataTable({
            "searching": false,

          });
        });

        $('#notifications').slideDown('slow').delay(5000).slideUp('slow');
        $('#notifications1').slideDown('slow').delay(5000).slideUp('slow');
        $('#notifications2').slideDown('slow').delay(5000).slideUp('slow');
        $('#notifications3').slideDown('slow').delay(5000).slideUp('slow');
        $('#notifications4').slideDown('slow').delay(5000).slideUp('slow');

        $('#bacaan ' ).summernote({
         toolbar: [    
         ['fontname',['fontname']],
         ['fontsize', ['fontsize']],
         ['style', ['bold', 'italic', 'underline', 'clear']],
         ['color', ['color']],
         ['para', ['ul', 'ol', 'paragraph']],       
         ['table',['table']],
         ['insert',['picture']],
         ['height',['height']],
         ['link',['link']],
         ['undo',['undo']],
         ['redo',['redo']],
         ],
         popover: {image: [],link: [],air: []}
       });
     </script>