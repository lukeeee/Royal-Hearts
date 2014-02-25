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
  <div><h2>Kategorin innehåller Produkter</h2></div>
</div> 
</div> 
<br/>

<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-3">Den här Kategorin har produkter kopplade till sig och kan därför inte tas bort!</div>
  
</div>

<?php require_once(ROOT_PATH.'/footer.php'); ?>