<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
	include("kontrollo.php");
	include("konfigurimi.php");	
?>
<?php
$rezultati = mysqli_query($lidh,
"SELECT * FROM umspo_perdoruesit ORDER BY ID_Perdoruesi DESC");
?>
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
							<section>
							<p>Përshëndetje, <em><?php  echo $kyc_perd;?>!</em></p>
							<form action="" method="post">  
								<table class="default">
	                                <tr>
	                                  <h3>Kërko të dhënat e përdoruesit për fshirje</h3>
	                                </tr><br>
	                               <tr>

	                                     <td>
	                                     Shkruaj:
	                                    </td>
	                                    <td>
	                                     <input type="text" name="term" placeholder="Emri Perdoruesit"/>
                                        </td>
                                        <td> <input type="submit" value="Kërko" /></td>
                                    </tr></table>
                               <table class="default">

	                                <tr>
	                                	<td>Emri Perdoruesit</td>
		                                <td>Fjalekalimi</td>
		                                <td>Emaili</td>
		                                <td>Fshije</td>
	                                </tr>
									<?php
	if (!empty($_REQUEST['term'])) {

	$term = mysqli_real_escape_string($lidh,$_REQUEST['term']);     

	$sql = mysqli_query($lidh,	
	
"SELECT * FROM umspo_perdoruesit 
WHERE
  ID_Perdoruesi LIKE '%".$term."%'"	); 

	while($rresht = mysqli_fetch_array($sql)) { 		
			echo "<tr>";
			echo "<td>".$rresht['Emri_Perdoruesit']."</td>";
			echo "<td>".$rresht['Fjalekalimi']."</td>";
			echo "<td>".$rresht['Emaili']."</td>";
			echo "<td><a href=\"fshiperdorues.php?ID_Perdoruesi=$rresht[ID_Perdoruesi]\" onClick=\"return confirm('A jeni te sigurt se deshironi te fshini perdoruesin?')\" class='button' class='button primary'>Fshijë</a> </td>";	
		}

	}

	?></table> </table></form>
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