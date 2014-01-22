<?php
	require_once('../config.php');
	$pagetitle = "Varor | Matkassen.se"
?>
<?php require_once(ROOT_PATH.'/header.php'); ?>

<br/>
<div class="row">
<div class="col-md-6 col-md-offset-4">
  <div><h2>Lägg till varor i matkassen</h2></div>
</div> 
</div> 
<br/>

<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-2">
  	<ul class="nav nav-pills nav-stacked">
  <li class="active"><a href="#">Mejeri</a></li>
  <li><a href="#">Frukt & Grönt</a></li>
  <li><a href="#">Kött & Fisk</a></li>
</ul>
  </div>
  <div class="col-md-6">
<table class="table">
<tr>
<th>Header 1</th>
<th>Header 2</th>
<th>Header 3</th>
</tr>
	<tr>
	<td>row 1, cell 1</td>
	<td>row 1, cell 2</td>
	<td>row 1, cell 3</td>
	</tr>
	<tr>
	<td>row 2, cell 1</td>
	<td>row 2, cell 2</td>
	<td>row 2, cell 3</td>
	</tr>
</table>
  </div>
  <div class="col-md-3"></div>
  
</div>

<?php require_once(ROOT_PATH.'/footer.php'); ?>