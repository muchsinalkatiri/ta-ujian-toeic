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
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/soal/question_response/data_soal').'/'.$paket_dan_part_soal->nama_paket.'4_5'.$paket_dan_part_soal->id_part ?>">Data Soal</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Soal Kelompok</li>
  </ol>
</nav> <!-- tutup breadcumb -->

<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 
<div class="row mb-2  ">
  <hr>
  <div class="row mb-2">
    <div class="col-lg-4">
      <h1 class="h3 mb-3 text-gray-800">Tambah Soal</h1>
      <div class="card shadow mb-4">
        <div class="card-header py-2 ">
        </div>
        <div class="card-body">
          <?php $split = explode('4_5', $this->uri->segment('5')); $id_kelompok_soal = $split[2];//ambil data id kelompok dari link  ?> 
          <form class="user" action="<?php echo base_url('admin/soal/'.$this->uri->segment('3').'/tambah/'.$paket_dan_part_soal->nama_paket.'4_5'.$paket_dan_part_soal->id_part.'4_5'.$id_kelompok_soal) ?>" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-lg-12 mb-3">
                <div  class="font-weight-bold  mb-1">Nomer Soal (11-40)</div> 
                <div id="notifications2" class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo $this->session->flashdata('nomer_soal_msg'); ?></div>
                <div id="notifications3" class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('nomer_soal'); ?></div>
                <input type="number" required class="form-control" value="<?php echo set_value('nomer_soal'); ?>" id="nomer_soal" placeholder="Nomer Soal" name="nomer_soal">
              </div>
              <div class="col-lg-12 mb-3">
                <div  class="font-weight-bold  mb-1">Jawaban</div>
                <div id="notifications4" class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('jawaban'); ?></div>
                <select required="" class="form-control" name="jawaban">
                  <option value="" disabled selected>Jawaban</option>
                  <option value="a">a</option>
                  <option value="b">b</option>
                  <option value="c">c</option>
                  <option value="d">d</option>
                </select>
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
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <h1 class="h3 mb-3 text-gray-800">Data Soal(Kelompok) Paket : <?php echo $paket_dan_part_soal->nama_paket ?></h1>
          <div class="card shadow mb-4">
            <div class="card-header py-2 ">
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered nowrap text-center" id="dataTable"  cellspacing="0">
                  <thead>
                   <tr>
                    <th>NOMOR</th>
                    <th>JAWABAN</th>
                    <th>TANGGAL DIBUAT</th>
                    <th>SOAL</th>
                    <th>ACTION</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($data_soal as $soal ) {
                    ?>
                    <tr>
                      <td><?php echo $soal->nomer_soal ?></td>
                      <td><?php echo $soal->jawaban ?></td>
                      <td><?php echo $soal->tanggal_dibuat ?></td>
                      <td>
                        <?php if($soal->id_kelompok_soal == 0) {echo 'Individu';}else{  ?>
                          <a href="<?php echo base_url().'admin/soal/question_response/data_kelompok_soal/'.$soal->nama_paket.'4_5'.$soal->id_part.'4_5'.$soal->id_kelompok_soal ?>">Kelompok</a>
                          <?php } ?>
                        </td>
                        <td><center>
                          <a href="#" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#ModalEdit<?php echo $soal->id_soal; ?>"  ><i class="fa fa-edit"></i></a>
                          <a href="#" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#ModalHapus<?php echo $soal->id_soal; ?>" ><i class="fa fa-trash"></i></a>
                        </center></td>
                      </tr>
                      <!-- MODAL Edit -->
                      <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="ModalEdit<?php echo $soal->id_soal; ?>">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Sola Nomer <?php echo $soal->nomer_soal ?></h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form class="user" action="<?php echo base_url('admin/soal/'.$this->uri->segment('3').'/edit/'.$soal->id_soal) ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" readonly class="form-control mb-2" value="<?php echo $soal->id_soal ?>" id="nomer_soal"  name="id_soal_edit">
                                <div  class="font-weight-bold  mb-1">Nomer Soal</div> 
                                <input type="number" readonly class="form-control mb-2" value="<?php echo $soal->nomer_soal ?>" id="nomer_soal" placeholder="Nomer Soal" name="nomer_soal_edit<?php echo $soal->id_soal ?>">
                                <div  class="font-weight-bold  mb-1">Jawaban</div> 
                                <select class="form-control" name="jawaban_edit">
                                  <option value="" disabled selected>Jawaban</option>
                                  <?php if ($soal->jawaban == 'a'){ ?>
                                    <option selected value="a">a</option>
                                    <option value="b">b</option>
                                    <option value="c">c</option>
                                    <option value="d">d</option>
                                    <?php }elseif(($soal->jawaban == 'b')){ ?>
                                      <option value="a">a</option>
                                      <option selected value="b">b</option>
                                      <option value="c">c</option>
                                      <option value="d">d</option>
                                      <?php }elseif(($soal->jawaban == 'c')){ ?>
                                        <option value="a">a</option>
                                        <option value="b">b</option>
                                        <option selected value="c">c</option>
                                        <option value="d">d</option>
                                        <?php }elseif(($soal->jawaban == 'd')){ ?>
                                          <option value="a">a</option>
                                          <option value="b">b</option>
                                          <option value="c">c</option>
                                          <option selected value="d">d</option>
                                          <?php }?>
                                        </select>
                                      </div>
                                      <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <button class="btn btn-primary btn-icon-split" type="submit" >
                                          <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>
                                          </span>
                                          <span class="text">Edit</span>
                                        </button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!--END MODAL EDit-->
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
                                      <a href="<?php echo base_url(). 'admin/soal/question_response/delete/' . $soal->id_soal?>" class="btn btn-danger btn-icon-split">
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
              <?php 
              $this->load->view('v_admin/v_admin_footer');
              ?>


              <script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
              <script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
              <script src="<?php echo base_url(); ?>/assets/vendor/summernote/summernote.js"></script>
              <script type="text/javascript">
                $(document).ready(function() {
                  $('#dataTable').DataTable({
                  });
                });


                $('#notifications').slideDown('slow').delay(5000).slideUp('slow');
                $('#notifications1').slideDown('slow').delay(5000).slideUp('slow');
                $('#notifications2').slideDown('slow').delay(5000).slideUp('slow');
                $('#notifications3').slideDown('slow').delay(5000).slideUp('slow');
                $('#notifications4').slideDown('slow').delay(5000).slideUp('slow');

              </script>