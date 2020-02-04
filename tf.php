<?php
    include("init.php");
   
   
    if(isset($_POST['unos'])) {	
		require('zakaz.php');
		$user = new Zakaz();
		$user->set_db($db);
		$sacuvano=$user->zakazivanje(trim($_POST['imePrezime']),trim($_POST['email']),trim($_POST['datumRodjenja']), trim($_POST['skola']), trim($_POST['razredID']), trim($_POST['profesorID']), trim($_POST['termin']));
		$msg = $user->get_message();
	}
   
   ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		include("head.php");
	?>
</head>

<body class="homepage">
	<?php include("headerMeni.php"); ?> 
	

	<br><br><br>
    

            <div class="bleja">

   
           <br>
            
            <h2 align="center" style = "font-size: 36px;
                                        color: #fff;"><b>Zakaži čas!</b></h2>
                                        <br><br>
            <form method = "post" action = "">
<div class="form-group">
    <h4><b>Ime i prezime<br/></h4>
        <input name = "imePrezime" class="form-control" type = "text" required/><br>
</div>
<div class="form-group">
        <h4><b>E-mail<br/></h4>
        <input name = "email" class="form-control" type = "text" required/><br>
</div>
<div class="form-group">
    <h4><b>Datum rodjenja</b><br/></h4>
        <input name = "datumRodjenja" class="form-control" type = "date"/> <br>
</div>

<div class="form-group">
    <h4><b>Škola<br/></h4>
        <input name = "skola" class="form-control" type = "text"/><br>
</div>
<div class="form-group">
    <h4><b>Razred<br/></h4>
      <select name = "razredID">
        <option value = "1">1. razred osnovne skole</option>
        <option value = "2">2. razred osnovne skole</option>
        <option value = "3">3. razred osnovne skole</option>
        <option value = "4">4. razred osnovne skole</option>
        <option value = "5">5. razred osnovne skole</option>
        <option value = "6">6. razred osnovne skole</option>
        <option value = "7">7. razred osnovne skole</option>
        <option value = "8">8. razred osnovne skole</option>
        <option value = "9">1. razred srednje skole</option>
        <option value = "10">2. razred srednje skole</option>
        <option value = "11">3. razred srednje skole</option>
        <option value = "12">4. razred srednje skole</option>
      </select><br><br>
</div>
<div class="form-group">
      <h4><b>Profesor<br/></h4>
       <select name = "profesorID">
       <option value = "1">Miloš Matić</option>
        <option value = "2">Nikola Nikolić</option>
        <option value = "3">Ana Anić</option>
        <option value = "4">Petra Pavlović</option>
        </select><br><br>
</div>
<div class="form-group">
    <h4><b>Termin</b><br/></h4>
        <input name = "termin" class="form-control" type = "datetime-local"/> <br>
</div>

<div class="form-group">
<?php if(!empty($msg['msg'])): ?>
			<div class="alert alert-<?php echo $msg["type"]; ?>">
				<span><?php echo $msg["msg"]; ?></span>	
			</div>
		<?php endif; ?>
      <input name = "unos" type = "submit" class="btn btn-primary" value = "Prijava">
</div>
</form>

                 

</div>  


</body>
</html>