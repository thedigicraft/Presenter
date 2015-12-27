<?php
# Return a FontAwesome icon:
function i($code){
  $icon = '<i class="fa fa-'.$code.'"></i>';
  return $icon;
}


	function amazon_link ($id) {

		
		$url_link = 'http://www.amazon.com/gp/product/'.$id.'/ref=as_li_qf_sp_asin_il?ie=UTF8&camp=1789&creative=9325&creativeASIN='.$id.'&linkCode=as2&tag='.AMZ_TAG;
		$url_thumb = 'http://ws-na.amazon-adsystem.com/widgets/q?_encoding=UTF8&ASIN='.$id.'&Format=_SL160_&ID=AsinImage&MarketPlace=US&ServiceVersion=20070822&WS=1&tag='.AMZ_TAG;
		$url_image = 'http://ir-na.amazon-adsystem.com/e/ir?t='.AMZ_TAG.'&l=as2&o=1&a='.$id;
		
		?>
    
<a class="pull-left" href="<?php echo $url_link; ?>" target="_blank"><img class="media-object img-thumbnail" border="0" src="<?php echo $url_thumb; ?>" >
<img src="<?php echo $url_image; ?>" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" /></a>

    
    
<?php 

}

	function amazon_block ($id, $title, $author, $body) { 
		$body = substr($body, 0, 200); 
		$url_link = 'http://www.amazon.com/gp/product/'.$id.'/ref=as_li_qf_sp_asin_il?ie=UTF8&camp=1789&creative=9325&creativeASIN='.$id.'&linkCode=as2&tag='.AMZ_TAG;

		?>

    <div class="col-lg-6">
      <div class="media">
        <?php amazon_link ($id); ?>
        <div class="media-body">
          <h3 class="media-heading"><?php echo $title; ?><br>
            <small>by: <?php echo $author; ?></small>
          </h3>
          <h4>Book Description <small>(from Amazon.com)</small></h4>
          <p><?php echo $body.'...'; ?></p>
          <p class="pull-right" style="margin-bottom:10px;"><a href="<?php echo $url_link; ?>" target="_blank" class="btn btn-primary btn-md pull-right" role="button">Read more &raquo;</a></p>
        </div>
      </div>
    </div>

<?php 

}
	function amazon_item ($id, $title, $author, $body) { 
		$body = substr($body, 0, 200); 
		$url_link = 'http://www.amazon.com/gp/product/'.$id.'/ref=as_li_qf_sp_asin_il?ie=UTF8&camp=1789&creative=9325&creativeASIN='.$id.'&linkCode=as2&tag='.AMZ_TAG;

		?>

    <div class="col-lg-6">
      <div class="media">
        <?php amazon_link ($id); ?>
        <div class="media-body">
          <h3 class="media-heading"><?php echo $title; ?><br>
            <small>by: <?php echo $author; ?></small>
          </h3>
          <h4>About</h4>
          <p><?php echo $body.'...'; ?></p>
          <p class="pull-right" style="margin-bottom:10px;"><a href="<?php echo $url_link; ?>" target="_blank" class="btn btn-primary btn-md pull-right" role="button">Read more &raquo;</a></p>
        </div>
      </div>
    </div>

<?php 

}


	function share_links($url, $t, $handle, $network, $size) {
		
		echo '<a href="';
		
		switch($network) {
			
			case 'twitter':
			
				echo 'https://twitter.com/intent/tweet?';
				echo 'url='.$url;
				echo '&text='.$t;
				echo '&via='.$handle;
				//echo '" target="_blank" class="sb twitter circle">Twitter';
				echo '" target="_blank" class=""><i class="fa fa-twitter-square s-twitter '.$size.'"></i>';
			
			break;
			
			case 'facebook':
			
				echo 'https://facebook.com/sharer.php?';
				echo 'u='.$url;
				//echo '&text='.$text;
				//echo '&via='.$handle;
				echo '" target="_blank" class=""><i class="fa fa-facebook-square s-facebook '.$size.'"></i>';
			
			break;
			
			case 'google':
			
				echo 'https://plus.google.com/share?';
				echo 'u='.$url;
				//echo '&text='.$text;
				//echo '&via='.$handle;
				echo '" target="_blank" class=""><i class="fa fa-google-plus-square s-google '.$size.'"></i>';
			
			break;
			
			case 'pinterest':
			
				echo 'https://plus.google.com/share?';
				echo 'u='.$url;
				//echo '&text='.$text;
				//echo '&via='.$handle;
				echo '" target="_blank" class=""><i class="fa fa-pinterest-square s-pinterest '.$size.'"></i>';
			
			break;									
			
		}
		
		echo '</a>';
		
	}


	function get_page_title($zone, $cat, $post) {
		
		$data = '';
		
		if ($_GET['id']) { $data .= $post['title'].' - '; }
		if ($_GET['cat']) { $data .= $cat.' in '; }
		if ($_GET['zone']) { $data .= $zone['name'].' at '; }
		
		return $data;
		
	}
	
	function is_selected($source, $target) {
		 if ($source == $target) { echo ' selected'; } 
	}

	function data_post_image($dbc, $postid) {
		

		$q = "SELECT * FROM images WHERE post_id = $postid ORDER BY pos LIMIT 1";
		$r = mysqli_query($dbc, $q);
		
		$image = mysqli_fetch_assoc($r);
		
		return $image;		
		
	}


	function search_zones ($dbc, $parent) {

		$q = "SELECT * FROM zones WHERE parent = $parent";
		$r = mysqli_query($dbc, $q);
				
		$loc = " AND (";
		
		$num = mysqli_num_rows($r);
		
		$count = 0;
		
		while($zone = mysqli_fetch_assoc($r)) {
			
			$count++;
			if ($count == 1) { $loc .= " zone = $zone[id] "; }
			else { $loc .= " OR zone = $zone[id] "; }
			
		} 
		
		$loc .= ") ";
		
		return $loc;
		
	}
	
	
	function rand_child_zone ($dbc, $parent) {

		$q = "SELECT * FROM zones WHERE parent = $parent ORDER BY RAND() LIMIT 1";
		$r = mysqli_query($dbc, $q);
				
		$data = mysqli_fetch_assoc($r);
		
		return $data;
		
	}	
	

	function search_oxzones ($dbc, $parent) {



		$q = "SELECT * FROM zones WHERE parent = $parent";
		$r = mysqli_query($dbc, $q);
				
		$loc = " ";
		
		$num = mysqli_num_rows($r);
		
		$count = 0;
		
		while($zone = mysqli_fetch_assoc($r)) {
			
			$count++;
			if ($count == 1) { $loc .= " keyword LIKE '%$zone[name]%' "; }
			else { $loc .= " OR keyword LIKE '%$zone[name]%' "; }
			
		} 
		
		$loc .= " ";
		
		return $loc;
		
	}


	function post_imagecount($dbc, $postid) {		
		$q = "SELECT * FROM images WHERE post_id = $postid";
		$r = mysqli_query($dbc, $q);
		
		$count = mysqli_num_rows($r);
		return $count;
	}

	function social_button($dbc, $size, $type, $color, $url, $post, $post_type, $zone, $cat) {
		
		$image_size = $size.'x'.$size;
		$image_css = 'style="width:'.$size.'px; height:'.$size.'px; border-radius:2px;"';
		$image_html = '<img src="http://'.$_SERVER['HTTP_HOST'].'/images/Social_Buttons/Social_'.$color.'/'.$type.$image_size.'.jpg" '.$image_css.' alt="Share This on '.$type.'" title="'.$type.' Icon">';
		
		
		if($post_type == 'image') { $shared_url = 'http://alan.shore31.com/uploads/'.$url; }
		
		else if ($post_type == 'event') { $shared_url = 'http://alan.shore31.com/calendar/'.$loc['name'].'/'.$post['slug']; }
		
		else if ($post_type == 'listing') { $shared_url = H.$zone['slug'].'/'.$cat.'/'.$post['slug']; }
		
		else { $shared_url = H.$zone['slug'].'/'.$cat.'/'.$post['slug']; }
		
		
		switch($type) {
	
			case 'mail': // Email Button ?>
			
				<a href="mailto:notrealemail@com.com"><?php echo $image_html; ?></a>
			
			<?php break;
			   
			case 'twitter': // Twitter Button ?>    
					
				<a href="http://twitter.com/share?url=<?php echo $shared_url; ?>&text=<?php echo $post['title']; ?>&via=launchShore31" target="_blank" alt="Tweet This!" title="Tweet This!"><?php echo $image_html; ?></a>
				
			<?php break;
			   
			case 'facebook': // Facebook Button ?>            
				
				<a href="http://www.facebook.com/sharer.php?u=<?php echo $shared_url; ?>&t=<?php echo $post['title']; ?>" target="_blank" title="Share This on Facebook"><?php echo $image_html; ?></a>
				
			<?php break;
			   
			case 'google+': // Google + Button ?>
				
				<a href="https://plus.google.com/share?url=<?php echo $shared_url; ?><?php echo $image['filename']; ?>" target="_blank" title="Post it on Google+"><?php echo $image_html; ?></a>
										   
			<?php break;
			
			
			case 'instagram': // Google + Button ?>
				
				<a href="https://plus.google.com/share?url=<?php echo $shared_url; ?><?php echo $image['filename']; ?>" target="_blank" title="Post it on Google+"><?php echo $image_html; ?></a>
										   
			<?php break;			
			   
			case 'stumbleupon': // Stumple Upon Button ?>
	
				<a href="http://www.stumbleupon.com/submit?url=<?php echo $shared_url; ?><?php echo $image['filename']; ?>&title=<?php echo $post['title']; ?>" target="_blank" title="Submit This to StumbleUpon"><?php echo $image_html; ?></a>                                       
	
			<?php break;
	   
			case 'pinterest': // Pinterest Button ?>                     
						 
				<a href="//pinterest.com/pin/create/button/?url=http%3A%2F%2Fhttp://alan.shore31.com/listing.php?listing=2&
				media=http%3A%2F%2F<?php echo $shared_url; ?>&
				description=Next%20stop%3A%20Pinterest"data-pin-do="buttonPin"data-pin-config="above"><?php echo $image_html; ?></a>
		
			<?php 
			
		}
				
	}

	
function series_link ($dbc, $id) {
	
	$q = "SELECT id,slug,type FROM series WHERE id = '$id'";
	$r = mysqli_query($dbc, $q);
	
	$series = mysqli_fetch_assoc($r);	
	
	$q = "SELECT id,slug FROM chapters WHERE series = '$series[id]' ORDER BY pos ASC LIMIT 1";
	$r = mysqli_query($dbc, $q);
	
	$chapter = mysqli_fetch_assoc($r);	
	
	//if ($series['type'] == 3) {
		//$q = "SELECT slug FROM lessons WHERE chapter = '$chapter[id]' ORDER BY pos DESC LIMIT 1";
	//} else {
		$q = "SELECT slug FROM lessons WHERE chapter = '$chapter[id]' ORDER BY pos ASC LIMIT 1";
	//}
	$r = mysqli_query($dbc, $q);
	
	$lesson = mysqli_fetch_assoc($r);			
	
	$link = H.'series/'.$series['slug'].'/'.$chapter['slug'].'/'.$lesson['slug'];
	
	return $link;
		
}
?>
