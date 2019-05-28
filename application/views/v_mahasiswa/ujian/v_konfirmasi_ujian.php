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
        <strong>TOEIC EXAM ONLINE JTI</strong><br>
        <hr>
        <?php $durasi = floor($sesi->durasi / 3600 ) ; ?>
        <strong>Exam Name :</strong> <?php  echo $sesi->nama_sesi_ujian; ?><br>
        <strong>Duration of the Exam :</strong> <?php  echo $durasi; ?> jam<br>
        <strong>Time Begins :</strong> The time will start when you press the do button.<br>
        <strong>TIme Ended :</strong> <?php echo $sesi->waktu_berakhir; ?> <br>
        <strong>Number of Listening Questions :</strong> 100 Questions <br>
        <strong>Number of Reading Questions :</strong> 100 Questions <br>
        <strong>Total Questions :</strong> 200 Questions <br>
        <br>
        <p class="text-small" style="border:1px; border-style:solid; border-color:gray; border-radius: 10px; padding: 5px;">The exam will begin with audio playback for the listening session. The audio will be played immediately when you press the "Do It" button.</p><br>
        <form class="user" action="<?php echo base_url('mahasiswa/ujian/create_ujian') ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $sesi->id_sesi_ujian?>" name="id_sesi_ujian">
        <button type="submit" class="btn btn-primary btn-icon-split btn-sm"><span class="text">Do It</span></button>
        <a href="<?php echo base_url(). 'mahasiswa/ujian'?>" class="btn btn-secondary btn-icon-split btn-sm">
          <span class="text">Cancel</span>
        </a>
      </form>
      <hr>
      <h5>It is recommended to use a headset, so that audio listening is heard properly and does not interfere with other participants.</h5>
    </div>
  </div>
</div>

</div>




<?php 
$this->load->view('v_mahasiswa/v_mahasiswa_footer');
?> 	