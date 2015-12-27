<?php



	function get_listing($dbc, $listingid) {
		
		$q = "SELECT * FROM listings WHERE post_id = $listingid LIMIT 1";
		$r = mysqli_query($dbc, $q);
		
		$listing = mysqli_fetch_assoc($r);
		
		return $listing;
				
	}

	function get_listing_images($dbc, $postid) {
		
		$q = "SELECT * FROM images WHERE post_id = $postid ORDER BY pos LIMIT 1";
		$r = mysqli_query($dbc, $q);
		
		$image = mysqli_fetch_assoc($r);
		
		return $image;		
		
	}

	function get_listing_thumbs($dbc, $postid, $orientation) {
		
		$q = "SELECT * FROM images WHERE post_id = $postid ORDER BY pos LIMIT 1,3";
		$r = mysqli_query($dbc, $q);
		
		$thumb_number = 1;
		
		while ($image = mysqli_fetch_assoc($r)) {

			if ($orientation == 'h') {
				$size = 'width="157" height="118"';
			} else {
				$size = 'width="118" height="157"';
			}
					
			
			
			echo '<a class="fancybox" data-title-id="title-'.$thumb_number.'" rel="gallery1" title="Sample Title" href="http://'.$_SERVER['HTTP_HOST'].'/uploads/'.$image['filename'].'"><img style="';			
			
			if ($orientation == 'h') {
			
				switch($thumb_number) {
					
					case 1:
						echo 'border-radius:0px 0px 0px 8px;';
					break;
					
					case 2:
						echo '';				
					break;
					
					case 3:
						echo 'border-radius:0px 0px 8px 0px;';				
					break;				
	
				}
			
			} else {
				
				switch($thumb_number) {
					
					case 1:
						echo 'border-radius:0px 8px 0px 0px;';
					break;
					
					case 2:
						echo '';				
					break;
					
					case 3:
						echo 'border-radius:0px 0px 8px 0px;';				
					break;				
	
				}
								
			}
			
			echo '" src="http://'.$_SERVER['HTTP_HOST'].'/uploads/'.$image['filename'].'" '.$size.'></a>';
			echo '<div id="title-'.$thumb_number.'" class="hidden">This is 1st title. <a href="http://google.com">Some link</a></div>';
			
			$thumb_number++;
				
		}
		
	}
	
	function get_listing_locations($dbc, $postid) {

		$q = "SELECT * FROM listing_locations WHERE post_id = $postid LIMIT 1";
		$r = mysqli_query($dbc, $q);
		
		$location = mysqli_fetch_assoc($r);
		
		return $location;
		
	}
	

?>
