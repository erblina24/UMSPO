<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("kontrollo.php");	
?>

<?php
// including the database lidhection file
include_once("konfigurimi.php");

if(isset($_POST['modifikokerkeseperseanc']))
{	
	$ID_KerkesaS=$_POST['ID_KerkesaS'];
	$Emri=$_POST['Emri'];
	$Mbiemri=$_POST['Mbiemri'];
	$Emaili=$_POST['Emaili'];	
	$ID_Seanca =$_POST['ID_Seanca'];		
	$MesazhiShtese=$_POST['MesazhiShtese'];
	
	// checking empty fields
	if(empty($Emri) || empty($Mbiemri) || empty($Emaili) || empty($ID_Seanca)) {	
			
		if(empty($Emri)) {
			echo "<font color='red'>Fusha Emri eshte e zbrazet..</font><br/>";
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
				
	} else {	
		//updating the table
		$rezultati = mysqli_query($lidh,"UPDATE umspo_kerkesatperseanca SET Emri='$Emri', Mbiemri='$Mbiemri', Emaili='$Emaili',MesazhiShtese='$MesazhiShtese', ID_Seanca='$ID_Seanca' WHERE ID_KerkesaS=$ID_KerkesaS");
		
		//redirectig to the display message. In our case, it is ballina.php
		header("Location: pranokerkesatperseanca.php");
	}
}
?>
<?php
//getting ID_Psikologu  from url
$ID_KerkesaS=$_GET['ID_KerkesaS'];

//selecting data associated with this particular ID_Psikologu 
$rezultati = mysqli_query($lidh,"SELECT * FROM umspo_kerkesatperseanca WHERE ID_KerkesaS=$ID_KerkesaS");

while($res = mysqli_fetch_array($rezultati))
{
	$Emri = $res['Emri'];
	$Mbiemri = $res['Mbiemri'];
	$Emaili = $res['Emaili'];
	$MesazhiShtese=$res['MesazhiShtese'];	
	$ID_Seanca =$res['ID_Seanca'];	
	
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
		<title>Telephasic by HTML5 UP</title>
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
							<section class="col-6 col-12-narrower feature">
								<p>Pershendetje, &nbsp <em><?php  echo $kyc_perd;?>!</em></p>
								<form enctype="multipart/form-data"action="modifikokerkeseperseanc.php" method="post" name="form1">
									<table class="default">
												
										<tr>
											 <select name="ID_Seanca">
												<option selected="selected">Zgjedh Seancen</option>
													<?php
													$res=mysqli_query($lidh,"SELECT * FROM umspo_seancat");
													while($rresht=$res->fetch_array())
													{
													?>
													<option value="<?php echo $rresht['ID_Seanca']; ?>"><?php echo $rresht['Lloji_Seances']; ?></option>
													<?php
													}
													?>
												</select>
											</tr>
											<tr> 
												<td>Emri</td>
												<td><input type="text" name="Emri" value='<?php echo $Emri;?>' required /></td>
											</tr>
											<tr> 
												<td>Mbiemri</td>
												<td><input type="text" name="Mbiemri" value='<?php echo $Mbiemri;?>' required /></td>
											</tr>
											<tr> 
												<td>Emaili</td>
											    <td><input type="text" name="Emaili" value='<?php echo $Emaili;?>' required /></td>
											</tr>
											<tr> 
												<td>Mesazhi Shtese</td>
											    <td><input type="text" name="MesazhiShtese" value='<?php echo $MesazhiShtese;?>' required /></td>
											</tr>
												
											<tr> 
												<td><input type="hidden" name="ID_KerkesaS" value='<?php echo $_GET['ID_KerkesaS'];?>' /></td>
												<td><input type="submit" name="modifikokerkeseperseanc" value="Modifiko"></td>
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