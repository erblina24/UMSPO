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
					<section class="container">
						<h4>Përshëndetje, <em><?php  echo $kyc_perd;?>!</em></h4><br>
						<h3>MENAXHIMI I TE DHENAVE TE PERDORUESVE</h3><br>
						<div class="row features">
							<section class="col-4 col-12-narrower feature">
								<div class="image-wrapper first">
									<a href="shto_perdorues.php" class="image featured"><img src="images/1.jpg" alt="" /></a>
								</div>
								<h1>SHTO PËRDORUES</h1>
								<p>Forma per shtimin e perdoruesve te rinje ne uebaplikacion me te drejta te administratorit.</p>
							</section>
							<section class="col-4 col-12-narrower feature">
								<div class="image-wrapper">
									<a href="modifiko_perdorues.php" class="image featured"><img src="images/1.jpg" alt="" /></a>
								</div>
								<h1>MODIFIKO PËRDORUES</h1>
								<p>Forma per modifikim te te dhenave te perdoruesve aktual ne uebaplikacion me te drejta te administratorit.</p>
							</section>
							<section class="col-4 col-12-narrower feature">
								<div class="image-wrapper">
									<a href="fshi_perdorues.php" class="image featured"><img src="images/1.jpg"alt="" /></a>
								</div>
								<h1>FSHIJË PËRDORUES</h1>
								<p>Forma per fshirje te perdoruesve aktual nga uebaplikacion</p>
							</section>
							
						</div>
						<br>
						
					</section>
							
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