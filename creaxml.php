<?php
 
$file= fopen( "events_lille.xml", "w" );
ftruncate($file,0);
fwrite($file, '<?xml version="1.0" encoding="UTF-8"?>');
fwrite($file,"\r\n");
fwrite($file,"<monthly> \r\n");

date_default_timezone_set('Europe/Brussels');
$year=date("Y");
$id=0;

function getHolidays($year = null)
{
  if ($year === null)
  {
    $year = intval(date('Y'));
  }
 
  $easterDate  = easter_date($year);
  $easterDay   = date('j', $easterDate);
  $easterMonth = date('n', $easterDate);
  $easterYear   = date('Y', $easterDate);
 
  $holidays = array(
    // Dates fixes
   date("Y-m-d", mktime(0, 0, 0, 1,  1,  $year)),  // 1er janvier
   date("Y-m-d", mktime(0, 0, 0, 5,  1,  $year)),  // Fête du travail
   date("Y-m-d", mktime(0, 0, 0, 5,  8,  $year)),  // Victoire des alliés
   date("Y-m-d", mktime(0, 0, 0, 7,  14, $year)),  // Fête nationale
   date("Y-m-d", mktime(0, 0, 0, 8,  15, $year)),  // Assomption
   date("Y-m-d", mktime(0, 0, 0, 11, 1,  $year)),  // Toussaint
   date("Y-m-d", mktime(0, 0, 0, 11, 11, $year)),  // Armistice
   date("Y-m-d", mktime(0, 0, 0, 12, 25, $year)),  // Noel
 
    // Dates variables
   date("Y-m-d", mktime(0, 0, 0, $easterMonth, $easterDay - 2,  $easterYear)),
   date("Y-m-d", mktime(0, 0, 0, $easterMonth, $easterDay + 1,  $easterYear)),
   date("Y-m-d", mktime(0, 0, 0, $easterMonth, $easterDay + 39, $easterYear)),
   date("Y-m-d", mktime(0, 0, 0, $easterMonth, $easterDay + 50, $easterYear)),
  );
 
  sort($holidays);
 
  return $holidays;
   
}

$ferie=getHolidays ($year);
foreach ($ferie as $jferie) {
fwrite($file,"<event><id>".++$id."</id><name>Ferie</name><startdate>".$jferie."</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#354b60</color></event>\n"); 
}
	
 
    for ($compteur=1;$compteur < 13;$compteur++)
    {
		
	$mois2digit =  str_pad($compteur, 2, '0', STR_PAD_LEFT);
	
	$drevarr01 = new DateTime( $year.$mois2digit."01" );		//revalo du montant de l'arrerage
	$dlia02 = new DateTime( $year.$mois2digit."02" );			//LIA et touti quanti
	$drecfonds06 = new DateTime( $year.$mois2digit."06" );		//Reception fonds 6
	$drecfonds20 = new DateTime( $year.$mois2digit."20" );		//Reception fonds 20
	$drebsql22 = new DateTime( $year.$mois2digit."22" );		//Reboot SQL 22
	$dcontfdm25 = new DateTime( $year.$mois2digit."25" );		//Controles FDM 25
	
	//Cas particulier FDM calcul du dernier jour ouvré
	$dfdm = new DateTime( $year.$mois2digit."10");				
	$lastdateofthemonth = date($year.$mois2digit."t"); 
	$lastworkingday = date('l', strtotime($lastdateofthemonth)); 
	if($lastworkingday == "Saturday") { 
	$newdate = strtotime ('-1 day', strtotime($lastdateofthemonth));
	$lastworkingday = date ('Y-m-d', $newdate);
	fwrite($file,"<event><id>".++$id."</id><name>FDM </name><startdate>".$lastworkingday."</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#e67e22</color></event>\n");
	}
	elseif($lastworkingday == "Sunday") { 
	$newdate = strtotime ('-2 day', strtotime($lastdateofthemonth));
	$lastworkingday = date ( 'Y-m-d' , $newdate );
	fwrite($file, "<event><id>".++$id."</id><name>FDM </name><startdate>".$lastworkingday."</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#e67e22</color></event>\n");
	}
	else
	{
	fwrite($file, "<event><id>".++$id."</id><name>FDM </name><startdate>".$dfdm->format( 'Y-m-t' )."</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#e67e22</color></event>\n");
	}

	
	fwrite($file, "<event><id>".++$id."</id><name>Revalo ARR</name><startdate>".$drevarr01->format( 'Y-m-d' )."</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#16a085</color></event>\n");
	fwrite($file, "<event><id>".++$id."</id><name>LIA </name><startdate>".$dlia02->format( 'Y-m-d' )."</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#16a085</color></event>\n");
	fwrite($file, "<event><id>".++$id."</id><name>Reception fonds 6 </name><startdate>".$drecfonds06->format( 'Y-m-d' )."</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#e67e22</color></event>\n");
	fwrite($file,"<event><id>".++$id."</id><name>Reception fonds 20 </name><startdate>".$drecfonds20->format( 'Y-m-d' )."</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#e67e22</color></event>\n");
	fwrite($file, "<event><id>".++$id."</id><name>Reboot SQL </name><startdate>".$drebsql22->format( 'Y-m-d' )."</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#9b59b6</color></event>\n");
	fwrite($file, "<event><id>".++$id."</id><name>Controles FDM </name><startdate>".$dcontfdm25->format( 'Y-m-d' )."</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#3498db</color></event>\n");   
	
	
	}



	
	 /*IMPORT DATES PRLVTS ISSUE XML GESTASSA*/
 
 
 $mesdates = simplexml_load_file('Export.xml');
 
 foreach ($mesdates as $dateinfo):
        $dateech=$dateinfo->DatEch;
		$datelim=$dateinfo->Date_Limite;
 
		$p1 = explode("/",$dateech);
		$p2 = explode("/",$datelim);
 
 if ($p1[2] == $year AND $p2[2] == $year AND $p1[0] == "01")
		{
			/*echo $p1[2]."/". $p1[1]."/". $p1[0]."</br>";*/
			
			fwrite($file,"<event><id>".++$id."</id><name>Arrerages</name><startdate>".$p2[2]."-". $p2[1]."-". $p2[0]."</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#f1c40f</color></event>\n");  
		}
		
		if ($p1[2] == $year AND $p2[2] == $year AND $p1[0] == "06")
		{
			/*echo $p1[2]."/". $p1[1]."/". $p1[0]."</br>";*/
			
			fwrite($file,"<event><id>".++$id."</id><name>Prelevement 6</name><startdate>".$p2[2]."-". $p2[1]."-". $p2[0]."</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#f1c40f</color></event>\n");  
		}
		
		if ($p1[2] == $year AND $p2[2] == $year AND $p1[0] == "20")
		{
			/*echo $p1[2]."/". $p1[1]."/". $p1[0]."</br>";*/
			
			fwrite($file,"<event><id>".++$id."</id><name>Prelevement 20</name><startdate>".$p2[2]."-". $p2[1]."-". $p2[0]."</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#f1c40f</color></event>\n");  
		}
		
		
		
    endforeach;
 

for( $i = 1; $i <= 365; $i++ ) 
{ 
if ( date("l", mktime(0, 0, 0, 1, $i, $year)) == 'Thursday')
	
fwrite($file,"<event><id>".++$id."</id><name>Relances</name><startdate>".date("Y-m-d", mktime(0, 0, 0, 1, $i, $year)). "</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#2ecc71</color></event>\n");  

}
 
 for( $j = 1; $j <= 365; $j++ ) { 
   if (date("l", mktime(0, 0, 0, 1, $j, $year)) == 'Monday')
fwrite($file,"<event><id>".++$id."</id><name>Suivi de paiement</name><startdate>".date("Y-m-d", mktime(0, 0, 0, 1, $j, $year)). "</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#2ecc71</color></event>\n");   
 }
 
 
fwrite($file,"</monthly>");
fclose($file);


	?>