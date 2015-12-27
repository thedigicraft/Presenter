<?php

############################################################
## Utility Functions) 
############################################################

	## Convert Slug to an ID.
	function slug_to_id ($dbc, $table, $slug) {
		
		$r = mysqli_query($dbc, "SELECT id FROM $table WHERE slug = '$slug'");				
		$data = mysqli_fetch_assoc($r);
		return $data['id'];			
		
	}

?>