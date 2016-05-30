


<?php 


/* balise exemple
<event>
		<id>5</id>
		<name>Here's an Event</name>
		<startdate>2016-3-10</startdate>
		<enddate>2016-3-12</enddate>
		<starttime>12:00</starttime>
		<endtime>2:00</endtime>
		<color>#ffb128</color>
		<url></url>
</event>*/

$year=date("Y");

date_default_timezone_set('Europe/Brussels');

// boucle  sur les jours de l'année
$id=5;
for( $i = 1; $i <= 365; $i++ ) 
{ 
if ( date("l", mktime(0, 0, 0, 1, $i, $year)) == 'Thursday')
	
echo "<event><id>".++$id."</id><name>Relances</name><startdate>".date("Y-m-d", mktime(0, 0, 0, 1, $i, $year)). "</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#2ecc71</color></event>";  

}

for( $j = 1; $j <= 365; $j++ ) { 
   if (date("l", mktime(0, 0, 0, 1, $j, $year)) == 'Monday')
	   
   /*echo date("Y-m-d", mktime(0, 0, 0, 1, $j, $year)) ." Suivi de paiement". "<br />"; */
   echo "<event><id>".++$id."</id><name>Suivi de paiement</name><startdate>".date("Y-m-d", mktime(0, 0, 0, 1, $j, $year)). "</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#2ecc71</color></event>";  
 }
 
 
 
 for( $k = 1; $k <= 12; $k++ ) { 
 if ($k < 10)   
 {   
 echo "<event><id>".++$id."</id><name>Reception fonds</name><startdate>".$year."-0".$k."-20</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#e67e22</color></event>";  }

 else {
echo "<event><id>".++$id."</id><name>Reception fonds</name><startdate>".$year."-".$k."-20</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#e67e22</color></event>";  }	 

 }

  for( $l = 1; $l <= 12; $l++ ) { 
 if ($l < 10)   
 {   
 echo "<event><id>".++$id."</id><name>Reception fonds</name><startdate>".$year."-0".$l."-06</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#e67e22</color></event>";  }

 else {
echo "<event><id>".++$id."</id><name>Reception fonds</name><startdate>".$year."-".$l."-06</startdate><enddate></enddate><starttime></starttime><endtime></endtime><color>#e67e22</color></event>";  }	 

 }
 
 

 
 
 
   /*
for( $m = 1; $m <= 12; $m++ ) { 
 if ($m < 10)   
 {   
$d = new DateTime( $year."-0".$m );
echo $d->format( 'Y-m-t' )."Fin de mois"."<br />" ; 
}
 else {
$d = new DateTime( $year."-".$m);
echo $d->format( 'Y-m-t' )."Fin de mois"."<br />" ; 
	 }
 }

 */



?> 