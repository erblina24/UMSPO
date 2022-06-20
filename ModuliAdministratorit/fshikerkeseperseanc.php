<?php
//including the database lidhection file
include("konfigurimi.php");

//getting uid of the data from url
$ID_KerkesaS = $_GET['ID_KerkesaS'];

//deleting the row from table
$rezultati = mysqli_query($lidh,"DELETE FROM umspo_kerkesatperseanca WHERE ID_KerkesaS=$ID_KerkesaS");

//redirecting to the display page (index.php in our case)
header("Location:pranokerkesatperseanca.php");
?>

