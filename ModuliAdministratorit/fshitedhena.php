<?php
//including the database connection file
include("konfigurimi.php");

//getting uid of the data from url
$ID_TeDhenat = $_GET['ID_TeDhenat'];

//deleting the row from table
$rezultati = mysqli_query($lidh,"DELETE FROM umspo_tedhenat WHERE ID_TeDhenat=$ID_TeDhenat");

//redirecting to the display page (index.php in our case)
header("Location:ballina.php");
?>

