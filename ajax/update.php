<?include('../config/conn.php')?>
<?
$id = $_GET['id'];
//print_r($_GET);
if($_GET['mode'] == 'new'){
  $name = 'Untitled';
  $type = $_GET['type'];
  $stmt = $dbc->prepare("INSERT INTO slides (screen,type,name) VALUES (:screen,:type,:name)");
  $stmt->bindParam(':screen', $id);
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':type', $type);
}else{
  $stmt = $dbc->prepare("UPDATE slides SET name = :name,body = :body,bg = :bg WHERE id = $id");
  
  $stmt->bindParam(':name', $_GET['name']);
  $stmt->bindParam(':body', $_GET['body']);
  $stmt->bindParam(':bg', $_GET['bg']);
}

$stmt->execute();  

?>  