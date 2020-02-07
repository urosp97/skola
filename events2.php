<?php
	include("init.php");
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
                <h2>Srednja škola</h2>
            </div>

            <div class="row">

                <?php
					$events = $db->get("event");
					foreach($events as $event):
				?>

			<?php
					if($event["eventID"] == 8) { 
							?>
							<div class="col-sm-5">
                    <div class="vest wow fadeInDown" style = "width: 450px;height: auto;margin: 0 100px 40px;">
						<div class="text-center">
                            <img class=" img img-responsive" src="slike/<?php echo($event["slika"]); ?>"style = "margin-left: auto;margin-right: auto;">
							<h3 class="vest-heading"><?php echo($event["naziv"]); ?></h3>
							<h3 class="vest-heading">Cena: <?php echo($event["cena"]); ?> RSD</h3>
							<a class="btn btn-info btn-lg" href="naruci.php?id=<?php echo($event["eventID"]); ?>"> Naruči </a>
						
						
						</div>
                    </div>
                </div>
								<?php } ?>
				

								<?php
					if($event["eventID"] == 9) { 
							?>
							<div class="col-sm-5">
                    <div class="vest wow fadeInDown" style = "width: 450px;height: auto;margin: 0 100px 40px;">
						<div class="text-center">
                            <img class=" img img-responsive" src="slike/<?php echo($event["slika"]); ?>"style = "margin-left: auto;margin-right: auto;">
							<h3 class="vest-heading"><?php echo($event["naziv"]); ?></h3>
							<h3 class="vest-heading">Cena: <?php echo($event["cena"]); ?> RSD</h3>
							<a class="btn btn-info btn-lg" href="naruci.php?id=<?php echo($event["eventID"]); ?>"> Naruči </a>
						
						
						</div>
                    </div>
                </div>
								<?php } ?>
				
								<?php
					if($event["eventID"] == 10) { 
							?>
							<div class="col-sm-5">
                    <div class="vest wow fadeInDown" style = "width: 450px;height: auto;margin: 0 100px 40px;">
						<div class="text-center">
                            <img class=" img img-responsive" src="slike/<?php echo($event["slika"]); ?>"style = "margin-left: auto;margin-right: auto;">
							<h3 class="vest-heading"><?php echo($event["naziv"]); ?></h3>
							<h3 class="vest-heading">Cena: <?php echo($event["cena"]); ?> RSD</h3>
							<a class="btn btn-info btn-lg" href="naruci.php?id=<?php echo($event["eventID"]); ?>"> Naruči </a>
						
						
						</div>
                    </div>
                </div>
								<?php } ?>
								<?php
					if($event["eventID"] == 11) { 
							?>
							<div class="col-sm-5">
                    <div class="vest wow fadeInDown" style = "width: 450px;height: auto;margin: 0 100px 40px;">
						<div class="text-center">
                            <img class=" img img-responsive" src="slike/<?php echo($event["slika"]); ?>"style = "margin-left: auto;margin-right: auto;">
							<h3 class="vest-heading"><?php echo($event["naziv"]); ?></h3>
							<h3 class="vest-heading">Cena: <?php echo($event["cena"]); ?> RSD</h3>
							<a class="btn btn-info btn-lg" href="naruci.php?id=<?php echo($event["eventID"]); ?>"> Naruči </a>
						
						
						</div>
                    </div>
                </div>
								<?php } ?>
				
				<?php endforeach; ?>
                                                           
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
