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
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/soal/photograps/data_soal').'/'.$paket_dan_part_soal->nama_paket.'4_5'.$paket_dan_part_soal->id_part ?>">Data Soal</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Soal Kelompok</li>
  </ol>
</nav> <!-- tutup breadcumb -->

<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 
<div class="row mb-2  ">
  <div class="col-lg-10">
    <h1 class="h3 mb-3 text-gray-800">Data Soal(Kelompok) Paket : <?php echo $paket_dan_part_soal->nama_paket ?></h1>
  </div>
  <div class="col-lg-2" style="text-align: right;  ">
    <?php $split = explode('4_5', $this->uri->segment('5')); $id_kelompok_soal = $split[2];//ambil data id kelompok dari link  ?> 
    <a href="<?php echo base_url(). 'admin/soal/photograps/tambah/'.$paket_dan_part_soal->nama_paket.'4_5'.$paket_dan_part_soal->id_part.'4_5'.$id_kelompok_soal ?>" class="d-none d-sm-inline-block btn btn-sm bg-gray-900 text-gray-100 shadow-sm" ><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Soal</a>
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
          <th>SOAL NOMOR</th>
          <th>ISI SOAL</th>
          <th>JAWABAN SOAL</th>
          <th>TIPE SOAL</th>
          <th>TANGGAL DIBUAT</th>
          <th>ACTION</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data_soal as $soal ) {
          ?>
          <tr>
            <td><?php echo $soal->nomer_soal ?></td>
            <td><center><img class="card shadow mb-7" id="gambar_nodin"  alt="Preview Gambar" style='width:66px;height:44px; border-radius: 5%;  ' src="<?php echo base_url()."uploads/img-soal/photograps/".$soal->isi_soal ?>"></center></td> 
            <td><?php echo $soal->jawaban ?></td>
            <td><?php echo $soal->tanggal_dibuat ?></td>
            <td>
              <?php if($soal->id_kelompok_soal == 0) {echo 'individu';}  ?>

            </td>
            <td><center>
              <a href="<?php echo base_url(). 'admin/soal/photograps/edit/' . $soal->id_soal ?>" class="btn btn-primary btn-circle"  ><i class="fa fa-edit"></i></a>
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
                  <a href="<?php echo base_url(). 'admin/soal/photograps/delete/' . $soal->id_soal?>" class="btn btn-danger btn-icon-split">
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