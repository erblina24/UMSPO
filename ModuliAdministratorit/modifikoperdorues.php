<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("kontrollo.php");	
?>

<?php
// including the database connection file
include_once("konfigurimi.php");

if(isset($_POST['modifikoperdorues']))
{	
	$ID_Perdoruesi=$_POST['ID_Perdoruesi'];
	$Emri_Perdoruesit=$_POST['Emri_Perdoruesit'];
	$Fjalekalimi=$_POST['Fjalekalimi'];
	$Emaili=$_POST['Emaili'];	
	
	// checking empty fields
	if(empty($Emri_Perdoruesit) || empty($Fjalekalimi) || empty($Emaili)) {	
			
		if(empty($Emri_Perdoruesit)) {
			echo "<font color='red'>Fusha Emri Perdoruesit eshte e zbrazet</font><br/>";
		}
		
		if(empty($Fjalekalimi)) {
			echo "<font color='red'>Fusha Fjalekalimi eshte e zbrazet.</font><br/>";
		}
		
		if(empty($Emaili)) {
			echo "<font color='red'>Fusha Emaili eshte e zbrazet..</font><br/>";
		}
		
				
	} else {	
		//updating the table
		$rezultati = mysqli_query($lidh,"UPDATE umspo_perdoruesit SET Emri_Perdoruesit='$Emri_Perdoruesit', Fjalekalimi='$Fjalekalimi', Emaili='$Emaili' WHERE ID_Perdoruesi=$ID_Perdoruesi");
		
		//redirectig to the display message. In our case, it is ballina.php
		header("Location: perdoruesit.php");
	}
}
?>
<?php
//getting ID_Psikologu  from url
$ID_Perdoruesi =$_GET['ID_Perdoruesi'];

//selecting data associated with this particular ID_Psikologu 
$rezultati = mysqli_query($lidh,"SELECT * FROM umspo_perdoruesit WHERE ID_Perdoruesi=$ID_Perdoruesi");

while($res = mysqli_fetch_array($rezultati))
{
	$Emri_Perdoruesit = $res['Emri_Perdoruesit'];
	$Fjalekalimi = $res['Fjalekalimi'];
	$Emaili = $res['Emaili'];
	
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

			<!-- Header -->
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
						<section class="col-6 col-12-narrower feature">
								<p>Pershendetje, &nbsp <em><?php  echo $kyc_perd;?>!</em></p>
							<form enctype="multipart/form-data"action="modifikoperdorues.php" method="post" name="form1">
								<table class="default">
									<tr> 
										<td>Emri Perdoruesit</td>
										<td><input type="text" name="Emri_Perdoruesit" value='<?php echo $Emri_Perdoruesit;?>' required /></td>
									</tr>
									<tr> 
										<td>Fjalekalimi</td>
										<td><input type="text" name="Fjalekalimi" value='<?php echo $Fjalekalimi;?>' required /></td>
									</tr>
									<tr> 
										<td>Emaili</td>
										<td><input type="text" name="Emaili" value='<?php echo $Emaili;?>' required /></td>
									</tr>
									<tr>
										<td><input type="hidden" name="ID_Perdoruesi" value='<?php echo $_GET['ID_Perdoruesi'];?>' /></td>
										<td><input type="submit" name="modifikoperdorues" value="Modifiko"></td>
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