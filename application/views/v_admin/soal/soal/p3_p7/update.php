<?php 
$this->load->view('v_admin/v_admin_header');
?>
<link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">  
</div> <!-- TUTUP HEADER -->

<nav aria-label="breadcrumb"> <!-- buka breadcumb -->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/soal/paket_soal') ?>">Data Paket Soal</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/soal/part_soal/'.$soal->jenis_soal).'/'.$soal->nama_paket ?>">Data Part Soal</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/soal/'.$this->uri->segment('3').'/data_soal/'.$soal->nama_paket.'4_5'.$soal->id_part)  ?>">Data Soal</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Data Soal</li>
  </ol>
</nav> <!-- tutup breadcumb -->

<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 
<div class="row">
  <div class="col-sm-12">
        <form class="user" action="<?php echo base_url('admin/soal/'.$this->uri->segment('3').'/edit/'.$soal->id_soal) ?>" method="post" enctype="multipart/form-data">
    <div class="card shadow mb-4">
      <div class="card-header py-2 ">
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-7"> <!-- mulai judul -->
            <div class="row">
              <div class="col-sm-6">
                <div  class="font-weight-bold  mb-1">Nomer Soal </div> 
                <div id="notifications1" class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo $this->session->flashdata('nomer_soal_msg'); ?></div>
                <div id="notifications1" class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('nomer_soal'); ?></div>
              </div>
              <div class="col-sm-6">
                <div  class="font-weight-bold  mb-1">Jawaban Soal</div>
                <div id="notifications2" class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('jawaban'); ?></div>
              </div>
            </div><!-- tutup judul -->
            <div class="row mb-4">
              <div class="col-sm-6">
                <input type="number" readonly class="form-control" value="<?php echo set_value('nomer_soal', $soal->nomer_soal) ?>" id="nomer_soal"  name="nomer_soal">
                <input type="hidden" readonly class="form-control" value="<?php echo set_value('nomer_soal', $soal->id_soal) ?>" id="id_soal"  name="id_soal">
              </div>
              <div class="col-sm-6">
                <select class="form-control" name="jawaban">
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
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div  class="font-weight-bold  mb-1">Isi Soal</div>
                <div id="notifications3" class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('isi_soal'); ?></div>
              </div>
              <div class="col-sm-12">
                <textarea rows="5" type="text" class="form-control" id="isi_soal" placeholder="Isi Soal..." name="isi_soal"><?php echo set_value('isi_soal', $soal->isi_soal) ?></textarea>
              </div>
            </div>
          </div> 
          <div class="col-sm-5">
            <div class="row">
              <div class="col-sm-12">
                <div  class="font-weight-bold  mb-1">Isi Jawaban</div>
                <div id="notifications4" class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('opsi_a'); ?></div> 
                <div class="input-group mb-4 mr-sm-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text">a.</div>
                  </div>
                  <input type="text" class="form-control" value="<?php echo set_value('opsi_a', $soal->opsi_a) ?>" id="opsi_a" placeholder="Isi Jawaban A." name="opsi_a">
                </div>
                <div id="notifications5" class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('opsi_b'); ?></div> 
                <div class="input-group mb-4 mr-sm-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text">b.</div>
                  </div>
                  <input type="text" class="form-control" value="<?php echo set_value('opsi_b', $soal->opsi_b) ?>" id="opsi_b" placeholder="Isi Jawaban B." name="opsi_b">
                </div>
                <div id="notifications6" class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('opsi_c'); ?></div> 
                <div class="input-group mb-4 mr-sm-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text">c.</div>
                  </div>
                  <input type="text" class="form-control" value="<?php echo set_value('opsi_c', $soal->opsi_c) ?>" id="opsi_c" placeholder="Isi Jawaban C." name="opsi_c">
                </div>
                <div id="notifications7" class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?php echo form_error('opsi_d'); ?></div> 
                <div class="input-group mb-4 mr-sm-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text">d.</div>
                  </div>
                  <input type="text" class="form-control" value="<?php echo set_value('opsi_d', $soal->opsi_d) ?>" id="opsi_d" placeholder="Isi Jawaban D." name="opsi_d">
                </div>
              </div>
            </div>
          </div>
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