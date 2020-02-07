<?php

require('db.php');
$db = new MysqliDb('localhost','root','','casovi');
session_start(); 
if(!isset($_SESSION['ulogovan'])){
	
	$_SESSION['ulogovan'] = 0;
	$_SESSION['rola'] = '';
	$_SESSION['idKorisnika'] = 0;
}
?>