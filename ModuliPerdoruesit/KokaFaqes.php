	<?php
            $rezultati = mysqli_query($lidh, "SELECT * FROM umspo_tedhenat WHERE PamjaFaqes='KokaFaqes'");
            while ($row = mysqli_fetch_assoc($rezultati)) {

              extract($row);
			  
			  
if($rezultati==null)
  mysqli_free_rezultati($rezultati);

            ?><section id="hero" class="container">
							<header>
								<h2><?php echo $Titulli ?></h2>
							</header>
							
	</section>
	<?php } ?>