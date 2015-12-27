<?php
function data_screens($dbc){

  $stmt = $dbc->query("SELECT * FROM screens");
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
  while($temp = $stmt->fetch()){
    $data[] = $temp;
  }
  
  return $data;  
  
}
function data_screen($dbc, $id){

  $stmt = $dbc->query("SELECT * FROM screens WHERE slug = '$id'");
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
  $data = $stmt->fetch();
  
  return $data;  
  
}
	

?>
