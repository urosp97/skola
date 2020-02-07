<?php
class Database {
	private $hostname = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "casovi";
	private $dblink;
	private $result = true;
	private $records;
	private $affectedRows;


	function __construct($dbname)
	{
		$this->$dbname = $dbname;
		$this->Connect();
	}
	
	public function getResult()
	{
		return $this->result;
	}
	
	function __destruct()
	{
		$this->dblink->close();
	}

	
	function Connect()
	{
		$this->dblink = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
		if($this->dblink->connect_errno)
		{
			printf("Konekcija neuspesna: %s\n",  $mysqli->connect_error);
			exit();
		}
		$this->dblink->set_charset("utf8");
	}
	
	function noviKomentar($data) {
		$mysqli = new mysqli("localhost", "root", "", "casovi");
		$cols = '(idVesti, ime, komentar)';
		
		$values = "(".$data['idVesti'].",'".$data['ime']."','".$data['komentar']."')";
		
		$query = 'INSERT into komentar '.$cols. ' VALUES '.$values;
		
		if($mysqli->query($query))
		{
			$this ->result = true;
		}
		else
		{
			$this->result = false;
		}
		$mysqli->close();
	}
	
	function noviKorisnik($data) {
		$mysqli = new mysqli("localhost", "root", "", "casovi");
		$cols = '(imeIPrezime, korisnickoIme, lozinka)';
		
		$values = "('".$data['imeIPrezime']."','".$data['korisnickoIme']."','".$data['lozinka']."')";
		
		$query = 'INSERT into korisnik '.$cols. ' VALUES '.$values;
		
		$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
		fwrite($myfile, $query);
		
		if($mysqli->query($query))
		{
			$this ->result = true;
		}
		else
		{
			$this->result = false;
		}
		$mysqli->close();
	}
	

	function novoZakazivanje($data) {
		$mysqli = new mysqli("localhost", "root", "", "casovi");
		$cols = '(imePrezime, email, datumRodjenja, skola, razredID, profesorID, termin)';
		
		$values = "('".$data['imePrezime']."','".$data['email']."','".$data['datumRodjenja']."','".$data['skola']."',".$data['razredID']."',".$data['profesorID']."',".$data['termin'].")";
		
		$query = 'INSERT into zakazi '.$cols. ' VALUES '.$values;

		
		if($mysqli->query($query))
		{
			$this ->result = true;
		}
		else
		{
			$this->result = false;
		}
		$mysqli->close();
	}

	function novaVest($data) {
		$mysqli = new mysqli("localhost", "root", "", "casovi");
		$cols = '(naslov, lead, celaVest, datum,idKategorije)';
		
		$values = "('".$data['naslov']."','".$data['lead']."','".$data['celaVest']."','".$data['datum']."','".$data['idKategorije']."')";
		
		$query = 'INSERT into vest '.$cols. ' VALUES '.$values;
		
		if($mysqli->query($query))
		{
			$this ->result = true;
		}
		else
		{
			$this->result = false;
		}
		$mysqli->close();
	}
	
	function vratiKategorije() {
		$mysqli = new mysqli("localhost", "root", "", "casovi");
		$q = 'SELECT * FROM kategorija ';
		$this ->result = $mysqli->query($q);
		$mysqli->close();
	}
	
	function vratiEvents1() {
		$mysqli = new mysqli("localhost", "root", "", "casovi");
		$q = 'SELECT * FROM events WHERE naziv = "Osnovna škola" and  naziv = "Srednja škola" and  naziv = "Dodatna literatura"';
		$this ->result = $mysqli->query($q);
		$mysqli->close();
	}

	
	
	function ExecuteQuery($query)
	{
		if($this->result = $this->dblink->query($query)){
			if (isset($this->result->num_rows)) $this->records         = $this->result->num_rows;
				if (isset($this->dblink->affected_rows)) $this->affected        = $this->dblink->affected_rows;
					return true;
		}	
		else{
			return false;
		}
	}
}
?>