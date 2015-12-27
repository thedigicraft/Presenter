<?php

############################################################
## Setup 
############################################################
##
## 1. Page Initializtion.
## 2. Site Functions.
##
############################################################


	############################################################
	## Site Initialization 
	############################################################
	error_reporting(0);
	include('config/conn.php'); // Database Connections.
	include('functions/preload.php'); // Functions needed to initialize.
	include('config/global.php'); // Constants

	$path = parse_path();

		
	############################################################
	## Site Functions 
	############################################################
	
	include('functions/tools.php'); // Utility Functions.
	include('functions/data.php'); // Data Functions.
	include('functions/sandbox.php'); // Sandbox Functions (yet to be organized).

	############################################################
	## Page Initialization 
	############################################################
	
  if(!isset($path['call_parts'][0]) || $path['call_parts'][0] == '' ) {
    
    //$path['call_parts'][0] = 'home'; // Set $path[call_parts][0] to equal the value given in the URL
    header('Location: home');
    $view = 'home';
  }else{
    $view = $path['call_parts'][0];
  }
  if(!isset($path['call_parts'][1]) || $path['call_parts'][1] == '' ) {
    $screen = data_screen($dbc, 'default');
  }else{
    $screen = data_screen($dbc, $path['call_parts'][1]);
  }
  $screens = data_screens($dbc);
	
?>