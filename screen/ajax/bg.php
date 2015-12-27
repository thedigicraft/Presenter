<?include('../../config/conn.php')?>
<?
$id = $_GET['id'];
$stmt = $dbc->query("SELECT id FROM screens WHERE slug = '$id' LIMIT 1");
$stmt->setFetchMode(PDO::FETCH_ASSOC);
  
$screen = $stmt->fetch();

$q = "SELECT * FROM slides WHERE screen = $screen[id] AND status = 1 LIMIT 1";
$stmt = $dbc->query($q);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
while($data = $stmt->fetch()){

echo $data['bg'];

}?>