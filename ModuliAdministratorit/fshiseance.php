<?php
//including the database connection file
include("konfigurimi.php");

//getting uid of the data from url
$ID_Seanca = $_GET['ID_Seanca'];

//deleting the row from table
$rezultati = mysqli_query($lidh,"DELETE FROM umspo_seancat WHERE ID_Seanca=$ID_Seanca");

//redirecting to the display page (index.php in our case)
header("Location:ballina.php");
?>

