<?php
include "koneksi.php";
include "json_foto.php";
include "json_comment.php";
include "json_like.php";
$search_criteria = isset($_GET['search_criteria']) ? $_GET['search_criteria'] : "";
$sql_query = "SELECT * FROM tbl_wisata where nama_wisata like '%$search_criteria%'";
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
        $dataSearchWisata =$posts;
    }


$ArrayDataWisata = $dataSearchWisata;
$ArrayDataFoto = $foto;
$ArrayDataComment = $dataComment;
$ArrayDataLike = $dataLike;

foreach($ArrayDataWisata as $key => &$item) {
   $itemsByReferenceFoto[$item['id']] = &$item;
   // Children array:
   $itemsByReferenceFoto[$item['id']]['foto'] = array();
   $itemsByReferenceFoto[$item['id']]['comment'] = array();
   $itemsByReferenceFoto[$item['id']]['like'] = array();   
   // Empty data class (so that json_encode adds "data: {}" ) 
}


//datafoto  
foreach($ArrayDataFoto as $key => &$item)
   if($item['id_wisata'] && isset($itemsByReferenceFoto[$item['id_wisata']]))
      $itemsByReferenceFoto [$item['id_wisata']]['foto'][] = &$item;
  //data comment
  foreach($ArrayDataComment as $key => &$item)
   if($item['id_wisata'] && isset($itemsByReferenceFoto[$item['id_wisata']]))
      $itemsByReferenceFoto [$item['id_wisata']]['comment'][] = &$item;

  foreach($ArrayDataLike as $key => &$item)
   if($item['id_wisata'] && isset($itemsByReferenceFoto[$item['id_wisata']]))
      $itemsByReferenceFoto [$item['id_wisata']]['like'][] = &$item;



      echo json_encode($ArrayDataWisata);