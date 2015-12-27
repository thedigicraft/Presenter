<?include('../config/conn.php')?>
<?
$id = $_GET['id'];
//print_r($_GET);
if($_GET['mode'] == 'new'){
  $name = 'Untitled';
  $stmt = $dbc->prepare("INSERT INTO slides (screen,name) VALUES (:screen,:name)");
  $stmt->bindParam(':screen', $id);
  $stmt->bindParam(':name', $name);
}else{
  $stmt = $dbc->prepare("UPDATE slides SET name = :name,body = :body,bg = :bg WHERE id = $id");
  
  $stmt->bindParam(':name', $_GET['name']);
  $stmt->bindParam(':body', $_GET['body']);
  $stmt->bindParam(':bg', $_GET['bg']);
}

$stmt->execute();  

?>  