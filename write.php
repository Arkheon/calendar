<?php
 
$file= fopen( "events.xml", "w" );
ftruncate($file,0);
fwrite($file, '<?xml version="1.0" encoding="UTF-8"?>');
fwrite($file,"<monthly>");

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

for( $i = 1; $i <= 365; $i++ ) 
{ 
if ( date("l", mktime(0, 0, 0, 1, $i, $year)) == 'Thursday')
	
fwrite($file,"<event><id>".++$id."</id><name>Relances</name><startdate>".date("Y-m-d", mktime(0, 0, 0, 1, $i, $year)). "</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#2ecc71</color></event>"); 

}
 
 for( $j = 1; $j <= 365; $j++ ) { 
   if (date("l", mktime(0, 0, 0, 1, $j, $year)) == 'Monday')
fwrite($file,"<event><id>".++$id."</id><name>Suivi de paiement</name><startdate>".date("Y-m-d", mktime(0, 0, 0, 1, $j, $year)). "</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#2ecc71</color></event>");  
 }
 
  for( $k = 1; $k <= 12; $k++ ) { 
 if ($k < 10)   
 {   
fwrite($file,"<event><id>".++$id."</id><name>Reception fonds</name><startdate>".$year."-0".$k."-20</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#e67e22</color></event>");  }

 else {
fwrite($file,"<event><id>".++$id."</id><name>Reception fonds</name><startdate>".$year."-".$k."-20</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#e67e22</color></event>");  }	 

 }
 
   for( $l = 1; $l <= 12; $l++ ) { 
 if ($l < 10)   
 {   
fwrite($file,"<event><id>".++$id."</id><name>Reception fonds</name><startdate>".$year."-0".$l."-06</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#e67e22</color></event>");  }

 else {
fwrite($file,"<event><id>".++$id."</id><name>Reception fonds</name><startdate>".$year."-".$l."-06</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#e67e22</color></event>");  }	 

 }
 
 for( $m = 1; $m <= 12; $m++ ) { 
 if ($m < 10)   
 {   
$d = new DateTime( $year."-0".$m );{
fwrite($file,"<event><id>".++$id."</id><name>FDM</name><startdate>".$d->format( 'Y-m-t' )."</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#e67e22</color></event>");  }
}
 else {
$d = new DateTime( $year."-".$m);
fwrite($file,"<event><id>".++$id."</id><name>FDM</name><startdate>".$d->format( 'Y-m-t' )."</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#e67e22</color></event>");  }
	 }

 for( $n = 1; $n <= 12; $n++ ) { 
 if ($n < 10)   
 {   
fwrite($file,"<event><id>".++$id."</id><name>Controles FDM</name><startdate>".$year."-0".$n."-25</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#3498db</color></event>");  }

 else {
fwrite($file,"<event><id>".++$id."</id><name>Controles FDM</name><startdate>".$year."-".$n."-25</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#3498db</color></event>");  }	 
 }	 
 
  for( $n = 1; $n <= 12; $n++ ) { 
 if ($n < 10)   
 {   
fwrite($file,"<event><id>".++$id."</id><name>Reboot SQL</name><startdate>".$year."-0".$n."-22</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#9b59b6</color></event>");  }

 else {
fwrite($file,"<event><id>".++$id."</id><name>Reboot SQL</name><startdate>".$year."-".$n."-22</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#9b59b6</color></event>");  }	 
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
			
			fwrite($file,"<event><id>".++$id."</id><name>Arrerages</name><startdate>".$p2[2]."-". $p2[1]."-". $p2[0]."</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#f1c40f</color></event>"); 
		}
		
		if ($p1[2] == $year AND $p2[2] == $year AND $p1[0] == "06")
		{
			/*echo $p1[2]."/". $p1[1]."/". $p1[0]."</br>";*/
			
			fwrite($file,"<event><id>".++$id."</id><name>Prelevement 6</name><startdate>".$p2[2]."-". $p2[1]."-". $p2[0]."</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#f1c40f</color></event>"); 
		}
		
		if ($p1[2] == $year AND $p2[2] == $year AND $p1[0] == "20")
		{
			/*echo $p1[2]."/". $p1[1]."/". $p1[0]."</br>";*/
			
			fwrite($file,"<event><id>".++$id."</id><name>Prelevement 20</name><startdate>".$p2[2]."-". $p2[1]."-". $p2[0]."</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#f1c40f</color></event>"); 
		}
		
		
		
    endforeach;
 
$ferie=getHolidays ($year);
foreach ($ferie as $jferie) {
	fwrite($file,"<event><id>".++$id."</id><name>Ferie</name><startdate>".$jferie."</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#354b60</color></event>"); 
}
 
fwrite($file,"</monthly>");
fclose($file);

?>