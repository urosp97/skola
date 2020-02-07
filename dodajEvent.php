<?php
	include("init.php");
	
	
if(isset($_POST['register'])) {	
		require('user.php');
		$user = new User();
		$user->set_db($db);
		$sacuvano=$user->registracijaKorisnika(trim($_POST['ime']),trim($_POST['username']),trim($_POST['lozinka']));
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
	<?php include("headermeni.php"); ?> 
	

	<section id="vesti" >
	   <div class="container">
		   <br><br><br>
            <div class="center wow fadeInDown">
                <h2>Dodavanje knjiga</h2>
            </div>

            <div class="row">
			
			<div class="col-sm-12 col-md-12">
                   
			<form class="well" action="upload.php" method="post" enctype="multipart/form-data">
				<input type="text" name="naziv" class="form-control" placeholder="Naziv">
				<br>
				<input type="text" name="cena" class="form-control" placeholder="Cena">
				
				<br>
				<input type="file" name="file" placeholder="Ubacite sliku knjige">
				<p class="help-block">Samo jpg,jpeg,png i gif slike su dozvoljene</p>
				<input type="submit" class="btn btn-lg btn-primary" value="Sacuvaj">
			</form>  
			<?php if(!empty($msg['msg'])): ?>
			<div class="alert alert-<?php echo $msg["type"]; ?>">
				<span><?php echo $msg["msg"]; ?></span>	
			</div>
		<?php endif; ?>
                  
                </div>
				
                                                           
            </div>
        </div>
    </section>
	<footer>
		STOR
	</footer>
	
	<a href="#" class="back-to-top">
		<img src="images/top.png" />
	</a>
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
	<script>
			
$(document).ready(function() {
	
	$('#generisiLozinku').click(function() {
		
		$.ajax({
		  url: 'generisiLozinku.php',
		  dataType: 'json',
		  success: function(json) {
		  	console.log(json);
		  	if(json.password != "") {
		  		
		  		$('#lozinka').val(json.password);
		  		
		  	}
		  },
			error: function(json) {
		  	console.log(json,password +' error');
		  	
			  
		  }			  
		});
		
	});
	
});
</script>

</body>
</html>
