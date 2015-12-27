<script>

function update_preview(data){
  $.ajax({
      type: 'get',
      cache: false,
      url: "<?=H?>ajax/save.php?data="+encodeURIComponent(data),
      success:function(result){

      }
    });  
}

  $(document).ready(function(){
    
    $('.send').on('click', function(){
      var id = $(this).data('id');
      $.ajax({
        type: 'get',
        url: "<?=H?>ajax/form.php?id="+id,
        success:function(result){
          var obj = jQuery.parseJSON(result);
          //alert( obj.name );
          $('.note-editable').html(obj.body);
          $('.note-codable').val(obj.body);
          $('#slide-name').val(obj.name);
          $('#slide-bg').val(obj.bg);
          $('#edit').data('id', obj.id);
          update_preview(obj.body);
        }
      });      
      /*

      */
      
    });
    $('#edit').on('submit', function(e){
      e.preventDefault();
      var id = $(this).data('id');
      var body = $('.note-editable').html();
      var data = $(this).serialize();
      console.log(id);
      $.ajax({
        type: 'get',
        data: data,
        url: "<?=H?>ajax/update.php?body="+encodeURIComponent(body)+"&id="+id,
        success:function(result){

        }
      });      
      

      
    });
    $('#send-fly').on('click', function(){
      var data = $('#editor').val();
      $.ajax({
        cache: false,
        type: 'get',
        url: "<?=H?>ajax/save.php?data="+data
        
      });
      
    });
    $('.activate').on('click', function(){
      var id = $(this).data('id');
      $.ajax({
        
        type: 'get',
        url: "<?=H?>ajax/activate.php?screen=<?=$screen['id']?>&id="+id
        
      });
      
    });

  $('.editor').summernote({
    height: 300,   
  });
  
  $('.note-editable').on('keyup', function(){
    var data = $(this).html();
    update_preview(data);
  });
  $('.note-codable').on('keyup', function(){
    var data = $(this).val();
    update_preview(data);
  });
    

    
  });
</script>
<header class="well clearfix">
  <h2>Home</h2>
</header>
<main class="container-fluid">


  
  
  
</main>