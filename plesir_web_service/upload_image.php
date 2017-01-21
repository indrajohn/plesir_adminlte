<?php
include "koneksi.php";
$name= isset($_POST['name']) ? $_POST['name'] : "";
$image = isset($_POST['image']) ? $_POST['image'] : "";
$id = isset($_POST['id']) ? $_POST['id'] : "";

$file_name =  $name . ".jpg";
$decodedImage = base64_decode("$image");
file_put_contents("images/user/" .$file_name,$decodedImage);

$sql_query = "UPDATE tbl_user set pic_user='$file_name' where id = '$id'";

$tes = "";
mysqli_query($con,$sql_query)or die(mysql_error());
if ($con->query($sql_query) === TRUE) {
	$tes = "Berhasil";
	} else {

	    $tes="Error: " . $sql_query . "<br>" . $con->error;
	}
echo $name;

?>