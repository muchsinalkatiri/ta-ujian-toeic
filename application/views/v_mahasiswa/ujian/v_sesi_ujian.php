<?php 
$this->load->view('v_mahasiswa/v_mahasiswa_header');
?> 


<!-- Page Heading -->
<div class="container">
  <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 
  <h1 class="h3 mb-4 text-gray-800"><?php echo $page_title ?></h1>
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table text-center table-bordered" id="dataTable"  cellspacing="0">
          <thead>
            <tr>
              <th>NAMA UJIAN</th>
              <th>WAKTU DIMULAI</th>
              <th>WAKTU BERAKHIR</th>
              <th>STATUS</th>
              <th>ACTION</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($sesi_ujian as $sesi ) {
              if ($sesi->status == 'dihentikan') {
                $status = 'dihentikan';
              }else{                  
                if ($sesi->waktu_berakhir > date('Y-m-d H:i:s') && $sesi->waktu_dimulai < date('Y-m-d H:i:s')) {
                  $status = 'tersedia';
                }elseif ($sesi->waktu_berakhir < date('Y-m-d H:i:s') ){
                  $status = 'berakhir';
                }elseif ($sesi->waktu_dimulai > date('Y-m-d H:i:s')){
                  $status = 'belum dibuka';
                }
              }
              ?>
              <tr>
                <td><?php echo $sesi->nama_sesi_ujian ?></td>
                <td><?php echo $sesi->waktu_dimulai ?></td>
                <td><?php echo $sesi->waktu_berakhir ?></td>
                <td><?php echo $status ?></td>
                <td><center>
                  <?php 
                  $query = $this->db->get_where('data_ujian', array('data_ujian.id_sesi_ujian' => $sesi->id_sesi_ujian, 'id_mahasiswa_terdaftar' => $this->session->userdata('id_mahasiswa_terdaftar')));
                  $check = $query->num_rows();
                  ?>
                  <?php if($status == 'tersedia' && $check == 0){ ?>
                    <a href="<?php echo base_url(). 'mahasiswa/ujian/konfirmasi/' . $sesi->id_sesi_ujian?>" class="d-none d-sm-inline-block btn btn-sm bg-primary text-gray-100 shadow-sm"  ><i class="fas fa-play  text-white-50"></i> Kerjakan Ujian</a>
                    <?php }elseif($status == 'tersedia' && $check != 0){
                      $data_ujian = $query->result();
                      $id_data_ujian = $data_ujian[0]->id_data_ujian;
                      $status_pengerjaan = $data_ujian[0]->status_pengerjaan;
                      if($status_pengerjaan == 'mengerjakan' &&  $data_ujian[0]->waktu_berakhir > date('Y-m-d H:i:s')){
                        ?>
                        <a href="<?php echo base_url(). 'mahasiswa/ujian/pengerjaan/' . $id_data_ujian?>" class="d-none d-sm-inline-block btn btn-sm bg-secondary text-gray-100 shadow-sm"  ><i class="fas fa-angle-double-right  text-white-50"></i> Lanjutkan Ujian</a>
                      <?php }elseif($status_pengerjaan == 'selesai'){ ?>
                        <a  class="d-none d-sm-inline-block btn btn-sm bg-danger text-gray-100 shadow-sm"  href="<?php echo base_url('kirim/kirim_email/'.$sesi->id_sesi_ujian)?>" ><i class="fas fa-envelope  text-white-50"></i> Kirim Hasil Ke Email</a>
                        <?php } ?>
                        <?php } ?>
                      </center></td>
                    </tr>



                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>


        </div>




        <?php 
        $this->load->view('v_mahasiswa/v_mahasiswa_footer');
        ?> 	
        <script>   
          $('#notifications').slideDown('slow').delay(3000).slideUp('slow');
        </script>