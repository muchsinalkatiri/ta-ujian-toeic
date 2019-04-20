<?php 
$this->load->view('v_admin/v_admin_header');
?>
</div> <!-- TUTUP HEADER -->
<link href="<?php echo base_url(); ?>assets/vendor/summernote/summernote.css" rel="stylesheet">
<nav aria-label="breadcrumb"> <!-- buka breadcumb -->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/soal/paket_soal') ?>">Data Paket Soal</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/soal/part_soal/'.$part_soal->jenis_soal.'/'.$part_soal->nama_paket) ?>">Data Part Soal</a></li>
    <li class="breadcrumb-item active" aria-current="page">Directions & Example : <?php echo $part_soal->jenis_soal; ?></li>
  </ol>
</nav> <!-- tutup breadcumb -->

<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-directions-tab" data-toggle="tab" href="#nav-directions" role="tab" aria-controls="nav-directions" aria-selected="true">Directions</a>
    <a class="nav-item nav-link" id="nav-example-tab" data-toggle="tab" href="#nav-example" role="tab" aria-controls="nav-example" aria-selected="false">Example</a>
    <a href="#" class="btn-light  nav-link" data-toggle="modal" data-target="#ModalDetail" ><i class="fa fa-eye"></i></a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-directions" role="tabpanel" aria-labelledby="nav-directions-tab">
    <br>
    <div class="row">
      <div class="col-lg-11">
        <div class="card shadow mb-4">
         <div class="card-header py-2 ">
           <h6 class="m-0 font-weight-bold text-gray-900">Directios For : <?php echo $part_soal->nama_part ?></h6>
         </div>
         <div class="card-body">
          <form class="user" action="<?php echo base_url('admin/soal/part_soal/directions/'.$part_soal->id_part) ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" class="form-control" value="<?php echo $part_soal->id_part; ?>" id="id_part"  name="id_part">
            <div class="row" > <!-- open validasi -->
              <div class="col-sm-12">
                <div id="notifications1" class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('directions'); ?></div> 
              </div> 
            </div> <!-- tutup validasi -->
            <div class="form-group row">
              <div class="col-sm-12 mb-3 mb-sm-0">
                <textarea  minlength=10 type="text"  id="directions" placeholder="Tulis directions ini disini" name="directions"><?php echo set_value('directions', $part_soal->directions) ?></textarea>
              </div>
            </div>
            <div class="col-sm-12">
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
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="nav-example" role="tabpanel" aria-labelledby="nav-example-tab">
     <br>
     <div class="row">
      <div class="col-lg-11">
        <div class="card shadow mb-4">
         <div class="card-header py-2 ">
           <h6 class="m-0 font-weight-bold text-gray-900">Example For : <?php echo $part_soal->nama_part ?></h6>
         </div>
         <div class="card-body">
          <form class="user" action="<?php echo base_url('admin/soal/part_soal/example/'.$part_soal->id_part) ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" class="form-control" value="<?php echo $part_soal->id_part; ?>" id="id_part"  name="id_part">
            <div class="row" > <!-- open validasi -->
              <div class="col-sm-12">
                <div id="notifications1" class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('example'); ?></div> 
              </div> 
            </div> <!-- tutup validasi -->
            <div class="form-group row">
              <div class="col-sm-12 mb-3 mb-sm-0">
                <textarea rows="5" minlength=10 type="text" class="form-control" id="example" placeholder="Tulis example ini disini" name="example"><?php echo set_value('directions', $part_soal->example) ?></textarea>
              </div>
            </div>
            <div class="col-sm-12">
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
        </div>
        </div>
      </div>
    </div>

    <!-- MODAL detail -->
    <div  class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="ModalDetail">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Directions & Example</h5>
          </div>
          <div class="modal-body">
            <strong>Directions :</strong><br>
            <?php echo $part_soal->directions; ?><br>
            <strong>Example :</strong><br>
            <?php echo $part_soal->example; ?><br>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
    <!--END MODAL detail-->

    <?php 
    $this->load->view('v_admin/v_admin_footer');
    ?>
    <script src="<?php echo base_url(); ?>/assets/vendor/summernote/summernote.js"></script>
    <script type="text/javascript">
      $('#notifications').slideDown('slow').delay(5000).slideUp('slow');
      $('#example ,#directions' ).summernote({
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