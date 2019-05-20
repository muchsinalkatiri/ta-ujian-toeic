<?php $split = explode('4_5', $this->uri->segment('4')); $id_data_ujian = $split[0];//ambil data id ujian dari link  ?> 
<nav>
	<div class="nav nav-tabs" id="nav-tab" role="tablist">
		<li class="nav-item nav-link active"><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_51') ?>">Listening</a></li>
		<li class="nav-item nav-link "><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5101') ?>">Reading</a></li>
	</div>
</nav>
<table class="table-sm text-center " id="dataTable"  cellspacing="0">
	<span class="text-xs mr-2"><i class="fas fa-circle mr-1 mb-2 mt-1 text-primary"></i>Photograps</span>
	<span class="text-xs mr-2"><i class="fas fa-circle mr-1 mb-2 mt-1 text-danger"></i>Question-Response</span>
	<span class="text-xs mr-2"><i class="fas fa-circle mr-1 mb-2 mt-1 text-warning"></i>Converstations</span>
	<span class="text-xs mr-2"><i class="fas fa-circle mr-1 mb-2 mt-1 text-success"></i>Short Talks</span>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_51') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">1. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 1); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_52') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">2. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 2); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_53') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">3. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 3); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_54') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">4. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 4); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_55') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">5. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 5); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_56') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">6. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 6); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_57') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">7. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 7); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_58') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">8. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 8); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_59') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">9. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 9); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_510') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">10. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 10); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_511') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">11. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 11); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_512') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">12. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 12); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_513') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">13. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 13); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_514') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">14. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 14); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_515') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">15. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 15); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_516') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">16. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 16); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_517') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">17. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 17); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_518') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">18. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 18); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_519') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">19. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 19); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_520') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">20. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 20); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_521') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">21. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 21); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_522') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">22. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 22); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_523') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">23. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 23); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_524') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">24. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 24); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_525') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">25. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 25); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_526') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">26. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 26); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_527') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">27. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 27); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_528') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">28. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 28); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_529') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">29. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 29); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_530') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">30. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 30); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_531') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">31. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 31); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_532') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">32. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 32); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_533') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">33. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 33); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_534') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">34. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 34); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_535') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">35. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 35); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_536') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">36. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 36); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_537') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">37. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 37); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_538') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">38. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 38); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_539') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">39. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 39); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_540') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">40. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 40); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_541') ?>" style="width: 60px; " class="btn btn-outline-warning border-bottom-warning text-xs ">41. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 41); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_542') ?>" style="width: 60px; " class="btn btn-outline-warning border-bottom-warning text-xs ">42. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 42); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_543') ?>" style="width: 60px; " class="btn btn-outline-warning border-bottom-warning text-xs ">43. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 43); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_544') ?>" style="width: 60px; " class="btn btn-outline-warning border-bottom-warning text-xs ">44. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 44); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_545') ?>" style="width: 60px; " class="btn btn-outline-warning border-bottom-warning text-xs ">45. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 45); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_546') ?>" style="width: 60px; " class="btn btn-outline-warning border-bottom-warning text-xs ">46. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 46); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_547') ?>" style="width: 60px; " class="btn btn-outline-warning border-bottom-warning text-xs ">47. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 47); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_548') ?>" style="width: 60px; " class="btn btn-outline-warning border-bottom-warning text-xs ">48. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 48); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_549') ?>" style="width: 60px; " class="btn btn-outline-warning border-bottom-warning text-xs ">49. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 49); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_550') ?>" style="width: 60px; " class="btn btn-outline-warning border-bottom-warning text-xs ">50. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 50); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_551') ?>" style="width: 60px; " class="btn btn-outline-warning border-bottom-warning text-xs ">51. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 51); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_552') ?>" style="width: 60px; " class="btn btn-outline-warning border-bottom-warning text-xs ">52. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 52); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_553') ?>" style="width: 60px; " class="btn btn-outline-warning border-bottom-warning text-xs ">53. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 53); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_554') ?>" style="width: 60px; " class="btn btn-outline-warning border-bottom-warning text-xs ">54. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 54); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_555') ?>" style="width: 60px; " class="btn btn-outline-warning border-bottom-warning text-xs ">55. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 55); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_556') ?>" style="width: 60px; " class="btn btn-outline-warning border-bottom-warning text-xs ">56. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 56); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_557') ?>" style="width: 60px; " class="btn btn-outline-warning border-bottom-warning text-xs ">57. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 57); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_558') ?>" style="width: 60px; " class="btn btn-outline-warning border-bottom-warning text-xs ">58. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 58); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_559') ?>" style="width: 60px; " class="btn btn-outline-warning border-bottom-warning text-xs ">59. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 59); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_560') ?>" style="width: 60px; " class="btn btn-outline-warning border-bottom-warning text-xs ">60. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 60); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_561') ?>" style="width: 60px; " class="btn btn-outline-warning border-bottom-warning text-xs ">61. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 61); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_562') ?>" style="width: 60px; " class="btn btn-outline-warning border-bottom-warning text-xs ">62. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 62); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_563') ?>" style="width: 60px; " class="btn btn-outline-warning border-bottom-warning text-xs ">63. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 63); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_564') ?>" style="width: 60px; " class="btn btn-outline-warning border-bottom-warning text-xs ">64. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 64); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_565') ?>" style="width: 60px; " class="btn btn-outline-warning border-bottom-warning text-xs ">65. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 65); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_566') ?>" style="width: 60px; " class="btn btn-outline-warning border-bottom-warning text-xs ">66. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 66); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_567') ?>" style="width: 60px; " class="btn btn-outline-warning border-bottom-warning text-xs ">67. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 67); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_568') ?>" style="width: 60px; " class="btn btn-outline-warning border-bottom-warning text-xs ">68. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 68); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_569') ?>" style="width: 60px; " class="btn btn-outline-warning border-bottom-warning text-xs ">69. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 69); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_570') ?>" style="width: 60px; " class="btn btn-outline-warning border-bottom-warning text-xs ">70. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 70); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_571') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">71. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 71); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_572') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">72. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 72); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_573') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">73. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 73); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_574') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">74. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 74); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_575') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">75. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 75); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_556') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">76. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 76); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_557') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">77. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 77); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_558') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">78. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 78); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_559') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">79. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 79); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_560') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">80. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 80); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_581') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">81. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 81); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_582') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">82. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 82); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_583') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">83. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 83); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_584') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">84. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 84); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_585') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">85. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 85); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_586') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">86. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 86); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_587') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">87. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 87); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_588') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">88. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 88); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_589') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">89. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 89); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_590') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">90. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 90); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_591') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">91. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 91); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_592') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">92. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 92); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_593') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">93. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 93); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_594') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">94. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 94); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_595') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">95. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 95); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_596') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">96. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 96); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_597') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">97. </a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_598') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">98. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 98); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_599') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">99. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 99); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_5100') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">100. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 100); ?></a></td>
	</tr>
</table>