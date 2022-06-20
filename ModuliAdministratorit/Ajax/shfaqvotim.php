<html>
<head>
<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="assets/css/main.css" />

		
<?php
include('../konfigurimi.php');
session_start();
$user_check=$_SESSION['Emri_Perdoruesit'];
$ses_sql = mysqli_query($lidh,"SELECT 	ID_Perdoruesi, Emri_Perdoruesit FROM umspo_perdoruesit WHERE Emri_Perdoruesit='$user_check' ");
$rresht=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_user=$rresht['Emri_Perdoruesit'];
if(!isset($user_check))
{ header("Location: index.php");} 

	
    $_SESSION["ID_Pjesetari"] =  $rresht['ID_Perdoruesi'];
    
	require("kontrollusidb.php");
	$kontrollusidb = new Kontrolluesidb();
	
	$pyetje = "SELECT DISTINCT ID_Pyetja from umspo_votimi WHERE ID_Pjesetari = " . $_SESSION["ID_Pjesetari"]; 
	$rezultati = $kontrollusidb->merrID($pyetje);
	
	$condition = "";
	if(!empty($rezultati)) {
	    $condition = " WHERE ID NOT IN (" . implode(",", $rezultati) . ")";
    }
    
    $pyetje = "SELECT * FROM `umspo_pyetjet` " . $condition . " limit 1";
    $pyetjet = $kontrollusidb->ekzekutopyetje($pyetje);
    
    if(!empty($pyetjet)) {
?>      
		<div class="question"><?php echo $pyetjet[0]["Pyetja"]; ?><input type="hidden" name="pyetje" id="pyetje" value="<?php echo $pyetjet[0]["ID"]; ?>" ></div>      
<?php 
        $pyetje = "SELECT * FROM umspo_pergjigjjet WHERE ID_Pyetja = " . $pyetjet[0]["ID"];
        $pergjigjet = $kontrollusidb->ekzekutopyetje($pyetje);
        if(!empty($pergjigjet)) {
            foreach($pergjigjet as $k=>$v) {
                ?>
			<div class="question"><input type="radio" name="pergj" class="radio-input" value="<?php echo $pergjigjet[$k]["ID"]; ?>" /><?php echo $pergjigjet[$k]["Pergjigjja"]; ?></div>      
<?php 
            }
        }
?>
		<div class="poll-bottom">
			<button id="btnSubmit" onClick="addPoll()">Dergo</button>
		</div>
<?php        
    } else {
?>

<div class="error">Votimi perfundoi me sukses!</div>


<?php 
    }
?>