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

if(isset($_POST['shtopsikolog'])) {	
	$Emri = $_POST['Emri'];
	$Mbiemri = $_POST['Mbiemri'];
	$Emaili = $_POST['Emaili'];
	$PershkrimiP = $_POST['PershkrimiP'];
	$ID_Seanca = $_POST['ID_Seanca'];
	
	
	$foto =addslashes (file_get_contents($_FILES['userfile']['tmp_name']));
	$name = $_FILES['userfile']['name'];
	
	 $maxsize = 10000000; //set to approx 10 MB
	

	
	
	// checking empty fields
	if(empty($Emri) || empty($Mbiemri)|| empty($Emaili) || empty($ID_Seanca)) {
				
		if(empty($Emri)) {
			echo "<font color='red'>Fusha Emri eshte e zbrazet.</font><br/>";
		}
		
		if(empty($Mbiemri)) {
			echo "<font color='red'>Fusha Mbiemri eshte e zbrazet.</font><br/>";
		}
		
		if(empty($Emaili)) {
			echo "<font color='red'>Fusha Emaili eshte e zbrazet.</font><br/>";
		}
		if(empty($ID_Seanca)) {
			echo "<font color='red'>Fusha Zgjedh Seancen eshte e zbrazet.</font><br/>";
		}
		
		//link to the previous pMbiemri
		echo "<br/><a href='javascript:self.history.back();'>Kthehu</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($lidh, "INSERT INTO umspo_psikologet(Emri,Mbiemri,Emaili, PershkrimiP, ID_Seanca, Foto, EmriFotos) VALUES('$Emri','$Mbiemri','$Emaili','$PershkrimiP', '$ID_Seanca', '$foto', '$name')");
		
		//display success message
			echo "<script>
         setTimeout(function(){
            window.location.href = 'ballina.php';
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