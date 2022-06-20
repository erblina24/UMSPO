<html>

	<head>
		<title>Moduli Administratorit</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="assets/css/main.css" />
		
		
		 
	</head>

<body>
<?php
//including the database connection file
include_once("kontrollo.php");

if(isset($_POST['shtoseance'])) {	
	$Lloji_Seances = $_POST['Lloji_Seances'];
	$Kohezgjatja = $_POST['Kohezgjatja'];
	// checking empty fields
	if(empty($Lloji_Seances) || empty($Kohezgjatja)) {
				
		if(empty($Lloji_Seances)) {
			echo "<font color='red'>Fusha Lloji Seances eshte e zbrazet.</font><br/>";
		}
		
		if(empty($Kohezgjatja)) {
			echo "<font color='red'>Fusha Kohezgjatja eshte e zbrazet</font><br/>";
		}
		
		
		//link to the previous pMbiemri
		echo "<br/><a href='javascript:self.history.back();'>Kthehu</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$rezultati = mysqli_query($lidh, "INSERT INTO umspo_seancat(Lloji_Seances,Kohezgjatja) VALUES('$Lloji_Seances','$Kohezgjatja')");
		
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