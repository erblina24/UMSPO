<?php
/* Kontrollon sesionin */
include('konfigurimi.php');
session_start();
$kon_perd=$_SESSION['Emri_Perdoruesit'];
$ses_sql = mysqli_query($lidh,"SELECT Emri_Perdoruesit FROM umspo_perdoruesit
 WHERE Emri_Perdoruesit='$kon_perd' ");
$rresht=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$kyc_perd=$rresht['Emri_Perdoruesit'];
if(!isset($kon_perd))
{
header("Location: index.php");
} ?>