<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
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

			<!-- Features 1 -->
				<div class="wrapper">
					<div class="container">
						<div class="row">
							<section class="col-6 col-12-narrower feature">
								<p>Pershendetje, &nbsp <em><?php  echo $kyc_perd;?>!</em></p>
								<form enctype="multipart/form-data"action="shtoseance.php" method="post" name="form1">
											<table class="default">
												  <tr>
	                                  <h3>Shto të dhënat e seancës</h3>
	                                </tr>
	                                <br>
											<tr> 
													<td>Lloji Seances</td>
													<td><input type="text" name="Lloji_Seances"></td>
												</tr>
												<tr> 
													<td>Kohezgjatja</td>
													<td><input type="text" name="Kohezgjatja" placeholder="00:00:00"></td>
												</tr>
												<tr> 
													<td></td>
													<td><input type="submit" name="shtoseance" value="Shto"></td>
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

	</body>
</html>