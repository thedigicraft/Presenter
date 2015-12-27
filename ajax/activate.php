<?include('../config/conn.php')?>
<?
$id = $_GET['id'];
$screen = $_GET['screen'];
print_r($_GET);
$stmt = $dbc->prepare("UPDATE slides SET status = 0 WHERE screen = $screen");
$stmt->execute(); 
$stmt = $dbc->prepare("UPDATE slides SET status = 1 WHERE id = $id");
$stmt->execute();  

?>  