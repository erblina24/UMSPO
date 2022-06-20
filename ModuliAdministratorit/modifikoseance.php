<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("kontrollo.php");	
?>

<?php
// including the database lidhection file
include_once("konfigurimi.php");

if(isset($_POST['modifikoseance']))
{	
	$ID_Seanca=$_POST['ID_Seanca'];
	$Lloji_Seances=$_POST['Lloji_Seances'];
	$Kohezgjatja=$_POST['Kohezgjatja'];	
	
	// checking empty fields
	if(empty($Lloji_Seances) || empty($Kohezgjatja)) {	
			
		if(empty($Lloji_Seances)) {
			echo "<font color='red'>Fusha e LLojit te Seances eshte e zbrazet.</font><br/>";
		}
		
		if(empty($Kohezgjatja)) {
			echo "<font color='red'>Fusha e Kohezgjatjes eshte e zbrazet.</</font><br/>";
		}
		
				
	} else {	
		//updating the table
		$rezultati = mysqli_query($lidh,"UPDATE umspo_seancat SET Lloji_Seances='$Lloji_Seances', Kohezgjatja='$Kohezgjatja' WHERE ID_Seanca=$ID_Seanca");
		
		//redirectig to the display message. In our case, it is ballina.php
		header("Location: ballina.php");
	}
}
?>
<?php
//getting ID_Psikologu  from url
$ID_Seanca =$_GET['ID_Seanca'];

//selecting data associated with this particular ID_Psikologu 
$rezultati = mysqli_query($lidh,"SELECT * FROM umspo_seancat WHERE ID_Seanca=$ID_Seanca");

while($res = mysqli_fetch_array($rezultati))
{
	$Lloji_Seances = $res['Lloji_Seances'];
	$Kohezgjatja = $res['Kohezgjatja'];
	
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
			<div id="header-wrapper">
				<div id="header" class="container">

						<!-- Logo -->
							

						<!-- Nav -->
							
                      <?php include_once("meny.php"); ?>
				</div>
					<!-- Hero -->
					<?php include_once("KokaFaqes.php"); ?>

			</div>
			<!-- Features 1 -->
				
			<!-- Promo -->
				
			<!-- Features 2 -->
			<div class="wrapper">
				<section class="container">
					<div class="row">
						<section>
							<p>Pershendetje, &nbsp <em><?php  echo $kyc_perd;?>!</em></p>
							<form enctype="multipart/form-data" method="post" action="">
		                     <table class="default">
			                     	<tr> 
										<td>Lloji Seances</td>
										<td><input type="text" name="Lloji_Seances" value='<?php echo $Lloji_Seances;?>' required /></td>
									</tr>
									<tr> 
										<td>Kohezgjatja</td>
										<td><input type="text" name="Kohezgjatja" value='<?php echo $Kohezgjatja;?>' required /></td>
									</tr>
				
									<tr>
									<td><input type="hidden" name="ID_Seanca" value='<?php echo $_GET['ID_Seanca'];?>' /></td>
									<td><input type="submit" name="modifikoseance" value="Modifiko"></td>
									</tr>
								</table>
							</form>
						</section>
					</div>
				</section>
			</div>
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