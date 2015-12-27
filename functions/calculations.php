<?php
	
	# Total Number of Lessons:
	function count_lessons($dbc, $id) {
		
		$q = "SELECT * FROM lessons WHERE chapter = $id";
		$r = mysqli_query($dbc, $q);
		
		$data = mysqli_num_rows($r);
		return $data;
			
	}
	
	
?>