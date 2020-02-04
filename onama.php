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
                <h2>O nama</h2>
                <p class="tekstVest">Sta mi <br>to radimo</p>
            </div>
			<div class="col-sm-12 col-md-12">
                    <div class="vest wow fadeInDown">
                        <div class="vest-body">
                            <h3 class="vest-heading">Ko smo mi ???</h3>
                            <p>Mi smo grupa Novakovih fanova koja pokusava da priblizi naseg omiljenog sportistu svim drugim ljudima. Na ovom sajtu predstavljamo sve vesti iz Novakovog zivota,
							njegove pobede, i njegove uspehe.</p>
							<p>Novak je nesto najbolje sto Srbija trenutno ima i mi se trudimo da priblizimo njegov uspeh svima.</p>
							<p>Trenutno je drugi na svetu, iako je vladao suvereno bas dugo, ali drugi deo sezone, umor i privatni problemi su uzeli maha. Sada ostaje samo da mu pozelimo da u novoj sezoni ostvari svoje najbolje rezultate.</p>
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
