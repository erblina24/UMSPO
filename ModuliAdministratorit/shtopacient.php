<!DOCTYPE HTML>
<!--
	Binary by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Moduli i Administratorit</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>
<?php
include_once("konfigurimi.php");

if(isset($_POST['shtopacient'])) {	
	$EmriP = $_POST['EmriP'];
	$Mbiemri = $_POST['Mbiemri'];
    $Emaili = $_POST['Emaili'];
    $ID_Seanca = $_POST['ID_Seanca'];
	$ID_Psikologu = $_POST['ID_Psikologu'];
    
	if(empty($EmriP) || empty($Mbiemri) || empty($Emaili)) {
				
		if(empty($EmriP)) {
			echo "<font color='red'>Nuk keni shkruar emrin.</font><br/>";
		}
		
		if(empty($Mbiemri)) {
			echo "<font color='red'>Nuk keni shkruar mbiemrin.</font><br/>";
		}
		
		if(empty($Emaili)) {
			echo "<font color='red'>Nuk keni shkruar emailin.</font><br/>";
        }
       echo "<br/><a href='javascript:self.history.back();'>Kthehu</a>";
	} else { 
		$result = mysqli_query($lidh, "INSERT INTO umspo_pacientet (EmriP, Mbiemri, Emaili , ID_Seanca , ID_Psikologu) VALUES('$EmriP','$Mbiemri','$Emaili','$ID_Seanca' ,'$ID_Psikologu')");
		
			echo "<script>
         setTimeout(function(){
            window.location.href = 'ballina.php';
         }, 5000);
      </script>";
		 echo"<p><b>   E dhena eshte duke u regjistruar ne uebaplikacion. Ju lutem pritni 5 sekonda. <b></p>";
	}
}
?>
</body>
</html>