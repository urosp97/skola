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
	<?php include("headerMeni.php"); ?> 
	

	<section id="vesti" >
	   <div class="container">
            <div class="center wow fadeInDown">
				<br><br><br>
                <h2>Knjige</h2>
  
            </div>

            <div class="row">

                <?php
					$events = $db->get("event");
					foreach($events as $event):
				?>
				<?php
					if($event["eventID"] == 1) { 
							?>
							<div class="col-sm">
                    <div class="vest wow fadeInDown" style =   "padding: 20px 0px 20px 0px;
																margin: 0 0 40px 25%;
																box-sizing: border-box;
																width: 50%;
																top: 50%;
																left: 50%;">
						<div class="text-center">
                            <img class=" img img-responsive" src="slike/<?php echo($event["slika"]); ?>"style = "margin-left: auto;margin-right: auto;">
							<h3 class="vest-heading"><?php echo($event["naziv"]); ?></h3>
							
							<a class="btn btn-info btn-lg" href="events1.php">Kupi </a>
						
						
						</div>
                    </div>
                </div>
								<?php } ?>

								<?php
					if($event["eventID"] == 2) { 
							?>
							<div class="col-sm">
							<div class="vest wow fadeInDown" style =   "padding: 20px 0px 20px 0px;
																margin: 0 0 40px 25%;
																box-sizing: border-box;
																width: 50%;
																top: 50%;
																left: 50%;">
						<div class="text-center">
                            <img class=" img img-responsive" src="slike/<?php echo($event["slika"]); ?>" style = "margin-left: auto;margin-right: auto;">
							<h3 class="vest-heading"><?php echo($event["naziv"]); ?></h3>
							
							<a class="btn btn-info btn-lg" href="events2.php">Kupi </a>
						
						
						</div>
                    </div>
                </div>
								<?php } ?>

								<?php
					if($event["eventID"] == 3) { 
							?>
							<div class="col-sm">
							<div class="vest wow fadeInDown" style =   "padding: 20px 0px 20px 0px;
																margin: 0 0 40px 25%;
																box-sizing: border-box;
																width: 50%;
																top: 50%;
																left: 50%;">
						<div class="text-center">
                            <img class=" img img-responsive" src="slike/<?php echo($event["slika"]); ?>"style = "margin-left: auto;margin-right: auto;">
							<h3 class="vest-heading"><?php echo($event["naziv"]); ?></h3>
							
							<a class="btn btn-info btn-lg" href="events3.php"> Kupi</a>
						
						
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

</body>
</html>
