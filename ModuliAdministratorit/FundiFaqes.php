<?php
            $rezultati = mysqli_query($lidh, "SELECT * FROM umspo_tedhenat WHERE PamjaFaqes='Fotofundifaqes'");
            while ($row = mysqli_fetch_assoc($rezultati)) {

              extract($row);
			  
			  
if($rezultati==null)
  mysqli_free_rezultati($rezultati);

            ?>
            <div id="footer-wrapper"style="background-image: url('<?php echo $Dosja; ?>'); background-size: 100%;"><?php } ?>
					<div id="footer" class="container">
						
						<div class="row">
					
									
									<?php
            $rezultati = mysqli_query($lidh, "SELECT * FROM umspo_tedhenat WHERE PamjaFaqes='pamjafaqes_rrsociale'");
            while ($row = mysqli_fetch_assoc($rezultati)) {

              extract($row);
			  
			  
if($rezultati==null)
  mysqli_free_rezultati($rezultati);

            ?>
						<section class="col-6 col-12-narrower">
								<h3><?php echo $Titulli ?></h3></br>
								<div class="row gtr-0">
									<?php echo $Pershkrimi; ?>
								</div>
							</section>
			<?php } ?>
					</div>
					<div id="copyright" class="container">
					
												<?php
            $rezultati = mysqli_query($lidh, "SELECT * FROM umspo_tedhenat WHERE PamjaFaqes='pamjafaqes_copyright'");
            while ($row = mysqli_fetch_assoc($rezultati)) {

              extract($row);
			  
			  
if($rezultati==null)
  mysqli_free_rezultati($rezultati);

            ?>
					
					
							<?php echo $Pershkrimi; ?>
					
			<?php } ?>
						
					</div>
				</div>
			</div>