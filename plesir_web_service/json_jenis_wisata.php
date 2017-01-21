<?php
include "koneksi.php";
$sql_query = "SELECT * FROM tbl_jenis_wisata";
$result = mysqli_query($con,$sql_query)or die(mysql_error());

if(mysqli_num_rows($result)> 0 )
{
	$posts = array();
	 if(mysqli_num_rows($result))
              {
                     while($post = mysqli_fetch_assoc($result)){
                             $posts[] = $post;
                     }
              }  
			  $dataJenisWisata =$posts;
	
}
else
	echo "Data Kosong";
