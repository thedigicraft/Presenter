<?

function playlist_views($id){
  $base = 'https://www.googleapis.com/youtube/v3';
  $ext = '/playlistItems?part=snippet&maxResults=50&playlistId='.$id.'&key='.GKEY;
  $json = file_get_contents($base.$ext);
  $test = json_decode($json, 1);  
  $data = 0;
  foreach($test['items'] as $item){
    $data = $data + video_views($item['snippet']['resourceId']['videoId']);
  }
  return $data;
}
function video_views($id){
  $base = 'https://www.googleapis.com/youtube/v3';
  $ext = '/videos?part=statistics&maxResults=50&id='.$id.'&key='.GKEY;
  $json = file_get_contents($base.$ext);
  $test = json_decode($json, 1);  
  foreach($test['items'] as $item){
    $data = $item['statistics']['viewCount'];
  }
  return $data;
}

function build_playlist($data){

  $views = $english_format_number = number_format($data['views']);
  $span = 2592000;
  $stamp = date('U', strtotime($data['snippet']['publishedAt']));
  $now = date('U', time());
  if(($now - $stamp)<= $span){
    $label = '<br> <small class=" label label-success">NEW</small> ';
  }
  $date = date('M j, Y', strtotime($data['snippet']['publishedAt']))?>
   
  <div class="media" style="margin-top:20px;">
    <div class="media-left">
      <a target="_blank" href="https://www.youtube.com/playlist?list=<?=$data['id']?>">
        <img style="width:240px;" class="media-object" src="<?=$data['snippet']['thumbnails']['medium']['url']?>">
      </a>
    </div>
    <div class="media-body">
      <h4 class="media-heading"><small class="text-right pull-right">Published: <?=$date?><?=$label?></small>
        <a target="_blank" href="https://www.youtube.com/playlist?list=<?=$data['id']?>"><?=$data['snippet']['title']?></a>
          <br><small><?=$data['contentDetails']['itemCount']?> Videos - <span>Views: <?=$views?></span></small>
      </h4>
      <div><?=substr($data['snippet']['description'], 0, 300)?>...</div>
      <div>
        
        
        <span>By: <a target="_blank" href="https://www.youtube.com/<?=$data['snippet']['channelTitle']?>"><?=$data['snippet']['channelTitle']?></a></span> 
        
        
      </div>
    </div>
  </div>   
  
 
<?}

function save($data, $target){
  $json = json_encode($data);
  $file = fopen('data/'.$target, "w");
  fwrite($file, $json);
}

?>