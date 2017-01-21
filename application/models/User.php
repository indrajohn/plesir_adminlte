<?php
Class User extends CI_Model
{
 function login($username, $password)
 {
   $this -> db -> select('username, password');
   $this -> db -> from('tbl_admin_web');
   $this -> db -> where('username', $username);
   $this -> db -> where('password', $password);
   $this -> db -> limit(1);
 
   $query = $this -> db -> get();
 
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }

 function getAdmin()
 {
    $query = $this->db->get('tbl_admin_web'); 
    return $query;


 }
}
?>