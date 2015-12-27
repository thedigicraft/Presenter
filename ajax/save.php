<?
  $data = $_GET['data'];
  $file = fopen("../data/screen1.html", "w");
  fwrite($file, $data);
  echo $data;
?>