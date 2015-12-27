  <?include('../config/conn.php')?>
  <?include('../functions/sandbox.php')?>
  <?
    $stmt = $dbc->query("SELECT * FROM slides WHERE screen = $_GET[screen]");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
    while($data = $stmt->fetch()){?>
      
    <div class="list-group-item">
        <?=$data['name']?>
        <span class="pull-right">
          <button data-id="<?=$data['id']?>" class="btn-info send"><?=i('edit')?></button>
          <button data-id="<?=$data['id']?>" class="btn-success activate"><?=i('desktop')?></button>
        </span>
    </div>
  <?}?> 