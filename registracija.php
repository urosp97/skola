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
	<?php include("headerMeni.php"); ?> 
	

	<br><br><br>

	<section id="vesti" >
	   <div class="container">
            <div class="center wow fadeInDown">
                <h2>REGISTRUJ SE</h2>
            </div>

            <div class="row">
			
			<div class="col-sm-12 col-md-12">
                    
						<form name="login_form" method="post" action="">
			<div class="form-group">
					<label for="ime" class="cols-sm-2 control-label">Ime i prezime</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="ime" id="ime"  placeholder="Ime i prezime"/>
							</div>
						
				</div>
			<br>
				<div class="form-group">
					<label for="username" class="cols-sm-2 control-label">Korisnicko ime</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="username" id="username"  placeholder="Korisnicko ime"/>
							</div>
						</div>
				</div>

				<div class="form-group">
					<label for="password" class="cols-sm-2 control-label">Lozinka</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
								<input id="lozinka" type="text" class="form-control" name="lozinka" id="password"  placeholder="Lozinka"/>
							</div>
							<br>
							<button type="button" class="btn btn-info btn-lg" id="generisiLozinku">Generisi lozinku</button>
						</div>
				</div>
				<div class="form-group ">
					<input type="submit" name="register" class="btn btn-primary btn-lg " value="Registruj se">
				</div>
			</form>
			<?php if(!empty($msg['msg'])): ?>
			<div class="alert alert-<?php echo $msg["type"]; ?>">
				<span><?php echo $msg["msg"]; ?></span>	
			</div>
		<?php endif; ?>
                    </div>
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
