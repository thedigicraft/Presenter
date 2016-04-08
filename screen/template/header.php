<?
error_reporting(0);
include('../config/conn.php');
include('../functions/preload.php');
include('../functions/data.php');
$path = parse_path();
if(!isset($path['call_parts'][0]) || $path['call_parts'][0] == '' ) {
    $screen = 'default';
  }else{
    $screen = $path['call_parts'][0];
  }
$s = data_screen($dbc, $screen);
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
  <link rel="stylesheet" type="text/css" href="../css/atom.cms3.css">
  <link rel="stylesheet" type="text/css" href="../js/jquery.counter-analog.css">
  <link rel="stylesheet" type="text/css" href="../js/jquery.counter-analog2.css">  
  
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
    .counter{

    }
    
<?if($s['type']==2){?>
#loader{ position:absolute;top:25%; left:0; width:100%; z-index:4; height:1080px; overflow:hidden; }
<?}?>    
#bg_container{ position:absolute;top:0; left:0; width:100%; z-index:0; height:1080px; overflow:hidden; }
#bg{ width:100%; height:100%; }

 .clock { position:absolute; width:100%; z-index: 3;}
 #footer{
   position:absolute;
   text-align:center;
   width:100%;
   bottom:0;
   right:0;
   font-size: 9.5vw;
   z-index: 2;
 }

#Date { font-family:'BebasNeueRegular', Arial, Helvetica, sans-serif; font-size:36px; text-align:center; text-shadow:0 0 5px #333; }

ul { width:100%; margin:0 auto; padding:0px; list-style:none; text-align:center; }
ul li { display:inline; font-size:6.7vw; text-align:center; font-family:'BebasNeueRegular', Arial, Helvetica, sans-serif; text-shadow:0 0 5px #333; }

#point { position:relative;padding-left:10px; padding-right:10px; }

@-webkit-keyframes mymove 
{
0% {opacity:1.0; text-shadow:0 0 20px #00c6ff;}
50% {opacity:0; text-shadow:none; }
100% {opacity:1.0; text-shadow:0 0 20px #00c6ff; }  
}


@-moz-keyframes mymove 
{
0% {opacity:1.0; text-shadow:0 0 20px #00c6ff;}
50% {opacity:0; text-shadow:none; }
100% {opacity:1.0; text-shadow:0 0 20px #00c6ff; }  
}   
  </style>

  <!-- JQuery -->
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  
  <!-- Bootstrap 3.0 -->
  <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/counter.js"></script>
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
      
      
// Create two variable with the names of the months and days in an array
var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ]; 
var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]

// Create a newDate() object
var newDate = new Date();
// Extract the current date from Date object
newDate.setDate(newDate.getDate());
// Output the day, date, month and year    
$('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

setInterval( function() {
  // Create a newDate() object and extract the seconds of the current time on the visitor's
  var seconds = new Date().getSeconds();
  // Add a leading zero to seconds value
  $("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
  },1000);
  
setInterval( function() {
  // Create a newDate() object and extract the minutes of the current time on the visitor's
  var minutes = new Date().getMinutes();
  // Add a leading zero to the minutes value
  $("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
    },1000);
  
setInterval( function() {
  // Create a newDate() object and extract the hours of the current time on the visitor's
  var hours = new Date().getHours();
  // Add a leading zero to the hours value
  $("#hours").html(( hours < 10 ? "0" : "" ) + hours);
    }, 1000);
    
    
      <?/*   
      <?if($s['type']==2){?>
        $('.counter').timer({
          <?if(isset($_GET['start'])){?>
            seconds: <?=$_GET['start']*60?>,
          <?}?>
          format: '%H:%M:%S'
        });
      <?}?>
     
       */?>
      screen_load();
      
      setInterval(function(){  
        screen_load();
      }, 1000); 
       
    });
    
  </script>
  
</head>
<?if($s['type']!=2){?>
<body id="loader">
<?}else{?>
<body>
<!--
<div id="bg_container">
  <iframe id="bg" src="//www.youtube.com/embed/B7L45EiMXGo?autoplay=1&amp;controls=0&amp;loop=1&amp;showinfo=0&amp;modestbranding=1&amp;disablekb=1&amp;enablejsapi=1&amp;playlist=PLAYLIST_ID_HERE" frameborder="0"></iframe>
</div>
-->
  <span class="counter">
<div class="clock">
<div id="Date"></div>

<ul>
  <li id="hours"> </li>
    <li id="point">:</li>
    <li id="min"> </li>
    <li id="point">:</li>
    <li id="sec"> </li>
</ul>

</div>
    
    
  </span>
  <div id="footer">
    LOG
  </div>
  <div id="loader"></div>      
<?}?>