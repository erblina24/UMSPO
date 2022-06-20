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
		<link rel="stylesheet"  href="assets/css/main.css" />
		<script src="jquery.js"></script>
		
		<script>
            $(document).ready(function () {
                $.getJSON("test.json", function (data) {

                    var arrItems = [];      // THE ARRAY TO STORE JSON ITEMS.
                    $.each(data, function (index, value) {
                        arrItems.push(value);       // PUSH THE VALUES INSIDE THE ARRAY.
                    });

                    // EXTRACT VALUE FOR TABLE HEADER.
                    var col = [];
                    for (var i = 0; i < arrItems.length; i++) {
                        for (var key in arrItems[i]) {
                            if (col.indexOf(key) === -1) {
                                col.push(key);
                            }
                        }
                    }

                    // CREATE DYNAMIC TABLE.
                    var table = document.createElement("table");

                    // CREATE HTML TABLE HEADER ROW USING THE EXTRACTED HEADERS ABOVE.

                    var tr = table.insertRow(-1);                   // TABLE ROW.

                /* for (var i = 0; i < col.length; i++) {
                        var th = document.createElement("th");      // TABLE HEADER.
                        th.innerHTML = col[i];
                        tr.appendChild(th);
                    }*/

                    // ADD JSON DATA TO THE TABLE AS ROWS.
                    for (var i = 0; i < arrItems.length; i++) {

                        tr = table.insertRow(-1);

                        for (var j = 0; j < col.length; j++) {
                            var tabCell = tr.insertCell(-1);
                            tabCell.innerHTML = arrItems[i][col[j]];
                        }
                    }

                    // FINALLY ADD THE NEWLY CREATED TABLE WITH JSON DATA TO A CONTAINER.
                    var divContainer = document.getElementById("shfaqtedhenen");
                    divContainer.innerHTML = "";
                    divContainer.appendChild(table);
                });
            });
        </script>
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

							<section class="col-6 col-12-narrower feature"> <p>Përshëndetje, <em><?php  echo $kyc_perd;?>!</em></p>
								<h3>Moduli Administratorit</h3><br>
									<p id=shfaqtedhenen></p>
									<a class="button" href="Ajax/index.php">Voto</a>

							
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