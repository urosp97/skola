<?php
		include("init.php");
		include("vestKlasa.php");
		$poruka = '';
		if(!isset($_GET["id"])){
			header("Location:index.php");
		}
		$id=$_GET["id"];
		$db->where("idVesti",$id);
		$vest = $db->getOne("vest");
		if(isset($_POST['porukaSlanje'])) {
			$vestKlasa = new Vest($db);
			$sacuvano=$vestKlasa->izmeniVest($id);
			$poruka=$vestKlasa->get_message();
			header("Location: opcije.php");
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
                <h2>Izmena vesti</h2>
            </div>

            <div class="row">
				<div class="col-sm-12 col-md-12">
                    <div class="vest wow fadeInDown">
						<form id="forma" method="post" action="" role="form">

							<?php if($poruka != ''){ ?>
								<div class="well"><?php echo $poruka["msg"] ?></div>
							<?php } ?>
							<div class="row">
									<div class="col-md-12">
										<div class="form-group">
										<label for="form_name">Naslov *</label>
										<input id="form_name" type="text" name="naslov" class="form-control" value="<?php echo $vest["naslov"] ?>" >
										<div class="help-block with-errors"></div>
										</div>
									</div>
							</div>
							<div class="row">
									<div class="col-md-12">
										<div class="form-group">
										<label for="form_name">Lead *</label>
										<input id="form_name" type="text" name="lead" class="form-control" value="<?php echo $vest["lead"] ?>" >
										<div class="help-block with-errors"></div>
										</div>
									</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
									<label for="form_message">Vest *</label>
									<textarea id="form_message" name="vest" class="form-control"  rows="4" ><?php echo $vest["celaVest"] ?></textarea>
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="row">
									<div class="col-md-12">
										<div class="form-group">
										<label for="kategorije">Kategorija *</label>
										<select class="form-control" id="kategorije" name="kat">
										<?php
											$db->where("idKategorije",$vest["idKategorije"]);
											$izabranaKat = $db->getOne("kategorija");
							
										?>
										<option value="<?php echo $izabranaKat["idKategorije"] ?>"><?php echo $izabranaKat["naziv"] ?></option>
											<?php
												$kategorije = $db->get("kategorija");
												foreach($kategorije as $kat):
											?>
											<option value="<?php echo($kat["idKategorije"]); ?>"><?php echo($kat["naziv"]); ?></option>
											<?php endforeach; ?>
										</select>										<div class="help-block with-errors"></div>
										</div>
									</div>
							</div>
							<div class="col-md-12">
								<input id="porukaSlanje" name="porukaSlanje" type="submit" class="btn btn-success btn-send" value="Izmeni vest">
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
    <script src="js/main.js"></script>
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
