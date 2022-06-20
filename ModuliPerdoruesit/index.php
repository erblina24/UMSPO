<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("konfigurimi.php");	
?>
<!DOCTYPE HTML>
<!--
	Telephasic by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Moduli Perdoruesit</title>
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
				
			<!-- Promo -->
				
			<!-- Features 2 -->
				<div class="wrapper">
					<section class="container">
						
						<div class="row features">
							<?php
            $rezultati = mysqli_query($lidh, "SELECT  s.Lloji_Seances, p.Emri, p.Mbiemri, p.PershkrimiP,p.Foto, p.EmriFotos FROM umspo_psikologet p
LEFT OUTER JOIN umspo_seancat s ON p.ID_Seanca = s.ID_Seanca
GROUP BY s.Lloji_Seances, p.Emri, p.Mbiemri, p.PershkrimiP, p.Foto, p.EmriFotos
ORDER BY s.ID_Seanca, p.ID_Psikologu DESC");
            while ($row = mysqli_fetch_assoc($rezultati)) {

              extract($row);
			  
			  
if($rezultati==null)
  mysqli_free_rezultati($rezultati);

            ?> <section class="col-4 col-12-narrower feature">
								<div class="image-wrapper">
									<a href="#" class="image featured"><?php echo '<img src="data:images/jpeg;base64,'.base64_encode( $row['Foto'] ).'" width="50%" height="50%">'; ?></a>
								</div>
								<h4><strong><?php echo $Emri .' '. $Mbiemri; ?></strong></h4>
								<p>Seance <?php echo $Lloji_Seances;?></p>
							</section> <?php } ?>
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