<?php 
    $this->load->view('v_admin/v_admin_header');
 ?>

  <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
<link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">  

 </div>
 <nav aria-label="breadcrumb"> <!-- buka breadcumb -->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
    <li class="breadcrumb-item " aria-current="page"><a href="<?php echo base_url('admin/mahasiswa') ?>">Data Mahasiswa</a></li>
    <li class="breadcrumb-item active" aria-current="page">Upload Excel</li>
  </ol>
</nav> <!-- tutup breadcumb -->
 <script>
  $(document).ready(function(){
    // Sembunyikan alert validasi kosong
    $("#kosong").hide();
  });
  </script>
 <!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
 <div class="row ">
	<div class="col-lg-12 ">
		<div class="card shadow mb-7">
			<div class="card-header py-1 ">
				<nav class="navbar">
					<h5 class="mt-2 ">Upload File Mahasiswa</h5>
					<ul class="navbar-nav ">
						<a class="text-gray-900 text-lg" href="#" data-toggle="modal" data-target="#ModalContoh" >
							<span class="fa fa-file-excel"></span> Lihat Contoh Format 
						</a>
					</ul>
				</nav>
			</div>
			<div class="card-body">
			  <form method="post" action="<?php echo base_url("admin/mahasiswa/upload_excel"); ?>" enctype="multipart/form-data">
			  	<div class="form-group row">
	            	<div class="col-sm-12">
		            <div  class="font-weight-bold  mb-1">Masukan File Excel (.xlsx)</div>
	            		<div id="notifications1" class="text-xs font-weight-bold text-danger text-uppercase mb-1"></div> 
	            	</div>
	            	<div class="col-sm-6">
				    	<input class="form-control" type="file" name="file">
				    </div>	
	            	<div class="col-sm-6">
			    		<button class="btn  bg-gray-900 text-gray-100 shadow-sm" type="submit" name="preview" ><i class="fa fa-eye"></i> Preview</button>
			    	</div>
			    </div>
			  </form>

			  <div  class="modal fade bd-example-modal-xl"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="ModalContoh">
                <div class="modal-dialog modal-xl" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Contoh Format Excel Untuk Upload</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <img class="card shadow mb-7" style='width: 100%; ' src="<?php echo base_url()."assets/img/contoh_excel.png" ?>"> 
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                  </div>
                </div>
              </div>
  
      	<a id="insert_data" style="display: none; " class="btn btn-sm bg-gray-900 text-gray-100 shadow-sm" href="<?php echo base_url("admin/mahasiswa/import")?>"><i class="fas fa-upload fa-sm "></i> Insert Data</a>
		<a id="insert_cancel" style="display: none; " class='btn btn-sm bg-danger text-gray-100 shadow-sm' href="<?php echo base_url("admin/mahasiswa/upload_excel")?>"><i class="fa fa-times fa-sm "></i> Cancel</a>

  <script type="text/javascript">
 	
      $('#notifications1').slideDown('slow').delay(5000).slideUp('slow');
      
 </script>
  
  <?php
  if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form 
    if(isset($upload_error)){ // Jika proses upload gagal
      $upload_error; // Muncul pesan error upload
      ?>
      <script>
      $(document).ready(function(){
      $("#notifications1").html('<?php echo $upload_error; ?>');
      });
      </script>
      <?php
      die; // stop skrip
    }
    
    // Buat sebuah tag form untuk proses import data ke database
    // echo "<form method='post' action='".base_url("admin/mahasiswa/import")."'>";
    
    // Buat sebuah div untuk alert validasi kosong
    echo "<div class='text-xs font-weight-bold text-danger text-uppercase mt-3 mb-1' id='kosong'>
    Ada <span id='jumlah_kosong'></span> data yang belum diisi.
    </div>";
    

    echo "<hr><div class='table-responsive'><table class='table  table-striped table-bordered nowrap text-center' id='dataTable'  cellspacing='0'>
 <thead>
    <tr>
      <th colspan='6'>Preview Data</th>
    </tr>
    <tr>
      <th>NIM</th>
      <th>Nama</th>
      <th>Ttl</th>
      <th>Alamat</th>
      <th>Jurusan</th>
      <th>Notlp</th>
    </tr>
    </thead><tbody>";
    
    $numrow = 1;
    $kosong = 0;
    
    // Lakukan perulangan dari data yang ada di excel
    // $sheet adalah variabel yang dikirim dari controller
    foreach($sheet as $row){ 
      // Ambil data pada excel sesuai Kolom
      $nim = $row['A']; // Ambil data NIS
      $nama = $row['B']; // Ambil data nama
      $ttl = $row['C']; // Ambil data jenis kelamin
      $alamat = $row['D']; // Ambil data alamat
      $jurusan = $row['E']; // Ambil data alamat
      $notlp = $row['F']; // Ambil data alamat
      
      // Cek jika semua data tidak diisi
      if(empty($nim) && empty($nama) && empty($ttl) && empty($alamat) && empty($jurusan) && empty($notlp) )
        continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
      
      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if($numrow > 1){
        // Validasi apakah semua data telah diisi
        $nim_td = ( ! empty($nim))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
        $nama_td = ( ! empty($nama))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
        $ttl_td = ( ! empty($ttl))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
        $alamat_td = ( ! empty($alamat))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $jurusan_td = ( ! empty($jurusan))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $notlp_td = ( ! empty($notlp))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        
        // Jika salah satu data ada yang kosong
        if(empty($nim) or empty($nama) or empty($ttl) or empty($alamat) or empty($jurusan) or empty($notlp)){
          $kosong++; // Tambah 1 variabel $kosong
        }
        
        echo "<tr>";
        echo "<td".$nim_td.">".$nim."</td>";
        echo "<td".$nama_td.">".$nama."</td>";
        echo "<td".$ttl_td.">".$ttl."</td>";
        echo "<td".$alamat_td.">".$alamat."</td>";
        echo "<td".$jurusan_td.">".$jurusan."</td>";
        echo "<td".$notlp_td.">".$notlp."</td>";
        echo "</tr>";
      }
      
      $numrow++; // Tambah 1 setiap kali looping
    }
    
    echo "</tbody></table></div>";

    
    // Cek apakah variabel kosong lebih dari 0
    // Jika lebih dari 0, berarti ada data yang masih kosong
    if($kosong > 0){
    ?>  
      <script>
      $(document).ready(function(){
        // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
        $("#jumlah_kosong").html('<?php echo $kosong; ?>');
        
        $("#kosong").show(); // Munculkan alert validasi kosong
      });
      </script>
    <?php
    }else{ // Jika semua data sudah diisi
    	?>
    	<script>
        	$( '#insert_data' ).removeAttr('style');
    	</script>
    	<script>
        	$( '#insert_cancel' ).removeAttr('style');
    	</script> 
    	<?php
    }
    
    // echo "</form>";
  }
  ?>
  			</div>
  		</div>
  </div>
 </div>


 <?php 
    $this->load->view('v_admin/v_admin_footer');
 ?>


    <script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
    	$(document).ready(function() {$('#dataTable').DataTable({
    		"searching": false,"lengthChange": false,
    		columnDefs: [ {
        targets: [1,2,3,4],
        render: function ( data, type, row ) {
          return data.length > 10 ?
          data.substr( 0, 10 ) +'…' :
          data;
        }
      } ]
    	});});
    	$('#kosong').slideDown('slow').delay(5000).slideUp('slow');
    </script>
