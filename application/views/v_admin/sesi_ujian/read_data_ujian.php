<?php 
$this->load->view('v_admin/v_admin_header');
?>
<link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">  
</div> <!-- TUTUP HEADER -->


<nav aria-label="breadcrumb"> <!-- buka breadcumb -->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/ujian/sesi_ujian') ?>">Data Sesi Ujian</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Ujian & nilai</li>
  </ol>
</nav> <!-- tutup breadcumb -->

<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-ujian-tab" data-toggle="tab" href="#nav-ujian" role="tab" aria-controls="nav-ujian" aria-selected="true">Data Ujian</a>
    <a class="nav-item nav-link" id="nav-nilai-tab" data-toggle="tab" href="#nav-nilai" role="tab" aria-controls="nav-nilai" aria-selected="false">Data Nilai</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-ujian" role="tabpanel" aria-labelledby="nav-ujian-tab">
    <br>
    <div class="card shadow mb-4">
      <div class="card-body">
        <table class="table table-bordered" id="dataTable"  cellspacing="0">
          <button onclick="printdataujian()" class="mb-2 btn-sm btn btn-warning" type="button"><span class="fa fa-print"></span> Cetak Pdf</button>
          <thead>
            <tr class="text-xs ">
              <th>NIM</th>
              <th>NAMA</th>
              <th>PAKET</th>
              <th>WAKTU MULAI</th>
              <th>WAKTU BERAKHIR</th>
              <th>WAKTU SELESAI</th>
              <th>STATUS</th>
              <th>ACTION</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data_ujian as $ujian ) {
              ?>
              <tr>
                <td><?php echo $ujian->nim ?></td>
                <td><?php echo $ujian->nama ?></td>
                <td><?php echo $ujian->nama_paket ?></td>
                <td><?php echo $ujian->waktu_dimulai ?></td>
                <td><?php echo $ujian->waktu_berakhir ?></td>
                <td><?php echo $ujian->waktu_selesai ?></td>
                <td><?php echo $ujian->status_pengerjaan ?></td>
                <td><center>
                  <a href="#" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $ujian->id_data_ujian; ?>" ><i class="fa fa-trash"></i></a>
                </center></td>
              </tr>

              <!-- MODAL Hapus -->
              <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="ModalHapus<?php echo $ujian->id_data_ujian; ?>">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Delete this data?</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">Apakah kamu yakin ingin menghapus <?php echo $ujian->id_data_ujian; ?> ?</div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                      <a href="<?php echo base_url(). 'admin/ujian/sesi_ujian/delete_ujian/' . $ujian->id_data_ujian?>" class="btn btn-danger btn-icon-split">
                        <span class="icon text-white-50">
                          <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Delete</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <!--END MODAL Hapus-->
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="nav-nilai" role="tabpanel" aria-labelledby="nav-nilai-tab">
      <br>
      <div class="card shadow mb-4">
        <div class="card-body">
          <table class="table table-bordered text-xs" id="dataTable2"  cellspacing="0">
            <button onclick="printdatanilai()" class="mb-2 btn-sm btn btn-warning" type="button"><span class="fa fa-print"></span> Cetak Pdf</button>
            <thead>
              <tr >
                <th>NIM</th>
                <th>SOAL TERJAWAB</th>
                <th>JAWABAN BENAR</th>
                <th>SCORE</th>
                <th>TOTAL SCORE</th>
                <th>LEVEL OF COMPETENT</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data_ujian as $ujian ) {
                ?>
                <tr>
                  <td><?php echo $ujian->nim ?></td>
                  <td><?php echo $ujian->terjawab_listening ?> Listening & <br> <?php echo $ujian->terjawab_reading ?> Reading</td>
                  <td><?php echo $ujian->benar_listening ?> Listening & <br> <?php echo $ujian->benar_reading ?> Reading</td>
                  <td>Listening : <?php echo $ujian->score_listening ?> & <br>Reading : <?php echo $ujian->score_reading ?></td>
                  <td><?php echo $ujian->total_score ?></td>
                  <td><?php echo $ujian->level_of_competent ?></td>
                </tr>
                <!--END MODAL Hapus-->
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>








    <?php 
    $this->load->view('v_admin/v_admin_footer');
    ?>


    <script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        $('#dataTable').DataTable({
          "searching": false,
          dom: 'Bfrtip',
          buttons: [
          {
            extend: 'print',
            exportOptions: {
              columns: [ 0,1,2,3,4,5,6]
            },
            footer: true,
            title: function(){
              var printTitle = 'Data Ujian';
              return printTitle
            },
            customize: function ( win ) {
              $(win.document.body)
              .css( 'font-size', '10pt' )
              .prepend(
                '<div style="text-align: center; width: 100%;"><img src="<?php echo base_url(); ?>assets/img/logo_polinema.png" style="position:absolute; opacity: 0.1; width: 800px; height: auto; margin-left: -370px;margin-top: 200px; " /></div>'
                );

              $(win.document.body).find( 'table' )
              .addClass( 'compact' )
              .css( 'font-size', 'inherit' );
            }

          }
          ]
        });
        $(document).ready(function() {
          $('.dt-buttons').attr('hidden',true);
        });
      });

      function printdataujian(){
        $(".buttons-print")[0].click();
      }


      $(document).ready(function() {
        $('#dataTable2').DataTable({
          "searching": false,
          dom: 'Bfrtip',
          buttons: [
          {
            extend: 'print',
            footer: true,
            title: function(){
              var printTitle = 'Data Nilai';
              return printTitle
            },
            customize: function ( win ) {
              $(win.document.body)
              .css( 'font-size', '10pt' )
              .prepend(
                '<div style="text-align: center; width: 100%;"><img src="<?php echo base_url(); ?>assets/img/logo_polinema.png" style="position:absolute; opacity: 0.1; width: 800px; height: auto; margin-left: -370px;margin-top: 200px; " /></div>'
                );

              $(win.document.body).find( 'table' )
              .addClass( 'compact' )
              .css( 'font-size', 'inherit' );
            }

          }
          ]
        });
        $(document).ready(function() {
          $('.dt-buttons').attr('hidden',true);
        });
      });

      function printdatanilai(){
        $(".buttons-print")[1].click();
      }

      $('#notifications').slideDown('slow').delay(5000).slideUp('slow');
      $('#notifications1').slideDown('slow').delay(5000).slideUp('slow');
      $('#notifications2').slideDown('slow').delay(5000).slideUp('slow');
      $('#notifications3').slideDown('slow').delay(5000).slideUp('slow');
    </script>
    <script type="text/javascript">
      $(document).ready(function () {
        $('.time').datetimepicker({format: 'yyyy-mm-dd hh:ii:ss', todayBtn: true,
          autoclose: true,
          pickerPosition: "top-left"});
      });
    </script>