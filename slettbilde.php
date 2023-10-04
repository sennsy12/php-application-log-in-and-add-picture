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
 
    <?php  /* slett-poststed */
/*
/*  Programmet lager et skjema for å velge et poststed som skal slettes  
/*  Programmet sletter det valgte poststedet
*/
?> 

<script src="funksjoner.js"> </script>

<h3>Slett bilde</h3>

<form method="post" action="" id="slettBilde" name="slettBilde" onSubmit="return bekreft()">
  bilde 
  <select name="bildenr" id="bildenr">
<?php print("<option value=''> velg bildenr </option>");
include("dynamiske-funksjoner.php"); listeboksbildenrfilnavn(); ?>
</select> <br>
  <input type="submit" value="Slett bilde" name="slettBildeKnapp" id="slettBildeKnapp" /> 
</form>

<?php
 if (isset($_POST ["slettBildeKnapp"]))
 {	
   $bildenr=$_POST ["bildenr"];

   $del=explode(";",$bildenr);
   $bildenr=$del[0];
   $filnavn=$del[1];  
   
   if(!$bildenr)
   {
     print("Det er ikke valgt noe bilde");
   }
   else
   {

   include("connect.php");

   $sqlsetning="DELETE FROM bilde WHERE bildenr='$bildenr';";
   mysqli_query($db,$sqlsetning) or die ("ikke mulig å slette data i db");

   print ("F&oslash;lgende klasse er n&aring; slettet: $bildenr <br />");
   }
 }
?>

    </article> 
    <br class="clearfloat" />  <!-- avslutt flytende elementer -->
    
    <footer>
    <h5>Alan Kamil Czubak</h5>
    </footer>
    
  </div>  <!-- slutt p� boks -->
</body>
</html> 