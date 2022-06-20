<html>

	<head>
		<title>Moduli Administratorit</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="assets/css/main.css" />
		
		
		 
	</head

<body>
<?php
//including the database lidhection file
include_once("kontrollo.php");

if(isset($_POST['shtoperdorues'])) {	
	$Emri_Perdoruesit = $_POST['Emri_Perdoruesit'];
	$Fjalekalimi = $_POST['Fjalekalimi'];
	$Emaili = $_POST['Emaili'];
	// checking empty fields
	if(empty($Emri_Perdoruesit) || empty($Fjalekalimi) || empty($Emaili)) {
				
		if(empty($Emri_Perdoruesit)) {
			echo "<font color='red'>Fusha Emri eshte e zbrazet.</font><br/>";
		}
		
		if(empty($Fjalekalimi)) {
			echo "<font color='red'>Fusha Fjalekalimi eshte e zbrazet.</font><br/>";
		}
		if(empty($Emaili)) {
			echo "<font color='red'>Fusha Emaili eshte e zbrazet.</font><br/>";
		}
		
		
		//link to the previous pMbiemri
		echo "<br/><a href='javascript:self.history.back();'>Kthehu</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($lidh, "INSERT INTO umspo_perdoruesit(Emri_Perdoruesit,Fjalekalimi,Emaili) VALUES('$Emri_Perdoruesit','$Fjalekalimi','$Emaili')");
		
		//display success message
			echo "<script>
         setTimeout(function(){
            window.location.href = 'perdoruesit.php';
         }, 5000);
      </script>";
		 echo"<p><b>   E dhena eshte duke u regjistruar ne sistem. Ju lutem pritni 5 sekonda. <b></p>";
		 
		//echo "<font color='green'>Data added successfully.";
		//echo "<br/><a href='ballina.php'>View Result</a>";
	}
}
?>

</body>
</html>