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
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/soal/part_soal/listening').'/'.$kelompok->nama_paket ?>">Data Part Soal</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/soal/'.$this->uri->segment('3').'/data_soal/'.$kelompok->nama_paket.'4_5'.$kelompok->id_part)  ?>">Data Soal</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Kelompok Soal</li>
  </ol>
</nav> <!-- tutup breadcumb -->

<div class="row">
  <div class="col-lg-10">
    <div class="card shadow mb-4">
      <div class="card-header py-2 ">
        Edit Kelompok
      </div>
      <div class="card-body">
        <form class="user" action="<?php echo base_url('admin/soal/photographs/edit_kelompok/'.$kelompok->id_kelompok_soal ) ?>" method="post" enctype="multipart/form-data">
          <div class="row mb-3">
            <div id="notifications4" class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('bacaan'); ?></div>
            <textarea  required=""  type="text"  id="bacaan" placeholder="Tulis Bacaan Kelompok Soal Disini" name="bacaan"><?php echo $kelompok->bacaan ?></textarea>
          </div>
          <?php if($this->session->userdata('level')=='0'){ ?> 
            <button type="submit" class="btn bg-gray-900 text-gray-100 btn-user btn-block">
              Update
            </button>
            <?php }else{ ?>
              <button type="submit" class="btn bg-gray-700 text-gray-100 btn-user btn-block">
                Update
              </button>
              <?php } ?>
            </form>
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