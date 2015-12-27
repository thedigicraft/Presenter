<?
error_reporting(0);
include('../functions/preload.php');
$path = parse_path();
if(!isset($path['call_parts'][0]) || $path['call_parts'][0] == '' ) {
    $screen = 'default';
  }else{
    $screen = $path['call_parts'][0];
  }
?>
<!doctype html>
<html>
<head>
  
  <!-- Meta Data -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  
  <meta name="description" content="">
  <!-- END Meta Data -->

  <title>Presenter 0.1</title> 
  <link rel="icon" type="image/png" href="../logo.png">
  <!-- Google Web Fonts -->
  <link rel="stylesheet" type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,700,800,600,300'>
  
  <!-- Bootstrap 3.0 -->
  <link rel="stylesheet" type="text/css" href="http://localhost/dev/Presenter/css/atom.cms3.css">
  
  <!-- Social Icons
  <link rel="stylesheet" type="text/css" href="http://localhost/dev/Presenter/css/socialbuttons.css"> -->

  <!-- Font Awesome 4.0 -->
  <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.1/css/font-awesome.min.css"> 

  <style>
  h2:first-child{
    margin:0px;
    padding:0px;
  }
    body{
      padding: 2%;
      background: #523ce0;
      color: black;
      background-image:url(data/bg.jpg);
      background-size:cover;
      overflow: hidden;
      
    }
    body,pre{color: white;
    font-size: 3.5vw;
    font-weight:bold;
    text-shadow:0px 0px 10px #000;
    }
    h2{color: white;
    font-size: 4.5vw;
    font-weight:bold;
    }
    p{
     margin:10px;
    }
    
    
  </style>

  <!-- JQuery -->
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  
  <!-- Bootstrap 3.0 -->
  <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

  <script>
  
    function screen_load(){
      $.ajax({
        cache: false,
        type: 'get',
        url: "ajax/bg.php?id=<?=$screen?>",
        success:function(result){
          console.log(result);
          if(result != ''){
            $('body').css('background-image', 'url(../bg/'+result+')');
          }
        }
      });      
      $('#loader').load('ajax/screen.php?id=<?=$screen?>');
    }
    
    $(document).ready(function(){
      
      screen_load();
      
      setInterval(function(){  
        screen_load();
      }, 1000); 
       
    });
    
  </script>
  
</head>

<body id="loader">