<?php   /*  dynamiske funksjoner */


function listeboksBilde ()
{
 include("connect.php"); /* tilkobling til database-server og valg av database utført */

 $sqlSetning="SELECT * FROM bilde ORDER BY bildenr;";
 $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
 $antallRader=mysqli_num_rows($sqlResultat); /* antall rader i resultatet beregnet */
 for ($r=1;$r<=$antallRader;$r++)
 {
 $rad=mysqli_fetch_array($sqlResultat); /* ny rad hentet fra spørringsresultatet */
 $bildenr=$rad["bildenr"];
 print("<option value='$bildenr'>$bildenr  </option>");
 /* ny verdi i listeboksen laget */
 }
}

function listeboksBildenr() 
{ 
  include("connect.php");  /* tilkobling til database-server og valg av database utført */ 
       
  $sqlSetning="SELECT * FROM bilde ORDER BY bildenr;"; 
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");  
       
  $antallRader=mysqli_num_rows($sqlResultat);  /* antall rader i resultatet beregnet */ 
 
  for ($r=1;$r<=$antallRader;$r++) 
    { 
      $rad=mysqli_fetch_array($sqlResultat);  /* ny rad hentet fra spørringsresultatet */ 
      $bildenr=$rad["bildenr"]; 
      $filnavn=$rad["filnavn"]; 
 
      print("<option value='$bildenr'>$bildenr $filnavn</option>");  /* ny verdi i listeboksen laget */ 
    } 
} 
 
function listeboksbildenrfilnavn() 
{ 
  include("connect.php");  /* tilkobling til database-server og valg av database utført */ 
       
  $sqlSetning="SELECT * FROM bilde ORDER BY bildenr;"; 
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");  
       
  $antallRader=mysqli_num_rows($sqlResultat);  /* antall rader i resultatet beregnet */ 
 
  for ($r=1;$r<=$antallRader;$r++) 
    { 
      $rad=mysqli_fetch_array($sqlResultat);  /* ny rad hentet fra spørringsresultatet */ 
      $bildenr=$rad["bildenr"]; 
      $filnavn=$rad["filnavn"]; 
 
      print("<option value='$bildenr;$filnavn'>$bildenr $filnavn</option>");  /* ny verdi i listeboksen laget */ 
    } 
  } 

?>