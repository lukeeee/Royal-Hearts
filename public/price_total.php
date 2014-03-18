<?php
	require_once('../config.php');
	$pagetitle = "priceTotal | Matkassen.se";
	$categoryID = null;	
	$itemsbycat = null;
	
	
	if($_SESSION['is_logged_in'])
	{
		if($_SESSION['privilege']==0)
		{
			$manInfo = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/manager/getInfo/".$_SESSION['id']),true);
			$FB = $_SESSION['foodbasket'];
			//var_dump($FB);
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
	
	
	
	if(isset($_GET['cityid'])){
		$cityID = $_GET['cityid'];	
		$itemsbycity = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/store/getbycity/".$cityID),true); 
	}
	
	$cities = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/city/getall" ),true); 
	
?>
<?php require_once(ROOT_PATH.'/header.php'); ?>

<br/>
<div class="row">
<div class="col-md-6 col-md-offset-4">
  <div><h2>Jämför pris på din matkassa</h2></div>
  
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
	
	
	foreach ($cities as $city) 
	{
  		if(isset ($cityID) && $cityID == $city["id"]){
  			echo '<a href="price_total.php?cityid='.$city["id"].'" class="list-group-item active">'.$city["name"].'</a>';				
  		} else {
  			echo '<a href="price_total.php?cityid='.$city["id"].'" class="list-group-item">'.$city["name"].'</a>';				
  		}
	} ?>
  
	</div>
  </div>
  <div class="col-md-6">
  <?php if(isset($_GET['cityid'])) : //$_SESSION['foodbasket'] = $foodbasket;?>
  <?php $FBbyStore = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/foodbasket/getByCity/".$_SESSION['id']."/".$cityID),true); 
	
  
  ?>
<table class="table">
<thead>
	<tr>
		<th><?php
		
		
		if($FBbyStore['items'] == null)
		{
			echo "Det finns inga varor i din korg.";
		}
		else
		{
			echo "Butiksnamn";
			
		}
		?></th>
		<th>Total</th>
	</tr>
	</thead>
	<tbody>

	<input type="hidden" name="userid" id="userid" value="<?php echo $_SESSION['id'];
	 
	?>">
    
    <?php if($FBbyStore['items'] != null): ?>
		<tr>
		<?php  
		
		function summa($id,$FB)
		{
			$totalByStore = 0;
			foreach($FB as $item)
			{
				if($item['store'] == $id)
				{
					$totalByStore+=$item['price']*$item['quantity'];
				}
			}
			return $totalByStore;
		
		}
		
		$storeArr = SortStores($FBbyStore['items']);
		
		?>
                        <?php 
						foreach($storeArr['stores'] as $store)
						{
							
							$summa = summa($store['id'],$FBbyStore['items']);
							 echo "<tr><td>".$store['name']."</td>";
							echo "<td>".$summa." kr.</td></tr>";
							
						}
						/* echo "<td>".$FBbyStore['items']['storeName']."</td>";
						
						 $totalByStore=0;*/
		
						
						?>


       	 </tbody>
        </table>
    <?php endif //$FBbyStore['items'] ?>
<?php endif ?>
<?php if(!isset($_GET['cityid'])): ?>
	Välj stad i menyn
<?php endif ?>
  </div>
  <div class="col-md-3"></div>
  
</div>

<?php require_once(ROOT_PATH.'/footer.php'); ?>