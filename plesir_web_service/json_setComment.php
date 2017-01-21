<?php
include "koneksi.php";

$idUser= isset($_GET['idUser']) ? $_GET['idUser'] : "";
$idWisata = isset($_GET['idWisata']) ? $_GET['idWisata'] : "";
$comment = isset($_GET['comment']) ? $_GET['comment'] : "";

date_default_timezone_set('Asia/Jakarta');
$dateTes = date('Y-m-d H:i:s');

	$sql_query = "INSERT INTO tbl_comment(id_user,id_wisata,comment,tgl_masuk) 
values('$idUser','$idWisata','$comment','$dateTes')";

if(mysqli_query($con,$sql_query))
	echo "Data Insertion Success..";
else
	echo "Data Insertion Error..".mysqli_error($con);