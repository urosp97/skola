<?php
	include("init.php");
	
	

	if(isset($_POST['login'])) {
		
		require('user.php');
		$user = new User();
		$user->set_db($db);
		
		if($user->login()) {
			header("Location: index.php");
			
		}else{
			echo '<div>GRESKA!!</div>';
		}
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
	
	<br><br><br>
	<section id="vesti" >
	   <div class="container">
            <div class="center wow fadeInDown">
                <h2>ULOGUJ SE</h2>
            </div>

            <div class="row">
			
			<div class="col-sm-12 col-md-12">
                  
						<form name="login_form" method="post" action="">
				<div class="form-group">
					<label for="username" class="cols-sm-2 control-label">Korisnicko ime</label>
						<div class="col-sm-12 col-md-12">
							<input type="text" class="form-control" name="username" id="username"  placeholder="Korisnicko ime"/>
					
					</div>

				<div class="form-group">
					<label for="password" class="cols-sm-2 control-label">Lozinka</label>
						<div class="col-sm-12 col-md-12">
							<input type="password" class="form-control" name="lozinka" id="password"  placeholder="Lozinka"/>
						</div>
				</div>
				<div class="form-group ">
					<input type="submit" name="login" class="btn btn-primary btn-lg " value="Login">
				</div>
					
					
					
			</form>
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
			var offset = 300;
			var duration = 300;
			$(window).scroll(function() {
				if ($(this).scrollTop() > offset) {
					$('.back-to-top').fadeIn(duration);
				} else {
					$('.back-to-top').fadeOut(duration);
				}
			});
    
			$('.back-to-top').click(function(event) {
				event.preventDefault();
				$('html, body').animate({scrollTop: 0}, duration);
				return false;
			})
		});
</script>
</body>
</html>
