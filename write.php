<?php
 
$file= fopen( "events.xml", "r+" );
fwrite($file, '<?xml version="1.0" encoding="UTF-8"?>');
fwrite($file,"<monthly>");

date_default_timezone_set('Europe/Brussels');
$year=date("Y");
// boucle  sur les jours de l'ann�e
$id=0;
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
 
fwrite($file,"</monthly>");
fclose($file);

?>