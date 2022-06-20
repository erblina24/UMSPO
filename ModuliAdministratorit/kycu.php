<?php
/* Kontrollon nese logini mund te kryhet me sukses, nese 
username dhe passwordi qe ka shkruar useri ne Index.php 
gjindet ne db ne MySQL */
	session_start();
	include("konfigurimi.php"); //Mundeson lidhjen me databazen e krijuar
	$gabim = ""; //Variabel për ruajtjen e gabimeve tona.
	if(isset($_POST["submit"]))
	{
		if(empty($_POST["Emri_Perdoruesit"]) || empty($_POST["Fjalekalimi"]))
		{
			$gabim = "Kerkohet mbushja e te gjitha fushave!.";
		}else
		{
			// Definimi i $username dhe $password
			$Emri_Perdoruesit=$_POST['Emri_Perdoruesit'];
			$Fjalekalimi=$_POST['Fjalekalimi'];
			//Kontrollo username dhe password prej database
			$sql="SELECT ID_Perdoruesi FROM umspo_perdoruesit WHERE 
			Emri_Perdoruesit='$Emri_Perdoruesit'
			and Fjalekalimi='$Fjalekalimi'";
			$rezultati=mysqli_query($lidh,$sql);
			$rresht=mysqli_fetch_array($rezultati,MYSQLI_ASSOC);
			/*Nese username dhe password ekzistojne ne databaze, atehere 
			krijo nje sesion. Perndryshe shfaq nje (echo) gabim.*/
			if(mysqli_num_rows($rezultati) == 1)
			{
				$_SESSION['Emri_Perdoruesit'] = $Emri_Perdoruesit; // Fillimi i sesionit
				header("location: faqja_administratorit.php"); // hapet faqja pas logimit me sukses
			}else
			{
				$gabim = "Emri Perdoruesit ose Fjalekalimi gabim.";
			}
		}
	}
?>