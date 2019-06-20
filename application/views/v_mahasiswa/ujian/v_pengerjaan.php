<?php 
$this->load->view('v_mahasiswa/v_mahasiswa_header');
?> 


<!-- Page Heading -->
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6">
      <h1 class="h3 mb-2 text-gray-800"><?php echo $ujian->nama_sesi_ujian; ?></h1>
    </div>
    <div class="col-md-6" style="text-align: right;">
      <h1 id="timer" class="h3 mb-2 text-gray-800"></h1>
    </div>
  </div>
  <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 
  <div style="height: 55px; padding: 0.75rem 1rem;  margin-bottom: 1rem;  list-style: none; border-radius: 0.35rem; " class="bg-gray-200">
    <div class="row ">
      <div class="col-md-8">
        <a type="submit"   class="d-none d-sm-inline-block btn btn-sm bg-gray-900 text-gray-100 shadow-sm" href="#" data-toggle="modal" data-target="#ModalBerhenti">
          <i class="fa fa-stop"></i> Stop Exam
        </a>
      </div>
      <div class="col-md-4" >
        <div class=" small"><i class="fa fa-fw fa-volume-up"></i> Audio Listening - <span id="currentTime"></span> / <span id="duration"></span>
        </div>
        <div class="progress progress-sm " >
          <div class="progress-bar bg-gray-800" role="progressbar" id="pgbar"  aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
          <audio onload='alert("haha")' ontimeupdate='updateTrackTime(this);'  id="audio" autoplay src="<?php echo base_url()."uploads/sound-ujian/".$paket->file_audio ?>"></audio>
        </div>
        <input type="hidden" name="" value="" id="update_audio" >
        <input type="hidden" name="" value="" id="durasi_audio" >
      </div>
    </div>
  </div>

  <iframe  id="frame" src="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$this->uri->segment('4').'4_51') ?>" width="100%" onload="this.style.height=this.contentDocument.body.scrollHeight +'px';"  frameborder="0">Browser Anda Tidak Mendukung  Iframe, Silahkan Perbaharui Browser Anda.</iframe>
</div>
<!-- Display the countdown timer in an element -->



<!-- MODAL berhenti -->
<div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="ModalBerhenti">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $ujian->nama_sesi_ujian; ?></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Are you sure you want to stop the exam?</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a id="hentikan" href="<?php echo base_url('mahasiswa/nilai/penilaian/'.$ujian->id_data_ujian) ?>" class="btn btn-danger btn-icon-split">
          <span class="icon text-white-50">
            <i class="fas fa-stop"></i>
          </span>
          <span class="text">Stop</span>
        </a>
      </div>
    </div>
  </div>
</div>
<!--END MODAL Hapus-->


<?php 
$this->load->view('v_mahasiswa/v_mahasiswa_footer');
?>  
<script type="text/javascript">
  $(document).ready(function () {
    $('#frame').on('load', function () {
      $('#divIframe').css({'display' : 'none'}); 
      $('#loading').hide();
    });

        // $('#loading').hide();
      });
    </script>
    <script>   
      $('#notifications').slideDown('slow').delay(3000).slideUp('slow');
    </script>

    <script>
  // audio.removeAttribute('controls');
// Set the date we're counting down to
var audio = document.getElementById("audio");
var countDownDate = new Date("<?php echo $ujian->waktu_berakhir; ?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  var now = new Date().getTime();

  var distance = countDownDate - now;

  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("timer").innerHTML = "Time Left : "+ ("0"+hours).slice(-2) + ":"
  + ("0"+minutes).slice(-2) + ":" + ("0"+seconds).slice(-2);
  // alert(now);

  if (distance < 0) {
    audio.pause();
    clearInterval(x);
    alert('Waktu Ujian Telah Berakhir');
    // window.location.href = '<?php echo base_url(); ?>mahasiswa/ujian/penilaian';

    document.getElementById('hentikan').click();
  }
}, 1000);
</script>
<script type="text/javascript">
//custom progress bar
var timer;
var percent = 0;
var audio = document.getElementById("audio");
audio.currentTime = "<?php echo $ujian->audio_curent_time; ?>";
audio.addEventListener("playing", function(_event) {
  var duration = _event.target.duration;
  // document.getElementById("duration").innerHTML = convertElapsedTime(duration);
  advance(duration, audio);
});
var advance = function(duration, element) {
  var pgbar = document.getElementById("pgbar");
  increment = 10/duration
  percent = Math.min(increment * element.currentTime * 10, 100);
  pgbar.style.width = percent+'%'
  startTimer(duration, element);
}
var startTimer = function(duration, element){ 
  if(percent < 100) {
    timer = setTimeout(function (){advance(duration, element)}, 100);

  }
}
    // setInterval(function(){ alert(element.currentTime); }, 1000);

  // untuk menampilkan duration dan currentime
  function updateTrackTime(track){
    var currTimeDiv = document.getElementById('currentTime');
    var durationDiv = document.getElementById('duration');

    var currTime = Math.floor(track.currentTime).toString(); 
    var duration = Math.floor(track.duration).toString();

    currTimeDiv.innerHTML = formatSecondsAsTime(currTime);

    if (isNaN(duration)){
      durationDiv.innerHTML = '00:00';
    } 
    else{
      durationDiv.innerHTML = formatSecondsAsTime(duration);
      document.getElementById('update_audio').value = "" + currTime;
      document.getElementById('durasi_audio').value = "" + duration;
      // // alert(currTime);
      // setInterval(function(){
      //   alert(currTime);
      // }, 3000)
    }
  }  

  function formatSecondsAsTime(secs, format) {
    var hr  = Math.floor(secs / 3600);
    var min = Math.floor((secs - (hr * 3600))/60);
    var sec = Math.floor(secs - (hr * 3600) -  (min * 60));

    if (min < 10){ 
      min = "0" + min; 
    }
    if (sec < 10){ 
      sec  = "0" + sec;
    }

    return min + ':' + sec;
  }

  var exec_php = function () { //untuk update audio
    var xhttp = new XMLHttpRequest();
    var cur = document.getElementById('update_audio').value;
    var dur = document.getElementById('durasi_audio').value;

    if(cur<dur){
      console.log('test');
      xhttp.open("GET", '<?php echo base_url(); ?>'+"/mahasiswa/ujian/update_audio/" + cur + '/<?php echo $this->uri->segment('4'); ?>', true);
      xhttp.send();
    }else{
      console.log('test2');

    }
  }

    setInterval(exec_php, 61000);

</script>

