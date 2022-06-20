<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("kontrollo.php");	
?>

<?php
// including the database lidhection file
include_once("konfigurimi.php");

if(isset($_POST['modifikopsikolog']))
{	
	$ID_Psikologu=$_POST['ID_Psikologu'];
	$Emri=$_POST['Emri'];
	$Mbiemri=$_POST['Mbiemri'];
	$Emaili=$_POST['Emaili'];	
	$ID_Seanca =$_POST['ID_Seanca'];		
	$PershkrimiP=$_POST['PershkrimiP'];
	$foto=addslashes (file_get_contents($_FILES['userfile']['tmp_name']));
	$name=$_FILES['userfile']['name'];
	$maxsize = 10000000;
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
		$rezultati = mysqli_query($lidh,"UPDATE umspo_psikologet SET Emri='$Emri', Mbiemri='$Mbiemri', Emaili='$Emaili',PershkrimiP='$PershkrimiP', ID_Seanca='$ID_Seanca', Foto='$foto', EmriFotos='$name' WHERE ID_Psikologu=$ID_Psikologu");
		
		//redirectig to the display message. In our case, it is ballina.php
		header("Location: ballina.php");
	}
}
?>
<?php
//getting ID_Psikologu  from url
$ID_Psikologu=$_GET['ID_Psikologu'];

//selecting data associated with this particular ID_Psikologu 
$rezultati = mysqli_query($lidh,"SELECT * FROM umspo_psikologet WHERE ID_Psikologu=$ID_Psikologu");

while($res = mysqli_fetch_array($rezultati))
{
	$Emri = $res['Emri'];
	$Mbiemri = $res['Mbiemri'];
	$Emaili = $res['Emaili'];
	$PershkrimiP=$res['PershkrimiP'];	
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
				<div class="wrapper">
					<div class="container">
						<div class="row">
							<section class="col-6 col-12-narrower feature">
								<p>Pershendetje, &nbsp <em><?php  echo $kyc_perd;?>!</em></p>
								<form enctype="multipart/form-data"action="modifikopsikolog.php" method="post" name="form1">
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
											<td>Pershkrimi</td>
										    <td><input type="text" name="PershkrimiP" value='<?php echo $PershkrimiP;?>' required /></td>
										</tr>
										<tr>
											<td>Foto<input type="hidden" name="MAX_FILE_SIZE" value="10000000" /></td>
											<td><input name="userfile" type="file" /></td>
										</tr>
										<tr> 
											<td><input type="hidden" name="ID_Psikologu" value='<?php echo $_GET['ID_Psikologu'];?>' /></td>
											<td><input type="submit" name="modifikopsikolog" value="Modifiko"></td>
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