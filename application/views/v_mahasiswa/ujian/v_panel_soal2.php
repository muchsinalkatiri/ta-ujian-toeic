<?php $split = explode('4_5', $this->uri->segment('4')); $id_data_ujian = $split[0];//ambil data id ujian dari link  ?> 
<nav>
	<div class="nav nav-tabs" id="nav-tab" role="tablist">
		<li class="nav-item nav-link "><a href="<?php echo base_url('mahasiswa/ujian/frameujian_listening/'.$id_data_ujian.'4_51') ?>">Listening</a></li>
		<li class="nav-item nav-link active"><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5101') ?>">Reading</a></li>
	</div>
</nav>
<table class="table-sm text-center " id="dataTable"  cellspacing="0">
	<span class="text-xs mr-2"><i class="fas fa-circle mr-1 mb-2 mt-1 text-primary"></i>Incomplete Setences</span>
	<span class="text-xs mr-2"><i class="fas fa-circle mr-1 mb-2 mt-1 text-danger"></i>Text Completion</span>
	<span class="text-xs mr-2"><i class="fas fa-circle mr-1 mb-2 mt-1 text-success"></i>Reading Comprehesion</span>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5101') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">101. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 101); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5102') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">102. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 102); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5103') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">103. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 103); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5104') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">104. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 104); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5105') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">105. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 105); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5106') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">106. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 106); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5107') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">107. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 107); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5108') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">108. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 108); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5109') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">109. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 109); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5110') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">110. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 110); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5111') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">111. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 111); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5112') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">112. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 112); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5113') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">113. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 113); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5114') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">114. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 114); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5115') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">115. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 115); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5116') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">116. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 116); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5117') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">117. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 117); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5118') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">118. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 118); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5119') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">119. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 119); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5120') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">120. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 120); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5121') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">121. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 121); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5122') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">122. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 122); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5123') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">123. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 123); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5124') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">124. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 124); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5125') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">125. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 125); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5126') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">126. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 126); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5127') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">127. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 127); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5128') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">128. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 128); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5129') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">129. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 129); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5130') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">130. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 130); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5131') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">131. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 131); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5132') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">132. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 132); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5133') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">133. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 133); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5134') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">134. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 134); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5135') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">135. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 135); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5136') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">136. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 136); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5137') ?>" style="width:1 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">137. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 137); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5138') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">138. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 138); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5139') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">139. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 139); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5140') ?>" style="width: 60px; " class="btn btn-outline-primary border-bottom-primary text-xs ">140. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 140); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5141') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">141. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 141); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5142') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">142. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 142); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5143') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">143. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 143); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5144') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">144. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 144); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5145') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">145. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 145); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5146') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">146. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 146); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5147') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">147. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 147); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5148') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">148. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 148); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5149') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">149. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 149); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5150') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">150. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 150); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5151') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">151. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 151); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5152') ?>" style="width: 60px; " class="btn btn-outline-danger border-bottom-danger text-xs ">152. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 152); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5153') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">153. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 153); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5154') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">154. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 154); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5155') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">155. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 155); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5156') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">156. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 156); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5157') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">157. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 157); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5158') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">158. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 158); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5159') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">159. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 159); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5160') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">160. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 160); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5161') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">161. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 161); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5162') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">162. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 162); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5163') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">163. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 163); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5164') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">164. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 164); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5165') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">165. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 165); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5166') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">166. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 166); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5167') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">167. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 167); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5168') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">168. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 168); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5169') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">169. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 169); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5170') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">170. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 170); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5171') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">171. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 171); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5172') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">172. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 172); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5173') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">173. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 173); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5174') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">174. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 174); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5175') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">175. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 175); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5156') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">176. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 176); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5157') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">177. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 177); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5158') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">178. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 178); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5159') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">179. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 179); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5160') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">180. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 180); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5181') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">181. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 181); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5182') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">182. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 182); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5183') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">183. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 183); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5184') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">184. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 184); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5185') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">185. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 185); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5186') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">186. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 186); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5187') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">187. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 187); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5188') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">188. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 188); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5189') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">189. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 189); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5190') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">190. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 190); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5191') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">191. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 191); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5192') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">192. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 192); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5193') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">193. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 193); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5194') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">194. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 194); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5195') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">195. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 195); ?></a></td>
	</tr>
	<tr>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5196') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">196. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 196); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5197') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">197. </a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5198') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">198. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 198); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5199') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">199. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 199); ?></a></td>
		<td><a href="<?php echo base_url('mahasiswa/ujian/frameujian_reading/'.$id_data_ujian.'4_5200') ?>" style="width: 60px; " class="btn btn-outline-success border-bottom-success text-xs ">200. <?php echo $this->ujian_model->get_jawaban($id_data_ujian, 200); ?></a></td>
	</tr>
</table>