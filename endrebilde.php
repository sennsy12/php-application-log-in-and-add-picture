<!DOCTYPE html>
<head>
  <title>Innlevering 2</title>
  <link rel="stylesheet" type="text/css" href="style.css" media="screen" title="Stilark" /> 
</head>

<body class="gbStil">

  <div id="boks">
  
    <header>
      <h1>Innlevering 2</h1>
    </header>
    
    <nav>
      <h3>Meny</h3>
      <p><a href="index.php">Hjem </a></p>        
      </a></p>
      <p>Bilde</p>
      <p><a href="registrerbilde.php">Registrer bilde</a></p>
      <p><a href="visallebilder.php">Vis alle bilder</a></p>
      <p><a href="endrebilde.php">Endre bilde</a></p>
      <p><a href="slettbilde.php">Slett bilde </a></p>
      <p> Annet </p>
      <p> <a href="utlogging.php"> Logg ut </a> </p>
    </nav>
    
    <article>
    <?php /* endre-fag */
/*
/* Programmet lager et skjema for kunne endre et fag
/* Programmet endrer det valgte faget
*/
?>
<script src="ajaxfinnbilde.js"> </script>
<h3>Endre bilde</h3>
<form method="post" action="" id="endrebildeSkjema" name="endrebildeSkjema">
 bildenr
 <select name="bildenr" id="bildenr" onChange="finn(this.value)">
 <?php print("<option value=''>velg bilde </option>");
 include("dynamiske-funksjoner.php"); listeboksbilde(); ?>
 </select> <br/>
 <input type="submit" value="Endre bilde" name="endreBildeKnapp" id="endreBildeKnapp">
 <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>

<?php
 if (isset($_POST ["endreBildeKnapp"]))
 {
  include("connect.php");  /* tilkobling til database-server og valg av database utført */ 
  $bildenr=$_POST ["bildenr"];  

  $sqlSetning="SELECT * FROM bilde WHERE bildenr ='$bildenr';"; 
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen"); 

  $rad=mysqli_fetch_array($sqlResultat);  /* ny rad hentet fra spørringsresultatet */ 
 $bildenr=$rad ["bildenr"];
 $filnavn=$rad ["filnavn"];
 $beskrivelse=$rad ["beskrivelse"];

 print("<br />"); 
 print ("<form method='post' action='' id='endreBildeSkjema' name='endreBildeSkjema'>"); 
 print ("bildenr <input type='text' value='$bildenr' name='bildenr' id='bildenr' readonly /> <br />"); 
 print ("filnavn <input type='text' value='$filnavn' name='filnavn' id='filnavn' readonly /> <br />"); 
 print ("nyttfilnavn <input type='text' value='$filnavn' name='nyttfilnavn' id='nyttfilnavn' required />  
   <br />");  
 print ("beskrivelse <input type='text' value='$beskrivelse' name='beskrivelse' id='beskrivelse' required />  
   <br />"); 
 print ("<input type='submit' value='Endre' name='endreKnapp' id='endreKnapp'>"); 
 print ("</form>"); 
} 

if (isset($_POST ["endreKnapp"]))  
{

 $bildenr=$_POST ["bildenr"];
 $filnavn=$_POST ["filnavn"];
 $nyttfilnavn=$_POST ["nyttfilnavn"];  
 $beskrivelse=$_POST ["beskrivelse"];

 if (!$bildenr || !$filnavn || !$beskrivelse)
 {
 print ("Alle felt m&aring; fylles ut");
 }
 else
 {
 include("connect.php");
  /* tilkobling til database-serveren utført og valg av database foretatt */

  $gammeltnavn="bilder1/".$filnavn;
  $nyttnavn="bilder1/".$nyttfilnavn;
  rename ($gammeltnavn,$nyttnavn) or die;

  $sqlSetning="UPDATE bilde SET filnavn='$nyttfilnavn', beskrivelse='$beskrivelse' WHERE bildenr='$bildenr';";
  mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; endre data i databasen");	

print ("Bildet med bildenr $bildenr er n&aring; endret<br />"); 
} 
} 
 
?>
    </article> 
    <br class="clearfloat" />  <!-- avslutt flytende elementer -->
    
    <footer>
    <h5>Alan Kamil Czubak </h5>
    </footer>
    
  </div>  <!-- slutt p� boks -->
</body>
</html> 