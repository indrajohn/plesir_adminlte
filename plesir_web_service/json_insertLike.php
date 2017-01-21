<?php
include "koneksi.php";

$idUser= isset($_GET['idUser']) ? $_GET['idUser'] : "";
$idWisata = isset($_GET['idWisata']) ? $_GET['idWisata'] : "";
$toggleCommand = isset($_GET['toggleCommand']) ? $_GET['toggleCommand'] : "";

$sql_query = "SELECT * from tbl_like where id_user = '$idUser' AND  id_wisata = '$idWisata'";

$result = mysqli_query($con,$sql_query)or die(mysql_error());

$cekUserInDatabase = mysqli_num_rows($result)> 0 ? "true" : "false";

if($toggleCommand=="insert")
{
	if($cekUserInDatabase=="true")
	{
		$sql_query_update = "UPDATE tbl_like SET is_liked='1'
		 where id_user = '$idUser' AND id_wisata = '$idWisata'";
		 
	if(mysqli_query($con,$sql_query_update))
		echo "Data Insertion Success..";
	else
		echo "Data Insertion Error..".mysqli_error($con);

	}
	else
	{
		$sql_query = "INSERT INTO tbl_like(id_user,id_wisata,is_liked) 
	values('$idUser','$idWisata','1')";

	if(mysqli_query($con,$sql_query))
		echo "Data Insertion Success..";
	else
		echo "Data Insertion Error..".mysqli_error($con);
	}
}
else if($toggleCommand=="delete")
{
	$sql_query_update = "UPDATE tbl_like SET is_liked='0'
	where id_user = '$idUser' AND id_wisata = '$idWisata'";
		 
	if(mysqli_query($con,$sql_query_update))
		echo "Data Deletion Success..";
	else
		echo "Data Deletion Error..".mysqli_error($con);
}