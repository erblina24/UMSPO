<?php
$databazahostit ="localhost";
$databazaperdoruesit = "root";
$databazafjalkalimi = "";
$databazaemri ="umspo";
//connect to database
$lidh = @mysqli_connect($databazahostit, $databazaperdoruesit, $databazafjalkalimi, $databazaemri) or die("Nuk mund te lidhej me baze te te dhenave.");
//get the data from table Data_ahome
$query = "SELECT afaqja FROM tedhenat_faqjaa";
//execute the query
$rezultati = mysqli_query($lidh, $query);
if(!$rezultati){ echo "Query nuk mund te ekzekutohej"; die();}
else{
 //creates an empty array to hold data
 $data = array();
  while($rresht = mysqli_fetch_assoc($rezultati)){
  	
    $data[]=$rresht;
  }
//  echo json_encode($data, JSON_PRETTY_PRINT);
//it will create file results.json with writing mode.
//you can read more about file handling in PHP here. 
$fp = fopen('test.json', 'w');
//json_enconde($array, $options(optional) is the method to convert array into JSON
fwrite($fp, json_encode($data, JSON_PRETTY_PRINT));
echo "Dosja esht krijuar";
//close the file
fclose($fp);
}
?>