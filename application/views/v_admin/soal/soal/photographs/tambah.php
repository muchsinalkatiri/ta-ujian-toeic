<?php 
$this->load->view('v_admin/v_admin_header');
?>
<link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">  
</div> <!-- TUTUP HEADER -->

<nav aria-label="breadcrumb"> <!-- buka breadcumb -->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/soal/paket_soal') ?>">Data Paket Soal</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/soal/part_soal/'.$paket_dan_part_soal->jenis_soal).'/'.$paket_dan_part_soal->nama_paket ?>">Data Part Soal</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/soal/'.$this->uri->segment('3').'/data_soal/'.$paket_dan_part_soal->nama_paket.'4_5'.$paket_dan_part_soal->id_part)  ?>">Data Soal</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah Data Soal</li>
  </ol>
</nav> <!-- tutup breadcumb -->

<?php $split = explode('4_5', $this->uri->segment('5')); $id_kelompok_soal = $split[2];//ambil data id kelompok dari link  ?> 

<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 
<div class="row">
  <div class="col-lg-7">
    <div class="card shadow mb-4">
      <div class="card-header py-2 "></div>
      <div class="card-body">
        <form class="user" action="<?php echo base_url('admin/soal/'.$this->uri->segment('3').'/tambah/'.$paket_dan_part_soal->nama_paket.'4_5'.$paket_dan_part_soal->id_part.'4_5'.$id_kelompok_soal) ?>" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-lg-12 mb-4">
              <div  class="font-weight-bold  mb-1">Gambar Soal</div>
              <div id="notifications1" class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('gambar_soal'); ?></div>
              <div id="notifications1" class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo $this->session->flashdata('gambar_soal_msg'); ?></div>
              <input type="file" class="form-control" value="<?php echo set_value('gambar_soal'); ?>" id="gambar_soal" placeholder="Gambar Soal" name="gambar_soal">
            </div>
            <div class="col-lg-6 mb-3">
              <div  class="font-weight-bold  mb-1">Nomer Soal (1-10)</div> 
              <div id="notifications2" class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo $this->session->flashdata('nomer_soal_msg'); ?></div>
              <div id="notifications3" class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('nomer_soal'); ?></div>
              <input type="number" class="form-control" value="<?php echo set_value('nomer_soal'); ?>" id="nomer_soal" placeholder="Nomer Soal" name="nomer_soal">
            </div>
            <div class="col-lg-6 mb-3">
              <div  class="font-weight-bold  mb-1">Jawaban</div>
              <div id="notifications4" class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('jawaban'); ?></div>
              <select class="form-control" name="jawaban">
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
      <div class="col-lg-5">
        <img class="card shadow mb-7" id="gambar_nodin"  alt="Preview Gambar" style='width:440px;height:270px; border-radius: 5%;  ' src="<?php echo base_url()."uploads/img-soal/photographs/default-image.png"?>"> 
      </div>
    </div>

    <?php 
    $this->load->view('v_admin/v_admin_footer');
    ?>

    <script type="text/javascript">

      $('#notifications, #notifications1, #notifications2, #notifications3, #notifications4').slideDown('slow').delay(5000).slideUp('slow');

      function bacaGambar(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
            $('#gambar_nodin').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
        }
      }

      $("#gambar_soal").change(function(){
        bacaGambar(this);
      });
    </script>