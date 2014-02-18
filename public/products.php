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
  <?php if($itemsbycat != null || count($itemsbycat) != 0) : ?>
  	<form class="form-horizontal" method="post" action="run.php">
<table class="table">
<thead>
	<tr>
		<th></th>
		<th>Produkt</th>
		<th>Antal</th>
	</tr>
	</thead>
	<tbody>

	<input type="hidden" name="userid" id="userid" value="<?php if(isset($_SESSION['id']))echo $_SESSION['id'] ?>">
	<?php  foreach ($itemsbycat as $itembycat) : ?>
	  			<tr>
		  			<td><?php echo checkbox('checkbox', 'itemid[]', $itembycat['id']); ?></td>
		  			<td><?php echo $itembycat["name"] ?></td>
		  			<td><input id="quantity_<?php echo $itembycat['id'] ?>" name="quantity_<?php echo $itembycat['id'] ?>" class="inputsam" value="1"></td>
	  			</tr>
	<?php endforeach ?>
</tbody>
</table>
<button type="submit" class="btn">
	  				<i class="glyphicon-plus"></i>
	  			</button>
</form>	
<?php endif ?>
<?php if($itemsbycat = null || count($itemsbycat) == 0 ) : ?>
	Välj kategori i menyn
<?php endif ?>
  </div>
  <div class="col-md-3"></div>
  
</div>

<?php require_once(ROOT_PATH.'/footer.php'); ?>