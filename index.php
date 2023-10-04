<?php  
session_start();
@$innloggetBruker=$_SESSION["brukernavn"];
 if (!$innloggetBruker)  /* bruker er ikke innlogget */
 {
     print("<meta http-equiv='refresh' content='0;url=innlogging.php'>");
  }
?> 

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
 
    <?php
    print("<h3>Velkommen til startsiden (du er logget inn som $innloggetBruker) </h3>");
    print("I menyen til venstre finner du ulike valg som kan utf&oslash;res ved bruk av denne applikasjonen");
    ?>

    </article> 
    <br class="clearfloat" />  <!-- avslutt flytende elementer -->
    
    <footer>
    <h5>Alan Kamil Czubak</h5>
    </footer>
    
  </div>  <!-- slutt p� boks -->
</body>
</html>  