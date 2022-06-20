<?php
//including the database connection file
include("konfigurimi.php");

//getting uid of the data from url
$ID_Perdoruesi = $_GET['ID_Perdoruesi'];

//deleting the row from table
$rezultati = mysqli_query($lidh,"DELETE FROM umspo_perdoruesit WHERE ID_Perdoruesi=$ID_Perdoruesi");

//redirecting to the display page (index.php in our case)
header("Location:perdoruesit.php");
?>

