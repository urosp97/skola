<?php

class Vest {
	
	private $poruka;
	private $db;
	
	public function __construct($db) {
		$this->db = $db;   
	}
	
	public function noviKomentar($id) {
		if(!isset($_POST['name']) || !isset($_POST['komentar'])){
			$this->set_message('Neuspesno postavljen komentar, sva polja su obavezna.','error');
			return false;
			
		}
		if($_POST['name']=='' || $_POST['komentar']==''){
			$this->set_message('Neuspesno postavljen komentar, sva polja su obavezna.','error');
			return false;
			
		}
		$data = Array (
				"ime" => trim($_POST['name']),                        
				"komentar" => trim($_POST['komentar']),
                "idVesti" => $id
		);	
		$parameters = json_encode($data);
			$curl_zahtev = curl_init("http://localhost/casovi/api/noviKomentar.json");
			curl_setopt($curl_zahtev, CURLOPT_POST, TRUE);
			curl_setopt($curl_zahtev, CURLOPT_POSTFIELDS, $parameters);
			curl_setopt($curl_zahtev, CURLOPT_RETURNTRANSFER, 1);
			$curl_odgovor = curl_exec($curl_zahtev);
			$json_objekat=json_decode($curl_odgovor, true);
			curl_close($curl_zahtev);
			
		
			if($json_objekat == "Uspesno ste uneli komentar!") {
				$this->set_message('Uspesno ste ubacili komentar!','success');
				return true;			
			}
			else {
				$this->set_message('Neuspesno postavljen komentar','error');
				return false;
			} 

		  
	}
	
	public function novaVest() {
		if(!isset($_POST['naslov']) || !isset($_POST['lead']) || !isset($_POST['vest']) || !isset($_POST['kat'])){
			$this->set_message('Neuspesno postavljen profesor, sva polja su obavezna.','error');
			return false;
			
		}
		
		if($_POST['naslov']=='' || $_POST['lead']=='' || $_POST['vest']=='' || $_POST['kat']==''){
			$this->set_message('Neuspesno postavljen profesor, sva polja su obavezna.','error');
			return false;
			
		}
		$data = Array (
				"naslov" => trim($_POST['naslov']),                        
				"lead" => trim($_POST['lead']),
				"celaVest" => trim($_POST['vest']),
				"datum" => date("Y-m-d H:i:s"),
				"idKategorije" => trim($_POST['kat'])
		);	
		
		$parameters = json_encode($data);
			$curl_zahtev = curl_init("http://localhost/casovi/api/novaVest.json");
			curl_setopt($curl_zahtev, CURLOPT_POST, TRUE);
			curl_setopt($curl_zahtev, CURLOPT_POSTFIELDS, $parameters);
			curl_setopt($curl_zahtev, CURLOPT_RETURNTRANSFER, 1);
			$curl_odgovor = curl_exec($curl_zahtev);
			$json_objekat=json_decode($curl_odgovor, true);
			curl_close($curl_zahtev);
			
		
			if($json_objekat == "Uspesno ste uneli profesora!") {
				$this->set_message('Uspesno ste uneli profesora!','success');
				return true;			
			}
			else {
				$this->set_message('Neuspesno uneta profesora','error');
				return false;
			}  
	}
	
	public function izmeniVest($id) {
		if(!isset($_POST['naslov']) || !isset($_POST['lead']) || !isset($_POST['vest']) || !isset($_POST['kat'])){
			$this->set_message('Neuspesno postavljen profesor, sva polja su obavezna.','error');
			return false;
			
		}
		
		if($_POST['naslov']=='' || $_POST['lead']=='' || $_POST['vest']=='' || $_POST['kat']==''){
			$this->set_message('Neuspesno izmenjen profesor, sva polja su obavezna.','error');
			return false;
			
		}	

		$params = Array(trim($_POST['naslov']), trim($_POST['lead']), trim($_POST['vest']), date("Y-m-d H:i:s"),trim($_POST['kat']),$id);
		$this->db->rawQuery("UPDATE vest SET naslov=?,lead=?,celaVest=?,datum=?,idKategorije=? WHERE idVesti=?",$params); 
		$this->set_message('Vest uspešno izmenjena.','success');
		return true;  
	}
	public function get_message() {
		return $this->poruka;
	}
	
	public function set_message($message,$type) {
		$this->poruka['msg'] = $message;
		$this->poruka['type'] = $type;
	}
}

?>