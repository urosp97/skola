<?php
		include("init.php");
		include("vestKlasa.php");
		if(!isset($_GET["id"])){
			header("Location:index.php");
		}
		$id=$_GET["id"];
		$poruka = '';
		if(isset($_POST['porukaSlanje'])) {
			$vestKlasa = new Vest($db);
			$sacuvano=$vestKlasa->noviKomentar($_GET['id']);
			$poruka=$vestKlasa->get_message();
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
            <div class="center wow fadeInDown">
				<br><br><br>
                <h2>Novi komentar</h2>
            </div>

            <div class="row">
				<div class="col-sm-12 col-md-12">
                    
						<form id="forma" method="post" action="" role="form">

							<?php if($poruka != ''){ ?>
								<div class="well"><?php echo $poruka["msg"] ?></div>
							<?php } ?>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
										<label for="form_name">Ime *</label>
										<input id="form_name" type="text" name="name" class="form-control" placeholder="Ime *" >
										<div class="help-block with-errors"></div>
										</div>
									</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
									<label for="form_message">Komentar *</label>
									<textarea id="form_message" name="komentar" class="form-control" placeholder="Komentar " rows="4" ></textarea>
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<input id="porukaSlanje" name="porukaSlanje" type="submit" class="btn btn-success btn-send" value="Posalji komentar">
							</div>
						</div>
				<div class="row">
					<div class="col-md-12">
						<p class="text-muted"><strong>*</strong> Obavezna polja.</p>
					</div>
				</div>
			</div>

			</form> 
                   
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
