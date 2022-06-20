<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("kontrollo.php");	
?>

<?php
// including the database lidhection file
include_once("konfigurimi.php");

		if(isset($_POST['modifikopacient']))
		{	
			$ID_Pacienti=$_POST['ID_Pacienti'];
			$EmriP=$_POST['EmriP'];
			$Mbiemri=$_POST['Mbiemri'];
			$Emaili=$_POST['Emaili'];	
			$ID_Seanca =$_POST['ID_Seanca'];		
			$ID_Psikologu =$_POST['ID_Psikologu'];

			// checking empty fields
			if(empty($EmriP) || empty($Mbiemri) || empty($Emaili)) {	
					
				if(empty($EmriP)) {
					echo "<font color='red'>Fusha EmriP eshte e zbrazet..</font><br/>";
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
				$rezultati = mysqli_query($lidh,"UPDATE umspo_pacientet SET EmriP='$EmriP', Mbiemri='$Mbiemri', Emaili='$Emaili',ID_Psikologu ='$ID_Psikologu ', ID_Seanca='$ID_Seanca' WHERE ID_Pacienti=$ID_Pacienti");
				
				//redirectig to the display message. In our case, it is ballina.php
				header("Location: ballina.php");
			}
		}
		?>
		<?php
		//getting ID_Pacienti  from url
		$ID_Pacienti=$_GET['ID_Pacienti'];

		//selecting data associated with this particular ID_Pacienti 
		$rezultati = mysqli_query($lidh,"SELECT * FROM umspo_pacientet WHERE ID_Pacienti=$ID_Pacienti");

		while($res = mysqli_fetch_array($rezultati))
		{
			$EmriP=$res['EmriP'];
			$Mbiemri=$res['Mbiemri'];
			$Emaili=$res['Emaili'];
			$ID_Psikologu =$res['ID_Psikologu'];	
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
               ?><div id="header-wrapper" style="background-image: url('<?php echo $Dosja; ?>'); background-size: 100%"> 
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
							<form enctype="multipart/form-data"action="modifikopacient.php" method="post" name="form1">
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
									</tr><br>
                                    <tr>
										  <select name="ID_Psikologu">
												 <option selected="selected">Zgjedh Psikologun</option>
														<?php
														$res=mysqli_query($lidh,"SELECT * FROM umspo_psikologet");
														while($rresht=$res->fetch_array())
														{
															?>
															<option value="<?php echo $rresht['ID_Psikologu']; ?>"><?php echo $rresht['Emri']; ?></option>
															<?php
														}
														?>
											</select>
									</tr><br>
												
												
									<tr> 
										<td>Emri</td>
										<td><input type="text" name="EmriP" value='<?php echo $EmriP;?>' required /></td>
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
										<td><input type="hidden" name="ID_Pacienti" value='<?php echo $_GET['ID_Pacienti'];?>' /></td>
										<td><input type="submit" name="modifikopacient" value="Modifiko"></td>
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