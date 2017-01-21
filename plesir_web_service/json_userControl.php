<?php
include "koneksi.php";
$email = isset($_GET['email']) ? $_GET['email'] : "";
$facebook_id = isset($_GET['facebook_id']) ? $_GET['facebook_id'] : "";
$nama_user = isset($_GET['nama_user']) ? $_GET['nama_user'] : "";

$sql_query = "SELECT * from tbl_user where facebook_id='$facebook_id'";

$result = mysqli_query($con,$sql_query)or die(mysql_error());
$cekUserInDatabase = mysqli_num_rows($result)> 0 ? "true" : "false";

$dataUser = array();
$dataUserNow = "";
if($cekUserInDatabase=="true")
{
	if(mysqli_num_rows($result)> 0 )
	{  
		$posts = array();
		 if(mysqli_num_rows($result))
          {
             while($post = mysqli_fetch_assoc($result)){
                     $dataUserNow = $post;
             }
          }  
	}
	else
		echo "Data Kosong";
}
else
{
		$nama_file = $nama_user ."jpg";
		$sql = "INSERT INTO tbl_user (nama_user, facebook_id,email)
	VALUES ('$nama_user','$facebook_id','$email')";
	
	
	if ($con->query($sql) === TRUE) {
    $the_user_id = $con->insert_id;

	} else {
	    echo "Error: " . $sql . "<br>" . $con->error;
	}

	$sql_query = "SELECT * from tbl_user where id='$the_user_id'";

	$result = mysqli_query($con,$sql_query)or die(mysql_error());

	if(mysqli_num_rows($result)> 0 )
	{  
		$posts = array();
		 if(mysqli_num_rows($result))
          {
             while($post = mysqli_fetch_assoc($result)){
                     $dataUserNow = $post;
             }
          }  
	}
	else
		echo "Data Kosong";

}

echo json_encode($dataUserNow);


