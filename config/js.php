

	<!-- JQuery -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	
	<!-- Bootstrap 3.0 -->
	<script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?=H?>js/summernote.min.js"></script>
  <script>
    $(document).ready(function(){
      $('#search').on('click', function(e){
        e.preventDefault();
        var terms = $('#query').val();
        $.ajax({
          type: 'get',
          url: "<?=H?>ajax/bible.php?q="+terms,
          success:function(result){
            $('#results').html(result);
          }
        });
        
      });
    });  
  </script>