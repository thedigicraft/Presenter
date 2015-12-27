<?php

	function get_post_data ($dbc, $post_id, $type) {
		
		if ($type == 8) { // Event Type
		
			$q = "SELECT *, DATE_FORMAT(events.start, '%M %e, %Y') AS display_date, DATE_FORMAT(events.start, '%b') AS themonth, DATE_FORMAT(events.start, '%d') AS theday, DATE_FORMAT(events.start, '%a') AS thedayname, DATE_FORMAT(events.start, '%l:%i %p') AS thetime FROM posts JOIN events ON posts.id = events.new_post_id WHERE posts.id = $post_id";
			$r = mysqli_query($dbc, $q);
		
		} else { // Standard Post Type
		
			$q = "SELECT * FROM posts WHERE id = $post_id";
			$r = mysqli_query($dbc, $q);
			
		}

		$post_data = mysqli_fetch_assoc($r);

		$post_data['tag_array'] = explode(', ', $post_data['tags']);
		
		$post_data['zone_data'] = data_zone($dbc, $post_data['zone']);
		$post_data['cat_name'] = data_cat($dbc, $post_data['cat']);
		
		foreach ($post_data['tag_array'] as $v) {
			
			$post_data['tag_list'] = $post_data['tag_list'].' <a href="'.H.'search.php?search='.$v.'">'.$v.'</a>';
			
		}

		$q = "SELECT * FROM images WHERE post_id = $post_id ORDER BY pos LIMIT 1";
		$r = mysqli_query($dbc, $q);		
		
		if ($r) {  
			
			$image = mysqli_fetch_assoc($r);
			$post_data['image'] = $image['filename'];
			
		}
		
		
		return $post_data;
		
	}
	
	function set_post_view ($dbc, $post_id) {
		
		$q = "UPDATE posts SET views = views + 1 WHERE id = $post_id";
		$r = mysqli_query($dbc, $q);
		
	}
	
		
	function get_user_data ($dbc, $user_id) {
		
		$q = "SELECT * FROM users WHERE id = $user_id";
		$r = mysqli_query($dbc, $q);
			
		$user_data = mysqli_fetch_assoc($r);
		
		// User Title:
		if ($user_data['public'] == 1) {
			
			$user_data['title'] = $user_data['first'].' '.$user_data['last'];
			
		}
		
		
		return $user_data;
		
	}	
		
	function limit_words($string, $word_limit) {
		$words = explode(" ",$string);
		return implode(" ",array_splice($words,0,$word_limit));
	}	
	
	function view_post ($dbc, $post_data, $post_type, $post) {
		
		$thedate = date('Y-m-d H:i:s');
		
		if ($post_data['post_date'] != '0000-00-00 00:00:00' && $post_data['post_date'] <= $thedate) { 
			$show_event = 1;
		}
		
		$body = strip_tags($post_data['body']);
		$author = get_user_data($dbc, $post['user_id']);
		$zone = data_zone($dbc, $post_data['zone']); // Post Advertising Zone
		$cat = data_cat($post_data['cat']); // Post Category		
		
		// Check to see if the link is local or external:
		
		
		if ($post_data['url'] != '') {
			if(substr_count($post_data['url'], 'shore31.com') == 0) { $target = ' target="_blank"'; }
			$title = '<h1><a href="'.$post_data['url'].'"'.$target.'>'.$post_data['title'].'</a></h1>';
		} else {
			$title = '<h1>'.$post_data['title'].'</h1>';
		}
		if ($post_type == 7) {
			$title = '<h1><a href="'.H.$zone['slug'].'/'.$cat.'/'.$post_data['slug'].'">'.$post_data['title'].'</a></h1>';
		}
		
		if ($post_type == 6) { $bg = 'loc'.$post['zone']; }
		if ($post_type == 6) { $bg_clear = 'style="background:none; border:none; box-shadow:none;"'; }
		echo '<div id="post_'.$post_data['id'].'" class="post post_type_'.$post_type.' '.$bg.' ">';
			if ($post_type == 8) { echo '<div class="item event loc'.$post['zone'].'">'; } else { echo '<div class="item" '.$bg_clear.'>'; } 
			
				switch ($post_type) {
					
					case 1: // Standard Post:

						if ($post_data['image']) { echo '<img style="border-radius:8px 8px 0px 0px;" src="'.H.UP.$post_data['image'].'" style="width:100%; height:100%;">'; }
						echo $title;
						echo '<p class="article">'.limit_words($body,20).' ...</p>';
						echo '<p class="readmore"><a href="#">Read more</a></p>';
						if ($post['display_date'] != '') { echo '<p class="byline">Posted: '.$post['display_date'].'</p>'; }
						echo '<div class="tag-list">'.$post_data['tag_list'].'</div>';
						
					break;
					
					case 2: // Video Post:
						echo $title;
						$video = str_replace('http://youtu.be/', '', $post_data['url']);
						echo '<iframe style="border-radius:8px;" width="236" height="180" src="//www.youtube.com/embed/'.$video.'" frameborder="0" allowfullscreen></iframe>';
						
						if ($post['display_date'] != '') { echo '<p class="byline">Posted: '.$post['display_date'].'</p>'; }
						echo '<div class="tag-list">'.$post_data['tag_list'].'</div>';

					break;
					
					case 3: // Article Post:

						echo $title;
						echo '<p>'.limit_words($body,20).' ...</p>';
						echo '<p class="readmore"><a href="http://alan.shore31.com/test-article.php?id='.$post_data['slug'].'">Read more</a></p>';
						if ($post['display_date'] != '') { echo '<p class="byline">Posted: '.$post['display_date'].'</p>'; }
						echo '<div class="tag-list">'.$post_data['tag_list'].'</div>';

					break;										
					
					case 4: // Poster Post:
					
						echo $title;
						if ($post_data['image']) { echo '<img style="border-radius:0px 0px 0px 0px; margin-bottom:10px;" src="'.H.UP.$post_data['image'].'" style="width:100%; height:100%;">'; }
						echo '<div class="tag-list">'.$post_data['tag_list'].'</div>';

					break;		
					
					case 5: // Ad Box Post:

						echo '<p>'.$body.'</p>';

					break;							
										
					case 6: // Quote Post:

						echo '<p style="box-shadow:1px 1px 5px #999999; margin:0px; border-radius:8px 8px 0px 0px;">'.$body.'</p>';
						//echo '<div class="tag-list">'.$post_data['tag_list'].'</div>';
						
					break;

					case 7: // Standard Post:

						if ($post_data['image']) { echo '<img style="border-radius:8px;" src="'.H.UP.$post_data['image'].'" style="width:100%; height:100%;">'; }
						echo $title;
						echo '<p>'.limit_words($body,20).' ...</p>';
						echo '<p class="readmore"><a href="#">Read more</a></p>';
						if ($post['display_date'] != '') { echo '<p class="byline">Posted: '.$post['display_date'].'</p>'; }
						echo '<div class="tag-list">'.$post_data['tag_list'].'</div>';
						
					break;					
					
					case 8: // Event Post: ?>
          
              <a class="calendar_date" href="#">
                  <div class="calendar_month"><?php echo $post_data['themonth']; ?></div>
                  <div class="calendar_number"><?php echo $post_data['theday']; ?></div>
                  <div class="calendar_day"><?php echo $post_data['thedayname']; ?></div>
              </a>                                 
                     
              <h1><span class="loc<?php echo $post_data['zone']; ?>"><?php echo $post_data['title']; ?></span> @ <?php echo $post_data['venue']; ?></h1>
              <p class="display-location">IN <?php echo $zone['name']; ?></p>
              <p class="display-date"><?php echo $post_data['display_date']; ?> @ <?php echo $post_data['thetime']; ?></p>
              
              <?php if ($imagecount >= 1) { ?> <p class="display-image"><img src="<?php echo H; ?>uploads/<?php echo $image['filename']; ?>"/></p> <?php }  ?>
              

              <p class="display-description"><?php echo limit_words($body,40); ?> ...</p>
              <p class="readmore"><a href="#">Read more</a></p>
					<p>
						<?php
                
                social_button($dbc, '22', 'mail', 'Grey', $url);
                social_button($dbc, '22', 'twitter', 'Grey', $url);
                social_button($dbc, '22', 'facebook', 'Grey', $url);
                social_button($dbc, '22', 'google+', 'Grey', $url);
                social_button($dbc, '22', 'instagram', 'Grey', $url);
                social_button($dbc, '22', 'pinterest', 'Grey', $url);				
                
            ?>
          </p>
          
				<?php	break;				
				} ?>

					<?php
				
				 if ($post_type != 8) { ?>
         
          <p style="background:#FFFFFF; <?php if ($post_type == 6) { echo ' box-shadow:1px 1px 5px #999999; margin:0px; border-radius:0px 0px 8px 8px;'; } ?>">        
             <?php
              social_button($dbc, '22', 'mail', 'Grey', $url);
              social_button($dbc, '22', 'twitter', 'Grey', $url);
              social_button($dbc, '22', 'facebook', 'Grey', $url);
              social_button($dbc, '22', 'google+', 'Grey', $url);
              social_button($dbc, '22', 'instagram', 'Grey', $url);
              social_button($dbc, '22', 'pinterest', 'Grey', $url);
              ?>
          </p>
                
			<?php	 }  ?>	
 			 
<?php
			echo '</div>';
		echo '</div>';			

	}


?>