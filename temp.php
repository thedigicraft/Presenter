<?

  $stmt = $dbc->prepare("INSERT INTO books (id,name,abbr,ord,book_group_id,testament,osis_end) VALUES (:id,:name,:abbr,:ord,:book_group_id,:testament,:osis_end)");
  
  $stmt->bindParam(':id', $book['id']);
  $stmt->bindParam(':name', $book['name']);
  $stmt->bindParam(':abbr', $book['abbr']);
  $stmt->bindParam(':ord', $book['ord']);
  $stmt->bindParam(':book_group_id', $book['book_group_id']);
  $stmt->bindParam(':testament', $book['testament']);
  $stmt->bindParam(':osis_end', $book['osis_end']);
  
  
  $stmt->execute();  
  
?>

      <h3>Books</h3>
      <div class="list-group">
        
        <?
          $stmt = $dbc->query("SELECT * FROM books ORDER BY ord");
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          
          while($data = $stmt->fetch()){?>
          <a href="#" class="send list-group-item">
              <h2><?=$data['name']?></h2>
          </a>
        <?}?>
      </div>  