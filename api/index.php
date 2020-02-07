<?php
require 'flight/Flight.php';
require 'jsonindent.php';


Flight::route('/', function(){
	
	die("nema podataka za praznu rutu");
});

Flight::register('db', 'Database', array('niz'));

Flight::route('GET /kategorije.json', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->vratiKategorije();

	$niz =  array();
	$iterator = 0;
	while ($red = $db->getResult()->fetch_object())
	{
		$niz[$iterator] = $red;
		$iterator += 1;
	}

	echo json_encode($niz);
});
Flight::route('POST /noviKomentar.json', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$post_data = file_get_contents('php://input');	
	$json_data = json_decode($post_data,true);
	$db->noviKomentar($json_data);
	if($db->getResult())
	{
		$response = "Uspesno ste uneli komentar!";
	}
	else
	{
		$response = "Neuspesno ste uneli komentar!";

	}

	echo indent(json_encode($response));
	
});
Flight::route('POST /noviKorisnik.json', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$post_data = file_get_contents('php://input');	
	$json_data = json_decode($post_data,true);
	$db->noviKorisnik($json_data);
	if($db->getResult())
	{
		$response = "Uspesno ste uneli korisnika!";
	}
	else
	{
		$response = "Neuspesno ste uneli korisnika!";

	}

	echo indent(json_encode($response));
	
});

Flight::route('POST /novoZakazivanje.json', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$post_data = file_get_contents('php://input');	
	$json_data = json_decode($post_data,true);
	$db->novoZakazivanje($json_data);
	if($db->getResult())
	{
		$response = "Uspesno ste zakazali cas!";
	}
	else
	{
		$response = "Neuspesno ste zakazali cas!";

	}

	echo indent(json_encode($response));
	
});

Flight::route('POST /novaVest.json', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$post_data = file_get_contents('php://input');	
	$json_data = json_decode($post_data,true);
	$db->novaVest($json_data);
	if($db->getResult())
	{
		$response = "Uspesno ste uneli profesora!";
	}
	else
	{
		$response = "Neuspesno ste uneli profesora!";

	}

	echo indent(json_encode($response));
	
});

Flight::start();
?>
