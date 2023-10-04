<?php /* db-tilkobling */

/* Programmet foretar tilkobling til database-server og valg av database */
$host="localhost";
$user="247053";
$password="ZwCAw0Fb";
$database="247053";

$db=mysqli_connect($host,$user,$password,$database) or die ("ikke kontakt med db-server");

?>