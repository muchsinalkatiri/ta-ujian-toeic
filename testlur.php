<?php
$connect = new mysqli('localhost', 'root', '', 'ta_toeic');

$cur = $_GET['cur'];

$query = mysqli_query($connect, "UPDATE data_ujian SET audio_curent_time = $cur WHERE id_data_ujian = 97");