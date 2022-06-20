<?php
//including the database lidhection file
include("konfigurimi.php");

//getting uid of the data from url
$ID_Psikologu = $_GET['ID_Psikologu'];

//deleting the row from table
$rezultati = mysqli_query($lidh,"DELETE FROM umspo_psikologet WHERE ID_Psikologu=$ID_Psikologu");

//redirecting to the display page (index.php in our case)
header("Location:ballina.php");
?>

