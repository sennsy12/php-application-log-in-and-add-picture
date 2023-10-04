<?php  /* sjekk */
/*
/*  Programmet inneholder en funksjon for å sjekke om brukernavn og passord er korrekt
*/

function sjekkBrukernavnPassord($brukernavn,$passord)
{
    
    
  
    include("connect.php");  
    
    $lovligBruker=true;

    $sqlSetning="SELECT * FROM bruker WHERE brukernavn='$brukernavn';";
    $sqlResultat=mysqli_query($db,$sqlSetning);  /* SQL-setning sendt til database-serveren */
  
    if (!$sqlResultat)
    {
      $lovligBruker=false;
    }
    else
    {
      $rad=mysqli_fetch_array($sqlResultat);
      $lagretPassord=$rad["passord"];
  
         if($passord!=$lagretPassord)
         {
           $lovligBruker=false;
         }
    }
    
    return $lovligBruker;
  }

    ?>


    