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
                <h2>Profesori</h2>

            </div>

            <div class="row">
				<div class="col-sm-12 col-md-12">
                    <div class="vest wow fadeInDown">
					<select id="kategorije" name="kat" onchange="postavi()">
					<option value="0">Zvanja</option>
						<?php
							$kategorije = $db->get("kategorija");
							foreach($kategorije as $kat):
						?>
						<option value="<?php echo($kat["idKategorije"]); ?>"><?php echo($kat["naziv"]); ?></option>
						<?php endforeach; ?>
					</select>
						<div id="tabela"></div>	
						<a class="btn btn-info btn-lg" href="novaVest.php"> Unesi novog profesora </a>
						
                    
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
	
	
	<a href="#" class="back-to-top">
		<img src="images/top.png" />
	</a>
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	

<script>
		
		function postavi(){
			
			var kategorija = $("#kategorije").val();
			$.ajax({
				url: "generisiTabelu.php",
				data: "id="+kategorija,
				success: function(result){
				var text = '<table class="table table-hover"><thead><tr><th>Ime i prezime profesora</th><th>Biografija</th><th>Broj komentara</th><th>Zvanje</th><th>Izmena</th><th>Brisanje</th></tr></thead><tbody>';
				$.each($.parseJSON(result), function(i, val) {
					text += '<tr>';
					text += '<td>'+val.naslov+'</td>';
					text += '<td>'+val.tekst+'</td>';
					text += '<td>'+val.brojKomentara+'</td>';
					text += '<td>'+val.naziv+'</td>';
					text += '<td><a href="izmeni.php?id='+val.idVesti+'">Izmena</a></td>';
					text += '<td><a href="obrisi.php?id='+val.idVesti+'">Obrisi</a></td>';
					text += '</tr>';
					
					});
					
					text+='</tbody></table>';
					$('#tabela').html(text);
			}});
		}
		
</script>

<script>
		$( document ).ready(function() {
			postavi();
		});
</script>
</body>
</html>