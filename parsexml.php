<?php
date_default_timezone_set('Europe/Brussels');
$year=date("Y");

$mesdates = simplexml_load_file('Export.xml');
/*echo $mesdates->MaTABLE[1]->Date_Limite;*/

foreach ($mesdates as $dateinfo):
        $dateech=$dateinfo->DatEch;
		$datelim=$dateinfo->Date_Limite;
		
		/*echo "date echeance du " .$dateech." le traitement aura lieu le ".$datelim."</br>";*/
		
		$p1 = explode("/",$dateech);
		$p2 = explode("/",$datelim);
		
		
			if ($p1[2] == $year AND $p2[2] == $year AND $p1[0] == "01")
		{
			/*echo $p1[2]."/". $p1[1]."/". $p1[0]."</br>";*/
			
			echo "Arrerages</br>".$p2[2]."/". $p2[1]."/". $p2[0]."</br>";
		}
		
		if ($p1[2] == $year AND $p2[2] == $year AND $p1[0] == "06")
		{
			/*echo $p1[2]."/". $p1[1]."/". $p1[0]."</br>";*/
			
			echo "PLVT au 06</br>".$p2[2]."/". $p2[1]."/". $p2[0]."</br>";
		}
		
		if ($p1[2] == $year AND $p2[2] == $year AND $p1[0] == "20")
		{
			/*echo $p1[2]."/". $p1[1]."/". $p1[0]."</br>";*/
			
			echo "PLVT au 20</br>".$p2[2]."/". $p2[1]."/". $p2[0]."</br>";
		}
		
		
		
    endforeach;
	
?>