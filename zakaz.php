<?php
class Zakaz {
	
	private $message;
	private $db;
	

 public function zakazivanje($imePrezime, $email, $datumRodjenja, $skola, $razredID, $profesorID, $termin)
	{	
		
		
		$data = Array (
				"imeIPrezime" => $imePrezime,                        
				"email" => $email,
				"datumRodjenja" => $datumRodjenja,
				"skola" => $skola,
				"razredID" => $razredID,
				"profesorID" => $profesorID,
				"termin" => $termin
				
		);	

			
		$parameters = json_encode($data);
			$curl_zahtev = curl_init("http://localhost/casovi/api/novoZakazivanje.json");
			curl_setopt($curl_zahtev, CURLOPT_POST, TRUE);
			curl_setopt($curl_zahtev, CURLOPT_POSTFIELDS, $parameters);
			curl_setopt($curl_zahtev, CURLOPT_RETURNTRANSFER, 1);
			$curl_odgovor = curl_exec($curl_zahtev);
			$json_objekat=json_decode($curl_odgovor, true);
			curl_close($curl_zahtev);
			
		
			if($json_objekat == "Uspesno ste zakazali cas!") {
				$this->set_message('Uspesno ste zakazali cas!','success');
				return true;			
			}
			else {
				$this->set_message('Uspesno ste zakazali cas!','success');
				return false;
			} 
		
			
	
 }
	

	public function get_message() {
		return $this->message;
	}
	
	public function set_message($message,$type) {
		$this->message['msg'] = $message;
		$this->message['type'] = $type;
	}
	
	
	public function set_db($db) {
		$this->db = $db;   
	}
}

?>