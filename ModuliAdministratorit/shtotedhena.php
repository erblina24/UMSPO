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
//including the database connection Dosja
include_once("konfigurimi.php");

if(isset($_POST['shtotedhena'])) {	
	$Titulli = $_POST['Titulli'];
	$Pershkrimi = $_POST['Pershkrimi'];
$Dosja = $_POST['Dosja'];

 		$PamjaFaqes = $_POST['PamjaFaqes'];
	

	
	
	// checking empty fields
	if(empty($Titulli) || empty($Pershkrimi)|| empty($Dosja) || empty($PamjaFaqes)) {
				
		if(empty($Titulli)) {
			echo "<font color='red'>Fusha Titulli eshte e zbrazet.</font><br/>";
		}
		
		if(empty($Pershkrimi)) {
			echo "<font color='red'>Fusha Pershkrimi eshte e zbrazet..</font><br/>";
		}
			if(empty($Dosja)) {
			echo "<font color='red'>Fusha Dosja eshte e zbrazet.</font><br/>";
		}
		if(empty($PamjaFaqes)) {
			echo "<font color='red'>Fusha Pamja Faqes eshte e zbrazet.</font><br/>";
		}
		
		//link to the previous pMbiTitulli
		echo "<br/><a href='javascript:self.history.back();'>Kthehu</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$rezultati = mysqli_query($lidh, "INSERT INTO umspo_tedhenat(Titulli,Pershkrimi, Dosja, PamjaFaqes) VALUES('$Titulli', '$Pershkrimi', '$Dosja', '$PamjaFaqes')");
				//display success message
			echo "<script>
         setTimeout(function(){
            window.location.href = 'ballina.php';
         }, 5000);
      </script>";
		 echo"<p><b>   E dhena eshte duke u regjistruar ne sistem. Ju lutem pritni 5 sekonda. <b></p>";
		 
		//echo "<font color='green'>Data added successfully.";
		//echo "<br/><a href='ballina.php'>View rezultati</a>";
	}
}
?>

</body>
</html>
