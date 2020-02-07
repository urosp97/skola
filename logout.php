<?php 
require('init.php');
require('user.php');
$user = new User();
$user->set_db($db);
$user->logout();
header('Location: index.php');

?>