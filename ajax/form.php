<?
include('../config/conn.php');
$id = $_GET['id'];
$q = "SELECT * FROM slides WHERE id = $id LIMIT 1";
$stmt = $dbc->query($q);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$data = $stmt->fetch();
$json = json_encode($data);
echo $json;
?>