<?php 
$this->load->view('v_mahasiswa/v_mahasiswa_header');
?> 


<!-- Page Heading -->
<div class="row">
  <div class="col-md-3">

  </div>
  <div class="col-md-6">
    <h3 class="mb-2 text-gray-800"><?php echo $page_title ?></h3>
    <div class="card shadow mb-2">
      <div class="card-body">
        <strong>UJIAN TOEIC ONLINE JTI</strong><br>
        <hr>
        <?php $durasi = floor($sesi->durasi / 3600 ) ; ?>
        <strong>Nama Ujian :</strong> <?php  echo $sesi->nama_sesi_ujian; ?><br>
        <strong>Durasi Ujian :</strong> <?php  echo $durasi; ?> jam<br>
        <strong>Waktu Dimulai :</strong> Waktu akan dimulai saat anda menekan tombol kerjakan<br>
        <strong>Waktu Berakhir :</strong> <?php echo $sesi->waktu_berakhir; ?> <br>
        <strong>Jumlah Soal Reading :</strong> 100 Soal <br>
        <strong>Jumlah Soal Listening :</strong> 100 Soal <br>
        <strong>Jumlah Soal :</strong> 200 Soal <br>
        <br>
        <p class="text-small" style="border:1px; border-style:solid; border-color:gray; border-radius: 10px; padding: 5px;">Ujian akan dimulai dengan pemutaran audio untuk sesi listening. Audio akan langsung diputar saat anda menekan tombol kerjakan.</p><br>
        <form class="user" action="<?php echo base_url('mahasiswa/ujian/create_ujian') ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $sesi->id_sesi_ujian?>" name="id_sesi_ujian">
        <button type="submit" class="btn btn-primary btn-icon-split btn-sm"><span class="text">Kerjakan</span></button>
        <a href="<?php echo base_url(). 'mahasiswa/ujian'?>" class="btn btn-secondary btn-icon-split btn-sm">
          <span class="text">Batal</span>
        </a>
      </form>
      <hr>
      <h5>Disarankan Menggunakan Headshet, Agar Audio Listening Terdengar Dengan Baik Dan Tidak Mengganggu Peserta Lainya.</h5>
    </div>
  </div>
</div>

</div>




<?php 
$this->load->view('v_mahasiswa/v_mahasiswa_footer');
?> 	