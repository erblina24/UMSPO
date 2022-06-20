<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("kontrollo.php");	
?>
<?php
//including the database lidhection Dosja
include_once("konfigurimi.php");

//fetching data in descending order (lastest entry first)
$rezultati = mysqli_query($lidh,
"SELECT * FROM umspo_tedhenat ORDER BY 	ID_TeDhenat DESC");
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
				<p>Përshëndetje, <em><?php  echo $kyc_perd;?>!</em></p>
							<form action="" method="post">  
								<table class="default">
	<tr>
	<h3>Kërko të dhënat për modifikim</h3>
	</tr><br>
	<tr>

	<td>
	Shkruaj:
	</td>
	<td>
	<input type="text" name="term" placeholder="Titullit ose Pamjes se faqes"/>
</td>
<td> <input type="submit" value="Kërko" /></td>
</tr>
<table class="default">
	<tr>
		<td>Titulli</td>
		<td>Pershkrimi</td>
		<td>Emri i Dosjes</td>
		<td>Pamja e faqes</td>
		<td>Modifiko</td>
	</tr> 
<?php
if (!empty($_REQUEST['term'])) {
$term = mysqli_real_escape_string
($lidh,$_REQUEST['term']);     
$sql = mysqli_query($lidh,
"SELECT * FROM umspo_tedhenat 
WHERE Titulli LIKE '%".$term."%' 
OR  PamjaFaqes LIKE '%".$term."%'"); 
while($row = mysqli_fetch_array($sql)) { 		
		echo "<tr>";
		echo "<td>".$row['Titulli']."</td>";
		echo "<td>".$row['Pershkrimi']."</td>";
		echo "<td>".$row['Dosja']."</td>";	
		echo "<td>".$row['PamjaFaqes']."</td>";	
		echo "<td><a href=\"modifikotedhena.php?ID_TeDhenat=$row[ID_TeDhenat]\" class='button' class='button primary'>
		Modifiko</a></td></tr>";		
	}

}

?></table></table></form>
					 </section>
				</div>
				</div>
			</div>
			

		<!-- Footer -->
			<?php include_once("FundiFaqes.php"); ?>
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>