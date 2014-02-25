<?php
	require_once('../config.php');
	$pagetitle = "Varor | Matkassen.se";
	$categoryID = null;	
	$itemsbycat = null;
	

?>
<?php require_once(ROOT_PATH.'/header.php'); ?>

<br/>
<div class="row">
<div class="col-md-6 col-md-offset-4">
  <div><h2>Kategorin innehåller Produkter</h2></div>
</div> 
</div> 
<br/>

<div class="row">
  <div class="col-md-6 col-md-offset-3"><h2>Den här Kategorin har produkter kopplade till sig och kan därför inte tas bort!</h2></div>
  <div class="row">
  	<div class="col-md-3 col-md-offset-5"><a href="administrator.php"><h4>Tillbaka</h4></a></div>
  </div>
</div>

<?php require_once(ROOT_PATH.'/footer.php'); ?>