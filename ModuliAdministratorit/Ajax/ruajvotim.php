<?php
    session_start();
    require("kontrollusidb.php");
	$kontrollusidb = new Kontrolluesidb();
	
	$ID_Pergjigjja = $_POST['pergj'];
	$ID_Pyetja = $_POST['pyetje'];
	
	$pyetje = "INSERT INTO umspo_votimi(ID_Pyetja,ID_Pergjigjja,ID_Pjesetari) VALUES ('" . $ID_Pyetja ."','" . $ID_Pergjigjja . "','" . $_SESSION["ID_Pjesetari"] . "')";
    $insert_nri = $kontrollusidb->shtopyetje($pyetje);
    
    if(!empty($insert_nri)) {
        $pyetje = "SELECT * FROM umspo_pergjigjjet WHERE ID_Pyetja = " . $ID_Pyetja;
        $pergj = $kontrollusidb->ekzekutopyetje($pyetje);
    }
    
    if(!empty($pergj)) {
?>        
        <div class="poll-heading"> Rezultati </div> 
<?php
        $pyetje = "SELECT count(ID_Pergjigjja) as total_count FROM umspo_votimi WHERE ID_Pyetja = " . $ID_Pyetja;
        $vlersimi_total = $kontrollusidb->ekzekutopyetje($pyetje);

        foreach($pergj as $k=>$v) {
            $pyetje = "SELECT count(ID_Pergjigjja) as pergj_count FROM umspo_votimi WHERE ID_Pyetja = " .$ID_Pyetja . " AND ID_Pergjigjja = " . $pergj[$k]["ID"];
            $vlersimi_pyetjes = $kontrollusidb->ekzekutopyetje($pyetje);
            $numrimi_prgj = 0;
            if(!empty($vlersimi_pyetjes)) {
                $numrimi_prgj = $vlersimi_pyetjes[0]["pergj_count"];
            }
            $perqindja = 0;
            if(!empty($vlersimi_total)) {
                $perqindja = ( $numrimi_prgj / $vlersimi_total[0]["total_count"] ) * 100;
                if(is_float($perqindja)) {
                    $perqindja = number_format($perqindja,2);
                }
            }
            
?>
		<div class="answer-rating"> <span class="answer-text"><?php echo $pergj[$k]["Pergjigjja"]; ?></span><span class="answer-count"> <?php echo $perqindja . "%"; ?></span></div>      
<?php 
        }
    }
?>
<div class="poll-bottom">
	<button class="next-link" onClick="show_poll();">Vazhdo</button>
</div>