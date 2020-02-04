<?php
include ("init.php");
if(!isset($_GET['id'])){
	header("Location: index.php");
}
$id=$_GET['id'];
$db->where('idVesti',$id);
$db->delete('vest');
header("Location:opcije.php");
 ?>