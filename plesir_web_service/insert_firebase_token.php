<?php
include "koneksi.php";

$firebase_token= isset($_GET['firebase_token']) ? $_GET['firebase_token'] : "";

$sql_query = "SELECT * from tbl_firebase_info where firebase_token= '$firebase_token'";

$result = mysqli_query($con,$sql_query)or die(mysql_error());

$cekTokenInDatabase = mysqli_num_rows($result)> 0 ? "true" : "false";

if($cekTokenInDatabase != "true")
{
$sql_query = "INSERT INTO tbl_firebase_info(firebase_token) 
values('$firebase_token')";

if(mysqli_query($con,$sql_query))
echo "Data Insertion Success..";
else
echo "Data Insertion Error..".mysqli_error($con);		
}
