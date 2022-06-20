<?php
/* Index.php faqja qe permban formen e loginit) */
	include('kycu.php'); // Include Login Script
	if ((isset($_SESSION['Emri_Perdoruesit']) != '')) 
	{
		header('Location: faqja_administratorit.php');
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
			<!-- Header -->
				
					<div id="header" class="container">

						<!-- Logo -->
							

						<!-- Nav -->
							

					</div>

					<!-- Hero -->
						<?php include_once("KokaFaqes.php"); ?>

				</div>

						<!-- Logo -->
						

						<!-- Nav -->

					<!-- Hero -->
						
			<!-- Features 1 -->
				<div class="wrapper">
					<div class="container">
						<div class="row">
							<section class="col-6 col-12-narrower feature">
								<h3>Udhëzim</h3>
								<br>
								<h4>Për tu kycur në uebaplikacion ju lutem kontaktoni administratorin për krijimin e llogarisë</h4>
							</section>
							<section class="col-6 col-12-narrower feature">
								<section class="col-6 col-12-narrower">
								    <form method="post" action="#">
									    <div class="row gtr-50">
										    <div class="col-6 col-12-mobile">
												<input name="Emri_Perdoruesit" placeholder="Përdoruesi" type="text" />
										    </div>
											<div class="col-6 col-12-mobile">
												<input name="Fjalekalimi" placeholder="Fjalëkalimi" type="password" />
											</div>
										
											<div class="col-12">
												<ul class="actions">
													
													<li><input type="submit"name="submit" value="Kycu" /></li>
												</ul>
											</div>
										</div>
									</form>
								</section>
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