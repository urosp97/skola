<?php
	include("init.php");
	
	if(!isset($_GET['id'])){
		header("Location: events.php");
	}

	if(isset($_POST['ubaci'])) {
		
		$korisnikID = $_SESSION['idKorisnika'];
		$eventID = $_GET['id'];
		$kolicina = $_POST['kolicina'];
		$korisnikID=strip_tags($korisnikID);
		$eventID=strip_tags($eventID);
		$kolicina=strip_tags($kolicina);
		$db->rawQuery("INSERT INTO narudzbina(eventID,korisnikID,kolicina,datumNarudzbine) VALUES(".$eventID.",".$korisnikID.",".$kolicina.",NOW())");
		header("Location:events.php");
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
                <h2>Naruci knjigu</h2>
            </div>

            <div class="row">
			
			<div class="col-sm-12 col-md-12">
           
						<form name="ubaci" method="post" action="">
				<div class="form-group">
					<label for="kolicina" class="cols-sm-2 control-label">Kolicina</label>
						<div class="col-sm-12 col-md-12">
							<input type="number" class="form-control" name="kolicina" id="kolicina"  placeholder="Kolicina knjiga"/>
						</div>
					</div>

				
				<div class="form-group ">
					<input type="submit" name="ubaci" class="btn btn-primary btn-lg " value="Naruci">
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
