<?php
class User {
	
	private $message;
	private $db;
	

	public function login() {
		$username = trim($_POST['username']);    
		$password = trim($_POST['lozinka']);

		$params = Array($username, $password);
		$users = $this->db->rawQuery("SELECT * FROM korisnik WHERE korisnickoIme = ? AND lozinka = ? LIMIT 1", $params); 
		
		if(count($users) > 0) {			
			
			$_SESSION['ulogovan'] = 1;  
			$_SESSION['rola'] = $users[0]['rola'];
			$_SESSION['idKorisnika'] = $users[0]['korisnikID'];
			$this->set_message('Uspešno ste se ulogovali.','success');			
			return true;
			
		} else {
			$this->set_message('Neispravno korisničko ime i/ili lozinka.','danger');
			return false;
		}
		
	}
	
	public function registracijaKorisnika($ime, $username, $lozinka)
	{	
		if($ime == '' || $username == '' || $lozinka == '' ){
			$this->set_message('Unesite sva polja.','danger');
			return false;
		}
		
		$data = Array (
				"imeIPrezime" => $ime,                        
				"korisnickoIme" => $username,
				"rola" => 'korisnik',
                "lozinka" => $lozinka
		);	

			
		$parameters = json_encode($data);
			$curl_zahtev = curl_init("http://localhost/casovi/api/noviKorisnik.json");
			curl_setopt($curl_zahtev, CURLOPT_POST, TRUE);
			curl_setopt($curl_zahtev, CURLOPT_POSTFIELDS, $parameters);
			curl_setopt($curl_zahtev, CURLOPT_RETURNTRANSFER, 1);
			$curl_odgovor = curl_exec($curl_zahtev);
			$json_objekat=json_decode($curl_odgovor, true);
			curl_close($curl_zahtev);
			
		
			if($json_objekat == "Uspesno ste uneli korisnika!") {
				$this->set_message('Uspesno ste dodali korisnika!','success');
				return true;			
			}
			else {
				$this->set_message('Neuspesna registracija korisnika','danger');
				return false;
			} 
		
			
	
 }


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
				$this->set_message('Neuspesno zakazivanje!','danger');
				return false;
			} 
		
			
	
 }
	
	public function logout() {  
		$_SESSION['ulogovan'] = 0;  
	}
	
	public function is_logged_in() {  
		return $_SESSION['ulogovan'];
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