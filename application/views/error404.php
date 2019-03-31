<?php 
$this->load->view('v_admin/v_admin_header');
?> 
</div>
<div class="container-fluid">

	<!-- 404 Error Text -->
	<div class="text-center">
		<div class="error mx-auto" data-text="404">404</div>
		<p class="lead text-gray-800 mb-5">Page Not Found</p>
		<p class="text-gray-500 mb-0">Halaman Yang Kamu Cari Tidak Ada</p>
		<a style="cursor: pointer; " onclick="goBack()"  href="#" >&larr; Go Back </a>
	</div>
</div>
<!-- /.container-fluid -->
<?php 
$this->load->view('v_admin/v_admin_footer');
?> 

    <script>
      function goBack() {
        window.history.back();
      }
    </script>