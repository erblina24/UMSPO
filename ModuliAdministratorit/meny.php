
          <?php
            $rezultati = mysqli_query($lidh, "SELECT * FROM umspo_tedhenat WHERE PamjaFaqes='MenyAdmin'");
            while ($row = mysqli_fetch_assoc($rezultati)) {

              extract($row);
			  	 echo $Pershkrimi;
			  
if($rezultati==null)
  mysqli_free_rezultati($rezultati);

			}
            ?>