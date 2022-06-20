<?php
	include("kontrollo.php");	
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
        <div class="wrapper">
			<div class="container">
				<div class="row">
					<section class="col-6 col-12-narrreshter feature">
								<p>Pershendetje, &nbsp <em><?php  echo $kyc_perd;?>!</em></p>
								<h3>Shto pacient</h3>
						<form enctype="multipart/form-data"action="shtopacient.php" method="post" name="form1">											<table class="default">
                               <tr>
                                    <select name="ID_Seanca">
										<option selected="selected">Zgjedh llojin e seances</option>
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
									</select><br />
                            	</tr>
								<tr>  
									<td>Emri</td>
										<td><input type="text" name="EmriP" id="" value="" placeholder="Emri" /></td>
		                        </tr>
		                        <tr>
		                           	    <td>Mbiemri</td>
										<td><input type="text" name="Mbiemri" id="" value="" placeholder="Mbiemri" /></td>
		                        </tr>			
								<tr>
										<td>Emaili</td>
										<td><input type="email" name="Emaili" id="" value="" placeholder="Emaili" /></td>
		                        </tr>		
		                            	
		                        <tr> 
										<td></td>
										<td><input type="submit" name="shtopacient" value="Shto"></td>
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
						