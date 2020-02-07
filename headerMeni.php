<header id="header">

<nav class="navbar navbar-inverse navbar-fixed-top">
              <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#" style="font-size: 23px">   &#960тaj, ne sкiтaj</a>
                </div>
					<ul class="nav navbar-nav">
                    <li><a href="index.php">Početna</a></li>
							<?php if($_SESSION['ulogovan'] == 1){ 
							
									if($_SESSION['rola'] == 'admin'){
							?>   
			
								<li><a href="opcije.php">Opcije</a></li>  
                                <li><a href="pregledNarudzbina.php">Porucene knjige</a></li> 
                                <li><a href="dodajEvent.php">Dodavanje knjiga u prodavnicu</a></li>    
                            <?php } ?>
                            <?php if($_SESSION['rola'] == 'korisnik'){
							?>   
			
                                <li> <a href = "tf.php">Zakaži čas</li> 
                                
                                    
                            <?php } ?>
                                        
								<li>
								<a href="events.php">Knjige</a>  
                            </li>
                            <li>
								<a href="indexDownload.php">Download sekcija</a>  
                            </li>
							<li>
								<a href="logout.php">Logout</a>  
                            </li>
                            
                            
						<?php }else{ ?>
							<li ><a href="registracija.php">Registracija</a></li>
							<li>								
								<a href="login.php">Login</a>  
                            </li>
                           
						<?php }; ?> 
                </ul>
				
                </div>
            </div>
        </nav>
    
        
    </header>


    <style type = "text/css">


body{
			background-color: #F5DEB3;
            background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url("cover.jpg");
			background-attachment: fixed;
            background-repeat: repeat;
            background-position: center;
            
		}


h2{
    border: 5px solid BurlyWood;
    font-family: Arial, Sans-serif;
    color: 	BurlyWood;
    text-shadow: 2px 2px 4px #000000;
    background-color: rgba(255,248,220, 0.85);
   
    width: 400px;
    height: auto;
    
    margin-top: 50px;
    margin-bottom: 0;
    margin-left: auto;
    margin-right: auto;
    padding: 4pt;
    position: static;
    
}




    
    form{
        margin: 20px auto;
        padding: 20px;
        width: 600px;
        border: 5px solid BurlyWood;
        background-color: #FFF8DC;
        background: rgba(255,248,220, 0.95);
    }



.form form-group{
    
    text-align: left;
    margin-left: 25px;
    margin-right: 50px;
    width: 500px;
}




 </style>
    