<?php
		include("init.php");
		if(!isset($_GET["id"])){
			header("Location:index.php");
		}
		$id=$_GET["id"];
		$db->where("idVesti",$id);
		$vest = $db->getOne("vest");
				
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
                <h2>Profesor:</h2>
                <p class="tekstVest"><?php echo($vest["naslov"])?></p>
            </div>

            <div class="row">

               
				<div class="col-sm-12 col-md-12">
                    <div class="vest wow fadeInDown">
						<div class="pull-left">
						<img class="img img-responsive" style = "border: 3px solid BurlyWood;" 
                        src="slike/<?php echo($vest["slika"]); ?>">
                        </div>
                        <div class="vest-body">
                            <h3 class="vest-heading"><?php echo($vest["naslov"]); ?></h3>
                            <p><?php echo($vest["celaVest"]); ?></p>
							<p>Vest objavljena: <?php echo($vest["datum"]); ?></p>
                        </div>
                    </div>
					<div class="vest wow fadeInDown">
						<h1>Komentari</h1>
						<br><br>
						<?php
							$komentari = $db->rawQuery("select * from komentar where idVesti =".$id);
							
							if(!empty($komentari)){
								foreach($komentari as $kom):
								?>
								<div class="komentar">
									<div class="pull-left">
										<img class="img-responsive" src="images/komentar.png">
									</div>
									<div class="vest-body">
										<h3 class="vest-heading"><?php echo($kom["ime"]); ?></h3>
										<p><?php echo($kom["komentar"]); ?></p> <br><br>
									</div>
									<div style="clear:both"/>
								</div>
								<?php 
									endforeach;
							}else{
								?>
								<h3> Nema komentara za ovu vest !!!</h3>
								<?php
							}
						?>
						Dodajte novi komentar <a href="noviKomentar.php?id=<?php echo($id); ?>">ovde</a>
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
