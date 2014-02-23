<?php
	require_once('../config.php');
	$pagetitle = "Varor | Matkassen.se";
	$categoryID = null;	
	$itemsbycat = null;
	
	
	if($_SESSION['is_logged_in'])
	{
		if($_SESSION['privilege']==3)
		{
			$manInfo = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/manager/getInfo/".$_SESSION['id']),true);
			//storeName, sotreId, userId, city_storeID
		}
		
		else
		{
			header("Location: index.php");
		}
	}
	else
	{
		header("Location: login.php");
	}
	
	
	
	if(isset($_GET['catid'])){
		$categoryID = $_GET['catid'];	
		$itemsbycat = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/manager/getProductsByCat/".$categoryID."/".$manInfo['city_storeID']),true); 
	}
	
	$categories = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/category/getall"),true); 
	
?>
<?php require_once(ROOT_PATH.'/header.php'); ?>

<br/>
<div class="row">
<div class="col-md-6 col-md-offset-4">
  <div><h2>Lägg till varor i din butik</h2></div>
</div> 
</div> 
<br/>

<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-2">
  	<div class="list-group">
  	<?php 
	
	
	
	//$_SESSION['privilege'] = $user['privilege'];	//stores user privilege in session
	//$_SESSION['username'] = $user['username'];		//stores username in session
	//$_SESSION['id'] = $user['id'];	//stores user id in session
	
	
	foreach ($categories as $category) 
	{
  		if($categoryID == $category["id"]){
  			echo '<a href="manager.php?catid='.$category["id"].'" class="list-group-item active">'.$category["name"].'</a>';				
  		} else {
  			echo '<a href="manager.php?catid='.$category["id"].'" class="list-group-item">'.$category["name"].'</a>';				
  		}
	} ?>
  
	</div>
  </div>
  <div class="col-md-6">
  <?php if($itemsbycat != null || count($itemsbycat) != 0) : ?>
  	<form class="form-horizontal" method="post" action="run.php?func=manager_update_products&city_storeID=<?php echo  $manInfo['city_storeID'];?>">
<table class="table">
<thead>
	<tr>
		<th></th>
		<th>Produkt</th>
		<th>Pris</th>
	</tr>
	</thead>
	<tbody>

	<input type="hidden" name="userid" id="userid" value="<?php echo $_SESSION['id'];
	 
	?>">
	<?php  foreach ($itemsbycat as $itembycat) : ?>
   
	  			<tr>
		  			<td><?php 
					if($itembycat['for_sale']==1)
					{
						
						$checked="checked";
					
					}
					else
					{
						$checked="";

					}
					
					echo checkbox('checkbox', 'itemid[]', $itembycat['id'],$checked); 
					?></td>
		  			<td><?php echo $itembycat["name"] ?></td>
		  			<td><input id="quantity_<?php echo $itembycat['id'] ?>" name="price[]" class="inputsam" value="<?php echo $itembycat['price'] ?>"><h7>Kr</h7></td>
	  			</tr>
	  			<!--Ska ändras i action run.php och input pris grejen-->
	<?php endforeach ?>
</tbody>
</table>
<button type="submit" class="btn" value="update">
	  				Update
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