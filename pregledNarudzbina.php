<?php
	include("init.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		include("head.php");
	?>
	<link href="css/datatabele.css" rel="stylesheet">
</head>

<body class="homepage">
	<?php include("headermeni.php"); ?> 
	

	<section id="vesti" >
	   <div class="container">
		   <br><br><br>
            <div class="center wow fadeInDown">
                <h2>Poručene knjige</h2>
            </div>
	
            <div class="row">
				<div class="col-sm-12 col-md-12">
                    <div class="vest wow fadeInDown">
				<table id="tabela" class="table table-hover">
					<thead>
						<tr>
							<th>Korisnik</th>
							<th>Knjige</th>
							<th>Broj</th>
							<th>Cena</th>
							<th>Ukupno</th>
						</tr>
					</thead>
					<tbody>
                <?php
					$narudzbine = $db->rawQuery("select k.imeIPrezime as ime,e.naziv as event,n.kolicina,e.cena,(n.kolicina * e.cena) as ukupno from narudzbina n join event e on n.eventID=e.eventID join korisnik k on n.korisnikID=k.korisnikID");
					foreach($narudzbine as $n):
				?>
					<tr>
						<td><?php echo($n["ime"]); ?></td>
						<td><?php echo($n["event"]); ?></td>
						<td><?php echo($n["kolicina"]); ?></td>
						<td><?php echo($n["cena"]); ?></td>
						<td><?php echo($n["ukupno"]); ?></td>
					</tr>
				<?php endforeach; ?>
					</tbody>
				</table>
                   </div>
				</div>				   
			</div>
			<div class="container black">
				<div class="col-sm-12 col-md-12">
					<div id="chart_div"></div>
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
	<script src="js/datatabele.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript">  
    google.load('visualization', '1', {'packages':['corechart']});  
    google.setOnLoadCallback(crtajGrafik);
    function crtajGrafik() {
      var jsonData = $.ajax({
      url: "podaciGrafik.php",
      dataType:"json",
      async: false
    }).responseText;  
    var data = new google.visualization.DataTable(jsonData);
    var options = {'title':'Broj knjiga kupljenih prema statusu obrazovanja',
     backgroundColor: { fill:'white' },
	    titleTextStyle: {
		textAlign: 'center',	
        color: 'black',
	fontSize: 22},
	  'width':800,
      'height':800,
	  legend: {
        textStyle: {
			color: 'black'	
        }
    },
	  };
 var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
    chart.draw(data,  options);

  }
   
</script>

	<script>
	$(document).ready(function(){
			$('#tabela').DataTable();
		});
	
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
