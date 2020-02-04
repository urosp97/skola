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
                <h2>Vesti SKY NEWS</h2>
            </div>
			<div id="outputDiv" ></div>
			
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
	<script>
	$( document ).ready(function() {
		$.getJSON('https://newsapi.org/v1/articles?source=sky-sports-news&sortBy=latest&apiKey=b4b539d08fa74230b09830e214d39ffa')
		.done(function(data) {
			var text = '<div class="col-sm-12 col-md-12"><div class="vest wow fadeInDown"><div class="vest-body">'
			$.each(data.articles, function(i, val) {
					text += '<h3>'+val.title+'</h3>';
					if(val.author != null){
						text += '<h6>'+val.author+'</h6>';
					}
					
					text += '<p>'+val.description+'</p>';
					text += '<a href="'+val.url+'">detaljnije</a>';
					if(val.publishedAt != null){
						text += '<h6>'+val.publishedAt+'</h6>';
					}
					});
					text+='</div></div></div>';
					$('#outputDiv').html(text);
		})
		.error(function(err) { alert('Greska'); 
		});
		
	});
		
	</script>
</body>
</html>
