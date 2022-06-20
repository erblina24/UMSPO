<?php
class Kontrolluesidb {
	private $hostimi = "localhost";
	private $perdoruesi = "root";
	private $fjalkalimi = "";
	private $bazaetedhenave = "umspo";
	private $lidh;
	
	function __construct() {
		$this->lidh = $this->lidhDB();
	}
	
	function lidhDB() {
		$lidh = mysqli_connect($this->hostimi,$this->perdoruesi,$this->fjalkalimi,$this->bazaetedhenave);
		return $lidh;
	}
	
	function ekzekutopyetje($pyetje) {
		$rezultati = mysqli_query($this->lidh,$pyetje);
		while($rresht=mysqli_fetch_array($rezultati)) {
			$rezultatet[] = $rresht;
		}
		if(!empty($rezultatet))
			return $rezultatet;
	}
	
	function shtopyetje($pyetje) {
	    mysqli_query($this->lidh, $pyetje);
	    $insert_nri = mysqli_insert_id($this->lidh);
	    return $insert_nri;
	}
	
	function merrID($pyetje) {
	    $rezultati = mysqli_query($this->lidh,$pyetje);
	    while($rresht=mysqli_fetch_array($rezultati)) {
	        $rezultatet[] = $rresht[0];
	    }
	    if(!empty($rezultatet))
	        return $rezultatet;
	}
}
?>