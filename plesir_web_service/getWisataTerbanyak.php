<?php
include "koneksi.php";
include "json_foto.php";
$sql_query = "
SELECT w.*,j.nama,l.jumlah_like FROM tbl_wisata w 
LEFT JOIN ( SELECT id_wisata, COUNT(id_wisata) AS jumlah_like 
FROM tbl_like c where c.is_liked = '1' 
GROUP BY c.id_user ORDER BY jumlah_like DESC ) l 
ON l.id_wisata= w.id join tbl_jenis_wisata j where w.id_jenis_wisata = j.id GROUP BY w.id_jenis_wisata
ORDER BY w.id_jenis_wisata ASC";
$result = mysqli_query($con,$sql_query)or die(mysql_error());

if(mysqli_num_rows($result)> 0 )
{  
           $posts = array();
	   $wisata = array();
	 if(mysqli_num_rows($result))
              {
                     while($post = mysqli_fetch_assoc($result)){
                             $posts[] = $post;
                     }
		$wisata = $posts;
              }  
}
else
	echo "Data Kosong";


$itemsByReferenceFoto = array();
$itemsByReferenceTes = array();	
$itemsFoto = array();/*
foreach($wisata as $key => &$item) {
   $itemsByReferenceFoto[$item['id']] = &$item;
   // Children array:
   $itemsByReferenceFoto[$item['id']]['foto'] = array();
   // Empty data class (so that json_encode adds "data: {}" ) 
}

foreach($foto as $key => &$item)
      $itemsFoto[] = &$item;

foreach($itemsFoto as $key => &$item)
   if(isset($itemsByReferenceFoto[$item['id_wisata']]))
      $itemsByReferenceFoto [$item['id']]['foto'][] = &$item;

foreach($itemsByReferenceFoto as $key => &$item) {
   $itemsByReferenceTes[] = &$item;
}


*/

//------------------------------------------------------------------------------------
foreach($wisata as $key => &$item) {
  $itemsByReferenceFoto[$item['id']] = &$item;
  // Children array:
  $itemsByReferenceFoto[$item['id']]['foto'] = array();
  // Empty data class (so that json_encode adds "data: {}" ) 
}
foreach($foto as $key => &$item)
{
  if($item['id_wisata'] && isset($itemsByReferenceFoto[$item['id_wisata']]))
    $itemsByReferenceFoto [$item['id_wisata']]['foto'][] = &$item;
}
/*
foreach($itemsByReferenceFoto as $key => &$item) {
   $itemsByReferenceTes[] = &$item;
}*/
echo json_encode($wisata);
