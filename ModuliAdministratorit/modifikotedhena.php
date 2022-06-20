<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("kontrollo.php");	
?>
<?php
// including the database connection Dosja
include_once("konfigurimi.php");

if(isset($_POST['modifikotedhena']))
{	
	$ID_TeDhenat = $_POST['ID_TeDhenat'];
	
	$titulli=$_POST['Titulli'];
	$pershkrimi=$_POST['Pershkrimi'];
	$dosja=$_POST['Dosja'];	
	$pamjaFaqes=$_POST['PamjaFaqes'];	
	// checking empty fields
	if(empty($titulli) || empty($pershkrimi) || empty($dosja) || empty($pamjaFaqes)){	
			
		if(empty($titulli)) {
			echo "<font color='red'>Titulli field is empty.</font><br/>";
		}
		
		if(empty($Pershkrimi)) {
			echo "<font color='red'>Pershkrimi field is empty.</font><br/>";
		}
		
		if(empty($Dosja)) {
			echo "<font color='red'>Dosja field is empty.</font><br/>";
		}	
	if(empty($pamjaFaqes)) {
			echo "<font color='red'>PamjaFaqes field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$rezultati = mysqli_query($lidh,"UPDATE umspo_tedhenat SET Titulli='$titulli',Pershkrimi='$pershkrimi',Dosja='$dosja',PamjaFaqes='$pamjaFaqes' WHERE ID_TeDhenat=$ID_TeDhenat");
		
		//redirectig to the display pProgrami. In our case, it is admin.php
		header("Location: modifiko_tedhena.php");
	}
}
?>
<?php
//getting ID_Dep from url
$ID_TeDhenat = $_GET['ID_TeDhenat'];

//selecting data associated with this particular ID_Dep
$rezultati = mysqli_query($lidh,"SELECT * FROM umspo_tedhenat WHERE ID_TeDhenat=$ID_TeDhenat");

while($res = mysqli_fetch_array($rezultati))
{
	$titulli = $res['Titulli'];
	$pershkrimi = $res['Pershkrimi'];
	$dosja = $res['Dosja'];
		$pamjaFaqes = $res['PamjaFaqes'];
}
?>

<!DOCTYPE HTML>
<!--
	Telephasic by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Moduli Administratorit</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="homepage is-preload">
		<div id="page-wrapper">

			<?php
            $rezultati = mysqli_query($lidh, "SELECT * FROM umspo_tedhenat WHERE PamjaFaqes='KokaFaqes'");
            while ($row = mysqli_fetch_assoc($rezultati)) {
                     extract($row);
                    if($rezultati==null) 
                       mysqli_free_rezultati($rezultati);
               ?><div id="header-wrapper" style="background-image: url('<?php echo $Dosja; ?>'); background-size: 100%;"> 
	        <?php } ?>
				
					<div id="header" class="container">

						<!-- Logo -->
							

						<!-- Nav -->
						<?php include_once("meny.php"); ?>

					</div>

					<!-- Hero -->
						<?php include_once("KokaFaqes.php"); ?>

				</div>


			<!-- Features 1 -->
				<div class="wrapper">
					<div class="container">
						<div class="row">
							<section>
									<p>Përshëndetje, <em><?php  echo $kyc_perd;?>!</em></p>
								<form form="form1" method="post" action="modifikotedhena.php"> 
									<table class="default">
										<tr>
								            <h3>Modifiko të dhënat</h3></tr>

										<tr>
											<td>Titulli</td>
											<td><input type="text" name="Titulli" value='<?php echo $titulli;?>'   required /></td></tr>
											
											<tr><td>Pershkrimi</td>
											<td><textarea name="Pershkrimi"  rows="10" cols="30"><?php echo $pershkrimi;?></textarea></td></tr>
											
											<tr><td>Emri i Dosjes</td>
											<td><input type="text" name="Dosja" value='<?php echo $dosja;?>'   required /></td></tr>
											
											<tr><td>Pamja e faqes</td>
											<td><input type="text" name="PamjaFaqes" value='<?php echo $pamjaFaqes;?>'   required /></td></tr>
											<tr><td><input type="hidden" name="ID_TeDhenat" value='<?php echo $_GET['ID_TeDhenat'];?>' /></td>
											<td><input type="submit" name="modifikotedhena" value="Modifiko"></td>
										</tr>
									</table>
								</form>
							</section>
						</div>
					</div>
				</div>

			<!-- Promo -->
				

			<!-- Features 2 -->
				

			<!-- Footer -->
				<?php include_once("FundiFaqes.php"); ?>

		 <!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
		</div>
	</body>
</html>