<?php
header('Content-type: text/html; charset=utf-8');
$id = $_GET['id'];
include("init.php");
$where = '';
if($id != 0){
$where = 'where k.idKategorije ='.$id;	 
}

$vest=$db->rawQuery('SELECT v.idVesti,v.naslov,v.celaVest as tekst,count(kom.idKomentara) as brojKomentara,k.naziv from vest v join kategorija k on v.idKategorije=k.idKategorije left join komentar kom on v.idVesti = kom.idVesti '.$where.' group by v.idVesti');

echo(json_encode($vest));


 ?>