<?php
        ini_set('display_errors', 1);
  
		include("init.php");
  $response = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             
            $name     = $_FILES['file']['name'];
            $tmpName  = $_FILES['file']['tmp_name'];
            $error    = $_FILES['file']['error'];
            $size     = $_FILES['file']['size'];
            $ext      = strtolower(pathinfo($name, PATHINFO_EXTENSION));
           
            switch ($error) {
                case UPLOAD_ERR_OK:
                    $valid = true;
                    if ( !in_array($ext, array('jpg','jpeg','png','gif')) ) {
                        $valid = false;
                        $response = 'Losa ekstenzija';
                    }
                    if ( $size/1024/1024 > 2 ) {
                        $valid = false;
                        $response = 'Preveliki fajl.';
                    }
                    if ($valid) {
                        $targetPath =  dirname( __FILE__ ) . DIRECTORY_SEPARATOR. 'slike' . DIRECTORY_SEPARATOR. $name;
                        move_uploaded_file($tmpName,$targetPath);
						$data = Array (
							"naziv" => trim($_POST['naziv']), 
							"cena" => trim($_POST['cena']), 
							"slika" => $name
							);
							$db->insert('event', $data);
                        header( 'Location: events.php' ) ;
                        exit;
                    }
                    break;
               
                default:
                    $response = 'Unknown error';
                break;
            }
 
            echo $response;
        }
        ?>