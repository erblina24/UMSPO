<?php
//including the database connection file
include("konfigurimi.php");

//getting uid of the data from url
$ID_Pacienti = $_GET['ID_Pacienti'];

//deleting the row from table
$rezultati = mysqli_query($lidh,"DELETE FROM umspo_pacientet WHERE ID_Pacienti=$ID_Pacienti");

//redirecting to the display page (index.php in our case)
header("Location:ballina.php");
?>

