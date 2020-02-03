<?php
	include("init.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
		include("head.php");
	?>
</head>

<body class="homepage">

<?php 
// function to geocode address, it will return false if unable to geocode address
function geocode($address){
 
    // url encode the address
    $address = urlencode($address);
     
    // google map geocode api url
    $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key=AIzaSyAH5V6Ypb_8bBrrU-gwNicQVHHl-Dq6zt4";
 
    // get the json response
    $resp_json = file_get_contents($url);
     
    // decode the json
    $resp = json_decode($resp_json, true);
 
    // response status will be 'OK', if able to geocode given address 
    if($resp['status']=='OK'){
 
        // get the important data
        $lati = isset($resp['results'][0]['geometry']['location']['lat']) ? $resp['results'][0]['geometry']['location']['lat'] : "";
        $longi = isset($resp['results'][0]['geometry']['location']['lng']) ? $resp['results'][0]['geometry']['location']['lng'] : "";
        $formatted_address = isset($resp['results'][0]['formatted_address']) ? $resp['results'][0]['formatted_address'] : "";
         
        // verify if data is complete
        if($lati && $longi && $formatted_address){
         
            // put the data in the array
            $data_arr = array();            
             
            array_push(
                $data_arr, 
                    $lati, 
                    $longi, 
                    $formatted_address
                );
             
            return $data_arr;
             
        }else{
            return false;
        }
         
    }
 
    else{
        echo "<strong>ERROR: {$resp['status']}</strong>";
        return false;
    }
}
?>


<style>
    /* some custom css */
    #gmap_canvas{
        width:100%;
        height:30em;
    }
    </style>
	<?php include("headermeni.php"); ?> 
	
<br><br><br>
	<section id="vesti" >
	   <div class="container">
            <div class="center wow fadeInDown">
                <h2>LEPO POMNOŽI <br>I SVE POLOŽI!</h2>
                <br>
               
         
      
            <div class="tekstVest" style="color: #FFFFFF;
                                          text-shadow: 1px 3px 0 #7C664B, 1px 13px 5px #FFFFFF;
                                          background-color: hsla(280, 22%, 0.5%, 0.5);">
            <i class="em em-slightly_smiling_face"></i><b> ZDRAVO I DOBRODOŠAO! </b><br><br>
            <i class="em em-exclamation"></i> <b>UKOLIKO I TI SMATRAŠ DA JE MATEMATIKA BAUK, NA PRAVOM SI MESTU! <br><br>
            <i class="em em-pencil2"></i> <b>ZAKAŽI ČAS ŠTO PRE I UVERI SE U SUPROTNO! <br><br>
            <i class="em em-notebook_with_decorative_cover"></i><b> U TOME TI MOŽE POMOĆI I BROJNA LITERATURA KOJU IMAMO U PONUDI! <br><br>
            <i class="em em-female-teacher"></i> <b>ZA POČETAK, BACI POGLED NA NAJBOLJE PROFESORE U GRADU: <br></p>
            <div class = "arrow" style = "font-size: 50px;">&darr;</b></div>    
        </div>
</div>
                                    <br>

            <div class="row">

                <?php
					$vesti = $db->get("vest");
					foreach($vesti as $vest):
				?>
				<div class="col-sm-12 col-md-12">
				<div class="vest wow fadeInDown">
						<div class="pull-left">
                            <img class="img img-responsive" style = "border: 3px solid BurlyWood;" 
                        src="slike/<?php echo($vest["slika"]); ?>">
                        </div>
                        <div class="vest-body">
                            <h3 class="vest-heading"><?php echo($vest["naslov"]); ?></h3>
                            <p><?php echo($vest["lead"]); ?>...<a href="vest.php?id=<?php echo($vest["idVesti"]); ?>" >detaljnije</a></p>
                        </div>
                    </div>
                </div>
				
				<?php endforeach; ?>
                                                           
            </div>
        </div>
    </section>

	<?php
if($_POST){
 
    // get latitude, longitude and formatted address
    $data_arr = geocode($_POST['address']);
 
    // if able to geocode the address
    if($data_arr){
         
        $latitude = $data_arr[0];
        $longitude = $data_arr[1];
        $formatted_address = $data_arr[2];
                     
    ?>
 
    <!-- google map will be shown here -->
    <div id="gmap_canvas">Loading map...</div>
    <div id='map-label'>Map shows approximate location.</div>
 
    <!-- JavaScript to show google map -->
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyAH5V6Ypb_8bBrrU-gwNicQVHHl-Dq6zt4"></script>   
    <script type="text/javascript">
        function init_map() {
            var myOptions = {
                zoom: 14,
                center: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
            marker = new google.maps.Marker({
                map: map,
                position: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>)
            });
            infowindow = new google.maps.InfoWindow({
                content: "<?php echo $formatted_address; ?>"
            });
            google.maps.event.addListener(marker, "click", function () {
                infowindow.open(map, marker);
            });
            infowindow.open(map, marker);
        }
        google.maps.event.addDomListener(window, 'load', init_map);
    </script>
 
    <?php
 
    // if unable to geocode the address
    }else{
        echo "No map found.";
    }
}
?>
	<footer>
		STOR
	</footer>
	
	<a href="#" class="back-to-top">
		<img src="images/top.png" />
	</a>
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
	<form action="" method="post">
    <input type='text' name='address' placeholder='Enter any address here' />
    <input type='submit' value='Geocode!' />
</form>
</body>
</html>