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
 

    <?php /* registrer-studium */
/*
/* Programmet lager et html-skjema for å registrere et studium
/* Programmet registrerer data (studiumkode og studiumnavn) i databasen
*/

?>
<h3>Registrer bilde </h3>
<form method="post" action="" enctype="multipart/form-data" id="registrerBildeSkjema" name="registrerBildeSkjema">
 bildenr     <input type="text" id="bildenr" name="bildenr" required /> <br/>
 beskrivelse <input type="text" id="beskrivelse" name="beskrivelse" required /> <br/>
 filnavn     <input type="file" id="fil" name="fil" size="60" /> <br/>
 
 <input type="submit" value="Registrer bilde" id="registrerBildeKnapp" name="registrerBildeKnapp" />
 <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>
<?php
 if (isset($_POST ["registrerBildeKnapp"]))
 {
 $bildenr=$_POST ["bildenr"];
 $beskrivelse=$_POST ["beskrivelse"];

 $filnavn=$_FILES ["fil"]["name"];  /* filnavn på opplastet fil */
 $filtype=$_FILES ["fil"]["type"];  /* filtype på opplastet fil */
 $filstorrelse=$_FILES ["fil"]["size"];  /* filstørrelse på opplastet fil */
 $tmpnavn=$_FILES ["fil"]["tmp_name"];    /* midlertidig navn på opplastet fil */
 $nyttnavn="bilder1/".$filnavn;  /* mappe-og filnavn på opplastet fil */

 if (!$bildenr  || !$filnavn || !$beskrivelse)
 {
 print ("Alle felt m&aring; fylles ut");
 }
 else if ($filtype != "image/gif" && $filtype !="image/jpeg" && $filtype != "image/png")
 {
   print ("Det er kun tillat &aring; laste opp bilder");
 }
 else if ($filstorrelse > 5000000) /* max 5MB */
{
  print ("Bildet er for stort til &aring; kunne lastes opp");
}
  else
  {
 include("connect.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
 $sqlSetning="SELECT * FROM bilde WHERE bildenr='$bildenr';";
 $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
 $antallRader=mysqli_num_rows($sqlResultat);

 if ($antallRader!=0) /* studiet er registrert fra før */
 {
 print ("Bildet er registrert fra f&oslashr");
 }
 else
 {
   move_uploaded_file($tmpnavn,$nyttnavn) or die ("ikke mulig &aring; laste opp fil");
   /* bilde lastet opp på server */

 $sqlSetning="INSERT INTO bilde (bildenr,filnavn,beskrivelse) VALUES('$bildenr', '$filnavn' , '$beskrivelse');";
 if (mysqli_query($db,$sqlSetning)) /*bilde registrert fra før */
 /* SQL-setning sendt til database-serveren */
 {
 print ("F&oslash;lgende bilde er n&aring; registrert: bildenr: $bildenr <br/>filnavn:$filnavn <br/> beskrivelse:$beskrivelse <br/>");
   }
  else {
    print ("ikke mulig &aring; registrere data i databasen");
    unlink($nyttnavn) or die ("ikke mulig &aring; slette bildet på serveren igjen");
  }
  }
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