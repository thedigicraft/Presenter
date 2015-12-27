<?php include('config/setup.php'); // Site & Page initialization. ?>

<!doctype html>
<html>
<head>
	
	<!-- Meta Data -->
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
	
	<meta name="description" content="<?php echo $desc; ?>">
	<!-- END Meta Data -->

	<title>Presenter 0.1</title>
  <link rel="icon" type="image/png" href="<?=H?>logo.png">
  
	<?php include('config/css.php'); ?>

	<?php include('config/js.php'); ?>
  
</head>

<body>

<?php //include('config/debug.php'); ?>

<?php include('components/navigation.php'); // Site Naviagtion. ?>