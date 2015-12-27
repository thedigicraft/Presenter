<? include('template/header.php'); // Site & Page initialization. ?>

<?
if($view != 'screen'){
  include('views/'.$view.'.php'); // View Type
}
?>


<? include('template/footer.php'); // Site/Page Footer ?>