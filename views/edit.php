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
function update_bank(screen){
  $("#bank").load("<?=H?>ajax/bank.php?screen="+screen);  
}

  $(document).ready(function(){
    update_bank("<?=$screen['id']?>");
    
    $('#bank').on('click', '.send', function(){
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
          update_bank("<?=$screen['id']?>");
        }
      }); 
    });     
    $('#slide-add').on('click', function(e){
      e.preventDefault();
      var id = $(this).data('id');
      console.log(id);
      $.ajax({
        type: 'get',
        url: "<?=H?>ajax/update.php?mode=new&id="+id,
        success:function(result){
          update_bank(id);
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
    $('#bank').on('click','.activate', function(){
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
  <h2>Screen Manager</h2>
</header>
<main class="container-fluid">

  
  <div class="row">
    
    <div class="col-md-2">
      <?include('components/bank.php')?>
    </div>
   
    <div class="col-md-5">
      <h3>Editor</h3>
      <form id="edit">
        <div class="form-group row">
          <div class="col-md-6">
            <label>Name: </label>
            <input id="slide-name" class="form-control" name="name" value="">            
          </div>
          <div class="col-md-6">
            <label>Background: </label>
            <input id="slide-bg" class="form-control" name="bg" value="">            
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-12">
            <label>Body: </label>
            <textarea id="editor" class="editor"></textarea>  
          </div>    
        </div>
        <button id="save" class="btn btn-success">Save</button>
      </form>

    </div>
   <!-- -->
    
    <div class="col-md-5">

      <h3>Preview</h3>
      <!--<div id="preview" style="width:960px;height: 540px;"></div>-->
      <iframe style="width:720px;height: 405px;" src="<?=H?>screen/<?=$screen['slug']?>"></iframe>      
 
      <div id="results"></div>

    </div>
    
  </div>

  
  
  
</main>