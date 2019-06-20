<?php 
$this->load->view('v_admin/v_admin_header');
?>
</div>
<nav aria-label="breadcrumb"> <!-- buka breadcumb -->
<ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Home</li>
  </ol>
</nav> <!-- tutup breadcumb -->
<div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Mahasiswa</div>
                      <?php
                          $mahasiswa = $this->db->query("SELECT COUNT(nim) as total FROM data_mahasiswa");
                          $data_total_mahasiswa = $mahasiswa->result();
                          $total_mahasiswa = $data_total_mahasiswa[0]->total;
                      ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_mahasiswa; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Mahasiswa Terdaftar</div>
                                            <?php
                          $mahasiswa_terdaftar = $this->db->query("SELECT COUNT(nim) as total FROM data_mahasiswa_terdaftar");
                          $data_total_mahasiswa_terdaftar = $mahasiswa_terdaftar->result();
                          $total_mahasiswa_terdaftar = $data_total_mahasiswa_terdaftar[0]->total;
                      ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_mahasiswa_terdaftar; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Admin</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                                                                    <?php
                          $admin = $this->db->query("SELECT COUNT(id_admin) as total FROM data_admin");
                          $data_total_admin = $admin->result();
                          $total_admin = $data_total_admin[0]->total;
                      ?>
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $total_admin; ?></div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-key fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Sesi Ujian</div>
                                                                                          <?php
                          $sesi_ujian = $this->db->query("SELECT COUNT(id_sesi_ujian) as total FROM sesi_ujian");
                          $data_total_sesi = $sesi_ujian->result();
                          $total_sesi = $data_total_sesi[0]->total;
                      ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_sesi; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
<div class="row">

  <!-- Area Chart -->
  <div class="col-xl-12 col-lg-7">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Ujian Toeic</h6>
        <div class="dropdown no-arrow">
          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
          </a>
        </div>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        TOEIC

Tes Bahasa Inggris untuk Komunikasi Internasional (TOEIC) adalah "tes bahasa Inggris yang dirancang khusus untuk mengukur kemampuan bahasa Inggris sehari-hari orang-orang yang bekerja di lingkungan internasional."

Ada berbagai bentuk ujian: Tes Mendengarkan & Membaca TOEIC terdiri dari dua tes penilaian keterampilan penilaian yang dinilai sama dengan skor 990; Tes TOEIC Speaking & Writing yang lebih baru terdiri dari tes pengucapan, kosakata, tata bahasa, kelancaran, koherensi keseluruhan, dan struktur (pengorganisasian kalimat) dengan jumlah kemungkinan 400 skor.
      </div>
    </div>
  </div>

 
  <!-- </div> -->
</div>
<?php 
$this->load->view('v_admin/v_admin_footer');
?>

<!-- Page level plugins -->
<script src="<?php echo base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url(); ?>assets/js/demo/chart-area-demo.js"></script>
<!-- <script src="<?php echo base_url(); ?>assets/js/demo/chart-pie-demo.js"></script> -->
<script type="text/javascript">
  
</script>

