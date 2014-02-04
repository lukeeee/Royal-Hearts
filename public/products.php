<?php
	require_once('../config.php');
	$pagetitle = "Varor | Matkassen.se";
	$categoryID = null;	
	$itemsbycat = null;
	
	if(isset($_GET['catid'])){
		$categoryID = $_GET['catid'];	
		$itemsbycat = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/foodproduct/getbycat/".$categoryID),true); 
	}
	$categories = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/category/getall"),true); 
	
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
  	<div class="list-group">
  	<?php foreach ($categories as $category) {
  		if($categoryID == $category["id"]){
  			echo '<a href="products.php?catid='.$category["id"].'" class="list-group-item active">'.$category["name"].'</a>';				
  		} else {
  			echo '<a href="products.php?catid='.$category["id"].'" class="list-group-item">'.$category["name"].'</a>';				
  		}
	} ?>
  
	</div>
  </div>
  <div class="col-md-6">
  <?php if($itemsbycat != null || count($itemsbycat)) : ?>
<table class="table">
<thead>
	<tr>
		<th>Produkt</th>
		<th></th>
	</tr>
	</thead>
	<tbody>
	<form class="form-horizontal"  method="post" action="run.php">
  <section class="contact">
    <fieldset>
        <input type="hidden" name="itemid" value="1<?php // echo $itembycat['id'] ?>">
	  			<tr><td><?php //echo $itembycat["name"] ?></td><td>
	  			<input id="quantity" name="quantity">
	  			<button type="submit" class="btn"><span class="glyphicon glyphicon-plus"></span></button>
			 	</td></tr>
		
    </fieldset>
	<?php // foreach ($itemsbycat as $itembycat) : ?>
		<!--<form class="form-horizontal" method="get" action="run.php">
			<input type="hidden" name="itemid" value="1<?php // echo $itembycat['id'] ?>">
	  			<tr><td><?php //echo $itembycat["name"] ?></td><td>
	  			<input id="quantity" name="quantity">
	  			<button type="submit" class="btn"><span class="glyphicon glyphicon-plus"></span></button>
			 	</td></tr>
		
	-->
	<?php // endforeach ?>
	</form>
<?php endif ?>
</tbody>
</table>
  </div>
  <div class="col-md-3"></div>
  
</div>

<?php require_once(ROOT_PATH.'/footer.php'); ?>