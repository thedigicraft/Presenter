<?php



	function get_listing($dbc, $listingid) {
		
		$q = "SELECT * FROM listings WHERE id = $_GET[listing] LIMIT 1";
		$r = mysqli_query($dbc, $q);
		
		$listing = mysqli_fetch_assoc($r);
		
		return $listing;
				
	}

	function get_listing_images($dbc, $listingid) {
		
		$q = "SELECT * FROM listing_images WHERE listing_id = $listingid LIMIT 1";
		$r = mysqli_query($dbc, $q);
		
		$image = mysqli_fetch_assoc($r);
		
		return $image;		
		
	}

	function get_listing_thumbs($dbc, $listingid, $orientation) {
		
		$q = "SELECT * FROM listing_images WHERE listing_id = $listingid LIMIT 1,3";
		$r = mysqli_query($dbc, $q);
		
		$thumb_number = 1;
		
		while ($image = mysqli_fetch_assoc($r)) {

			if ($orientation == 'h') {
				$size = 'width="157" height="118"';
			} else {
				$size = 'width="118" height="157"';
			}
			
			echo '<a class="fancybox" rel="gallery1" href="images/Listings/'.$image['filename'].'"><img style="';			
			
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
			
			echo '" src="images/Listings/'.$image['filename'].'" '.$size.'></a>';
			
			$thumb_number++;
				
		}
		
	}
	
	function get_listing_locations($dbc, $listingid) {

		$q = "SELECT * FROM listing_locations WHERE listing_id = $listingid LIMIT 1";
		$r = mysqli_query($dbc, $q);
		
		$location = mysqli_fetch_assoc($r);
		
		return $location;
		
	}
	

?>
