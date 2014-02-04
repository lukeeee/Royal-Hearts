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
  	<ul class="nav nav-pills nav-stacked">
  	<?php foreach ($categories as $category) {
  		if($categoryID == $category["id"]){
  			echo '<li class="active"><a href="products.php?catid='.$category["id"].'">'.$category["name"].'</a></li>';				
  		} else {
  			echo '<li><a href="products.php?catid='.$category["id"].'">'.$category["name"].'</a></li>';				
  		}
	} ?>
  
</ul>
  </div>
  <div class="col-md-6">
  <?php if($itemsbycat != null || count($itemsbycat)) : ?>
<table class="table">
	<tr>
		<th>Produkt</th>
		<th></th>
	</tr>
	<tbody>
	<form class="form-horizontal" method="get" action="run.php">
	<?php foreach ($itemsbycat as $itembycat) : ?>
    </form>
		<!--<div class="form-group">
		<input type="hidden" name="itemid" value="<?php echo $itembycat["id"] ?>">
  			<tr><td><?php echo $itembycat["name"] ?></td>
  			<td>
	  			<input id="quantity" name="quantity" type="form-control" placeholder="" value="1" class="input-mini search-query">
	  			<button type="submit" class="btn "><span class="glyphicon glyphicon-plus"></span></button>
		 	</td></tr>
		 	<div> -->
		 
	
<?php endforeach ?>
</form>
<?php endif ?>
</tbody>
</table>
  </div>
  <div class="col-md-3"></div>
  
</div>

<?php require_once(ROOT_PATH.'/footer.php'); ?>