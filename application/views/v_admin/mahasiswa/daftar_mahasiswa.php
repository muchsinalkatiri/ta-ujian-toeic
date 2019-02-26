<div class="row">
	<div class="col-md-12">
		<h1 class="page-head-line"><?php    echo $page_title ?></h1>
		<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th>NIM</th>
					<th>NAMA</th>
					<th>TTL</th>
					<th>ALAMAT</th>
					<th>JURUSAN</th>
					<th>NOTLP</th>
					<th>ACTION</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($mahasiswa as $data_mahasiswa ) {?>
				<tr>
					<td><?php echo $data_mahasiswa->nim ?></td>
					<td><?php echo $data_mahasiswa->nama ?></td>
					<td><?php echo $data_mahasiswa->Ttl ?></td>
					<td><?php echo $data_mahasiswa->alamat ?></td>
					<td><?php echo $data_mahasiswa->jurusan ?></td>
					<td><?php echo $data_mahasiswa->notlp ?></td>
					<td>EDIT||DELETE</td>
				</tr>

			<?php } ?>
			</tbody>
			<tfoot>
				<tr>
					<th>NIM</th>
					<th>NAMA</th>
					<th>TTL</th>
					<th>ALAMAT</th>
					<th>JURUSAN</th>
					<th>ACTION</th>
				</tr>
			</tfoot>
		</table>

	</div>
</div>
<!-- /. ROW  -->