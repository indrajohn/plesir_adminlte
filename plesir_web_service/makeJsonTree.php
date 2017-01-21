<?php 
include "koneksi.php";
include "json_wisata.php";
include "json_jenis_wisata.php";
include "json_foto.php";
include "json_comment.php";
include "json_like.php";

$ArrayDataJenisWisata = $dataJenisWisata;
$ArrayDataWisata = $dataWisata;
$ArrayDataFoto = $foto;
$ArrayDataComment = $dataComment;
$ArrayDataLike = $dataLike;


$itemsByReference = array();
$itemsByReferenceUser = array();
$itemsByReferenceComment = array();
$itemsByReferenceLike = array();
$itemsByReferenceFoto = array();
$itemsByReferenceTes = array();



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
  

 
 //data jenis wisata
  foreach($ArrayDataJenisWisata as $key => &$item) {
   $itemsByReference[$item['id']] = &$item;
   // Children array:
   $itemsByReference[$item['id']]['wisata'] = array();
   // Empty data class (so that json_encode adds "data: {}" ) 
}
// Set items as children of the relevant parent item.
foreach($ArrayDataWisata as $key => &$item)
   if($item['id_jenis_wisata'] && isset($itemsByReference[$item['id_jenis_wisata']]))
      $itemsByReference [$item['id_jenis_wisata']]['wisata'][] = &$item;
  
  foreach($ArrayDataJenisWisata as $key => &$item)
      $itemsByReferenceTes ['Jenis Wisata'][] = &$item;


/*
$itemsByReference = array();
$itemsByReferenceFoto = array();
$data = array(
    array('id' => 1, 'parent_id' => null, 'name' => 'lorem ipsum'),
    array('id' => 2, 'parent_id' => 1, 'name' => 'lorem ipsum1'),
    array('id' => 3, 'parent_id' => 1, 'name' => 'lorem ipsum2'),
    array('id' => 4, 'parent_id' => 2, 'name' => 'lorem ipsum3'),
    array('id' => 5, 'parent_id' => 3, 'name' => 'lorem ipsum4'),
    array('id' => 6, 'parent_id' => null, 'name' => 'lorem ipsum5'),
);
// Build array of item references:
foreach($ArrayDataJenisWisata as $key => &$item) {
   $itemsByReference[$item['id']] = &$item;
   // Children array:
   $itemsByReference[$item['id']]['wisata'] = array();
   // Empty data class (so that json_encode adds "data: {}" ) 
}
// Set items as children of the relevant parent item.
foreach($ArrayDataWisata as $key => &$item)
   if($item['id_jenis_wisata'] && isset($itemsByReference[$item['id_jenis_wisata']]))
      $itemsByReference [$item['id_jenis_wisata']]['wisata'][] = &$item;

  
  
/*
// Build array of item references:
foreach($data as $key => &$item) {
   $itemsByReference[$item['id']] = &$item;
   // Children array:
   $itemsByReference[$item['id']]['children'] = array();
   // Empty data class (so that json_encode adds "data: {}" ) 
   $itemsByReference[$item['id']]['data'] = new StdClass();
}

// Set items as children of the relevant parent item.
foreach($data as $key => &$item)
   if($item['parent_id'] && isset($itemsByReference[$item['parent_id']]))
      $itemsByReference [$item['parent_id']]['children'][] = &$item;

// Remove items that were added to parents elsewhere:
foreach($data as $key => &$item) {
   if($item['parent_id'] && isset($itemsByReference[$item['parent_id']]))
      unset($data[$key]);
}
*/
// Encode:
$json = json_encode(array($itemsByReferenceTes));
echo $json;
