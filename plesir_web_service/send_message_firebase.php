<?php
include "koneksi.php";

$message= isset($_GET['message']) ? $_POST['message'] : "tes";
$title = isset($_GET['title']) ? $_POST['title'] : "tes";
$path_to_fcm = 'https://fcm.googleapis.com/fcm/send';
$server_key = "AAAAvEgpalA:APA91bEivNNLX3MTxr56HTzarFOLiCoBd4HYk_UUlLG3WTlH2X42gzh-EcTpYAcPL_P6w8-1INWSuExbIUDHf09uUj67DqqzUvW-D3XaIGkdV2GXddwTly9bAdhbnELdVxwmh_f_BPVTCFCioZJml-y6MuGdVI5n6w";

$sql_query = "SELECT firebase_token from tbl_firebase_info";

$result = mysqli_query($con,$sql_query)or die(mysql_error());
$row = mysqli_fetch_row($result);
$key = $row[0];
$headers = array('Authorization:key='.$server_key,
'Content-Type:application/json');

$fields = array('to'=>$key,
'notification'=>array('title'=>$title,'body'=>$message));

$payload = json_encode($fields);

$curl_session = curl_init();
curl_setopt($curl_session, CURLOPT_URL,$path_to_fcm);
curl_setopt($curl_session, CURLOPT_POST,true);
curl_setopt($curl_session, CURLOPT_HTTPHEADER,$headers);
curl_setopt($curl_session, CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl_session, CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($curl_session, CURLOPT_IPRESOLVE,CURL_IPRESOLVE_V4);
curl_setopt($curl_session, CURLOPT_POSTFIELDS,$payload);


$result = curl_exec($curl_session);

curl_close($curl_session);
mysqli_close($con);