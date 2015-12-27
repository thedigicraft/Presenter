<?php

############################################################
## Page Debuger 
############################################################

?>
<script>

	$(document).ready(function() {
		
		$("#debug-btn").click(function(){
		  $("#debug-console").toggle();
		});				

	});

</script>

<div id="debug-btn"></div>
<div id="debug-console" style="display:none; z-index:900; box-shadow:1px 1px 10px #222222;">

    <pre>
    
    <?php
		$debug = get_defined_vars(); 
		print_r($post); 
		print_r($debug); 
    ?>
    
    </pre>

</div>
<div id="debug" style="z-index: 99; position: absolute; top: 50px; left: 0px; width: 500px; height: 700px; overflow-y: scroll; background-color: #DFDFDF;">
<h3>Path</h3>	
<pre>
	<?php print_r($path); ?>
</pre>

<h3>Series</h3>	
<pre>
	<?php print_r($series); ?>
</pre>

<h3>Chapter</h3>	
<pre>
	<?php print_r($data_chapter); ?>
</pre>
<h3>Chapters</h3>	
<pre>
	<?php print_r($data_chapters); ?>
</pre>

<h3>Lesson</h3>	
<pre>
	<?php print_r($data_lesson); ?>
</pre>
	
	
</div>