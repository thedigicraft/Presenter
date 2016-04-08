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
  <link rel="stylesheet" type="text/css" href="../css/atom.cms3.css">
  <link rel="stylesheet" type="text/css" href="js/jquery.counter-analog.css">
  <link rel="stylesheet" type="text/css" href="js/jquery.counter-analog2.css">  
  
  <!-- Social Icons
  <link rel="stylesheet" type="text/css" href="http://localhost/dev/Presenter/css/socialbuttons.css"> -->

  <!-- Font Awesome 4.0 -->
  <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.1/css/font-awesome.min.css"> 

  <style>

    
    
  </style>

  <!-- JQuery -->
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script type="text/javascript" src="js/jquery.counter.js"></script>
  
  <!-- Bootstrap 3.0 -->
  <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

  <script>
  

    
    $(document).ready(function(){
      
$('.counter').counter({});
    });
    
  </script>
  
</head>

<body id="loader">