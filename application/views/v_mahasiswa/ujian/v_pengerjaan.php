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
  <div style="height: 50px; padding: 0.75rem 1rem;  margin-bottom: 1rem;  list-style: none; border-radius: 0.35rem;" class="bg-gray-200">
    <div class="row ">
      <div class="col-md-8">
        <p class="">Nama Paket Ujian TOEIC : <?php echo $ujian->nama_paket; ?></p>
      </div>
      <div class="col-md-4" >
        <div class=" small"><i class="fa fa-fw fa-volume-up"></i> Audio Listening - <span id="currentTime"></span> / <span id="duration"></span>
        </div>
        <div class="progress progress-sm " >
          <div class="progress-bar bg-gray-800" role="progressbar" id="pgbar"  aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
          <audio onload='alert("haha")' ontimeupdate='updateTrackTime(this);'  id="audio" autoplay src="<?php echo base_url()."uploads/sound-ujian/".$paket->file_audio ?>"></audio>
        </div>
      </div>
    </div>
  </div>
    <iframe src="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$this->uri->segment('4').'4_51') ?>" width="100%" onload="this.style.height=this.contentDocument.body.scrollHeight +'px';"  frameborder="0"></iframe>
</div>
<!-- Display the countdown timer in an element -->






<?php 
$this->load->view('v_mahasiswa/v_mahasiswa_footer');
?>  
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
  // alert(countDownDate);

  if (distance < 0) {
    audio.pause();
    clearInterval(x);
    alert('Waktu Ujian Telah Berakhir');
    window.location.href = '<?php echo base_url(); ?>mahasiswa/ujian/penilaian';
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
    }
  }  
  function updateCurrentime(track){

    var currTime = Math.floor(track.currentTime).toString(); 
    var duration = Math.floor(track.duration).toString();

    setInterval(function(){ alert(currTime); }, 1000);
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
</script>

