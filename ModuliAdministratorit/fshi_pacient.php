<!DOCTYPE HTML>
<!--
    Telephasic by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php
	include("kontrollo.php");	
	include_once("konfigurimi.php");
	$rezultati = mysqli_query($lidh,
"SELECT * FROM umspo_pacientet ORDER BY ID_Pacienti  DESC");
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
                            <form action="" method="post">  
                                <table class="default">
                                    <tr>
                                      <h3>Kërko të dhënat e pacientit për fshirje</h3>
                                    </tr>
         
                                    <tr>
                                    <td>Shkruaj:</td>
                                    <td>
                                    <input type="text" name="term" placeholder="Emri ose Emaili"/>
                                    </td>
                                    <td>
                                    <input type="submit" value="Kërko" />
                                    </td>
                                            </tr>
                                </table>
                                <table class="default">
                                        <tr>
                                            <td>Emri</td>
                                    		<td>Mbiemri</td>
                                    		<td>Emaili</td>		
                                    		<td>Seanca</td>
                                    		<td>Psikologu</td>
                                    		<td>Fshij</td>

                                        </tr>
                                    <?php
                                      if (!empty($_REQUEST['term'])) {

                                      $term = mysqli_real_escape_string($lidh,$_REQUEST['term']);     
                                      $sql = mysqli_query($lidh,	"SELECT
                                                        c.ID_Pacienti,
                                                        c.EmriP,
                                                        c.Mbiemri,
                                                        c.Emaili,
                                                        s.Lloji_Seances,
                                                        p.Emri 
                                                        FROM
                                                        umspo_pacientet c
                                                        INNER JOIN
                                                        umspo_seancat s ON c.ID_Seanca  = s.ID_Seanca 
                                                        INNER JOIN
                                                        umspo_psikologet p ON c.ID_Psikologu   = p.ID_Psikologu  
                                                        WHERE
                                                        c.EmriP LIKE '%".$term."%' OR c.Emaili LIKE '%".$term."%'"  ); 
                                                            while($rresht = mysqli_fetch_array($sql)) {        
                                                                    echo "<tr>";
                                                                    echo "<td>".$rresht['EmriP']."</td>";
                                                                    echo "<td>".$rresht['Mbiemri']."</td>";
                                                                    echo "<td>".$rresht['Emaili']."</td>";
                                                                    echo "<td>".$rresht['Lloji_Seances']."</td>";  
                                                                    echo "<td>".$rresht['Emri']."</td>";   
                                                                    
                                                                    echo "<td><a href=\"fshipacient.php?ID_Pacienti=$rresht[ID_Pacienti]\"  onClick=\"return confirm('A jeni te sigurt se deshironi te fshini pacientin?')\" class='button'>Fshi</a> </td>";          
                                                                }

                                                            }
                                     ?>
                                </table>
                            </form>
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
            <script src="assets/js/browtser.min.js"></script>
            <script src="assets/js/breakpoints.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>
        </div>
    </body>
</html>