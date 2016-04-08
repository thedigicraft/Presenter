  <?include('../config/conn.php')?>
  <?include('../functions/sandbox.php')?>
  <?
    $stmt = $dbc->query("SELECT * FROM slides WHERE screen = $_GET[screen] AND parent=0");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
    while($data = $stmt->fetch()){
      if($data['type'] == 1){
        $icon = 'picture-o';
      }
      if($data['type'] == 2){
        $icon = 'music';
      }
      ?>
      
    <div class="list-group-item">
        <?=i($icon)?> <?=$data['name']?>
        <span class="pull-right">
          <button data-id="<?=$data['id']?>" class="btn-info send"><?=i('edit')?></button>
          <button data-id="<?=$data['id']?>" class="btn-success activate"><?=i('desktop')?></button>
        </span>
        <p class="list-group-item-text"><?=strip_tags($data['body'])?></p>
    </div>
  <?}?> 