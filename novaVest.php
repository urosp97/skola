<?php
		include("init.php");
		include("vestKlasa.php");
		$poruka = '';
		if(isset($_POST['porukaSlanje'])) {
			$vestKlasa = new Vest($db);
			$sacuvano=$vestKlasa->novaVest();
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
		   <br><br><br>
            <div class="center wow fadeInDown">
                <h2>Unos profesora</h2>
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
										<label for="form_name">	Ime i prezime *</label>
										<input id="form_name" type="text" name="naslov" class="form-control" placeholder="Ime i prezime *" >
										<div class="help-block with-errors"></div>
										</div>
									</div>
							</div>
							<div class="row">
									<div class="col-md-12">
										<div class="form-group">
										<label for="form_name">Ukratko *</label>
										<input id="form_name" type="text" name="lead" class="form-control" placeholder="Lead *" >
										<div class="help-block with-errors"></div>
										</div>
									</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
									<label for="form_message">Biografija *</label>
									<textarea id="form_message" name="vest" class="form-control" placeholder="Komentar " rows="4" ></textarea>
									<div class="help-block with-errors"></div>
								</div>
							</div>
						
							<div class="row">
									<div class="col-md-12">
										<div class="form-group">
										<label for="kategorije">Zvanje *</label>
										<div class="help-block with-errors"></div>
										<select class="form-control" id="kategorije" name="kat">
											<?php
												$curl_zahtev = curl_init("http://localhost/casovi/api/kategorije.json");
												curl_setopt($curl_zahtev, CURLOPT_RETURNTRANSFER, 1);
												$curl_odgovor = curl_exec($curl_zahtev);
												$json_objekat=json_decode($curl_odgovor, true);
												curl_close($curl_zahtev);
												$kategorije = $json_objekat;
												//$kategorije = $db->get("kategorija");
												foreach($kategorije as $kat):
											?>
											<option value="<?php echo($kat["idKategorije"]); ?>"><?php echo($kat["naziv"]); ?></option>
											<?php endforeach; ?>
										</select>
										</div>
									</div>
							</div>

				
						<div class="col-md-12">
								<input id="porukaSlanje" name="porukaSlanje" type="submit" class="btn btn-success btn-send" value="Unesi profesora">
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