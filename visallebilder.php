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
    <body>



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

    <?php  

  include("connect.php");

  $sqlSetning="SELECT * FROM bilde ;";  
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente fra db");
  $antallRader=mysqli_num_rows($sqlResultat);

  print ("<h3>Registrerte bilder</h3>");
  print ("<table border=1>");  
  print ("<tr><th align=left>bildenr</th>  <th align=left>filnavn</th>  <th align=left>beskrivelse</th> </tr>"); 


  for ($r=1;$r<=$antallRader;$r++)
    {
      $rad=mysqli_fetch_array($sqlResultat);
      $bildenr=$rad ["bildenr"];
      $filnavn=$rad ["filnavn"];
      $beskrivelse=$rad ["beskrivelse"];

      print ("<tr> <td> $bildenr </td> <td> <a href='bilder1/$filnavn' target='_blank'>$filnavn  </a> </td>  <td> $beskrivelse </td> </tr>");
    }
  print ("</table>");
?>

    </article> 
    <br class="clearfloat" />  <!-- avslutt flytende elementer -->
    
    <footer>
    <h5>Alan Kamil Czubak </h5>
    </footer>
    
  </div>  <!-- slutt p� boks -->
</body>
</html> 