<?php

require "init.php";
header("Content-type: application/json");

$array['cols'][] = array('label' => 'Event','type' => 'string');
$array['cols'][] = array('label' => 'Ukupno prodatih knjiga', 'type' => 'number');
 
$sql="SELECT e.naziv,SUM(n.kolicina) AS ukupno FROM event e join narudzbina n on e.eventID=n.eventID  GROUP BY e.eventID";
$podaci = $db->rawQuery($sql);
foreach($podaci as $pod):
 $array['rows'][] = array('c' => array( array('v'=>$pod["naziv"]),array('v'=>(double)$pod["ukupno"])) );

endforeach;


$niz_json = json_encode ($array);
print ($niz_json);

?>
