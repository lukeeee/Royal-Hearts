<?php
	require_once('../config.php');
	$pagetitle = "Användare | Matkassen.se";
	$categoryID = null;	
	$itemsbycat = null;
	if($_SESSION["is_logged_in"]){
		if($_SESSION["privilege"] == 1){
			$users = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/user/getall"),true);	
		}else{
			header("Location: index.php");
		}
	}else{
		header("Location: login.php");
	}
	//$db = new Db();
	//var_dump(count($db->getUsernames("dill")));
	/*$users = array(
				array("id"=>12,"username"=>"luis sanchez","privilege"=>100),
				array("id"=>12,"username"=>"luis sanchez","privilege"=>100),
				array("id"=>12,"username"=>"luis sanchez","privilege"=>100),
				array("id"=>12,"username"=>"luis sanchez","privilege"=>100),
				array("id"=>12,"username"=>"luis sanchez","privilege"=>100),
				array("id"=>12,"username"=>"luis sanchez","privilege"=>100),
				array("id"=>12,"username"=>"luis sanchez","privilege"=>100)
				
				); */
?>
<?php require_once(ROOT_PATH.'/header.php'); ?>
<style>
	.users-group{ width:90%; margin:0 auto;
	 }
	

</style>

<div class="row">
 	<div class="col-md-2 col-md-offset-1">
  	<div class="list-group">
    <a href="administrator.php" class="list-group-item">Kategorier</a>
  	<a href="admin_edit_store.php" class="list-group-item">Butiker</a>				
  	<a href="edit_user.php" class="list-group-item active">Användare</a>
    <a href="admin_suppliers.php" class="list-group-item">Grossister</a>
	</div>
  	</div>	
  <div class="col-md-6 col-md-offset-1">
  	<div class="users-group">
    <h3>Redigera Användare</h3>
    <br />
    <style>
		.inputCointainer * {
		margin:0 0px;
		}
		.well {
		padding: 7px;
		}
	</style>
    <script>
		function clearText(thefield,plats){
		if (thefield.defaultValue==thefield.value)
		thefield.value = "";
		}
	</script>
  	<?php
		echo '<h4>Lägg till en ny Användare</h4>';
		echo '<div class="row inputCointainer"><form method="post" action="run.php?func=adm_adm_user_new" enctype="multipart/form-data">';		
		echo "<div  class='col-lg-3'><label class='sr-only' for='username'>Användarnamn</label><input class='form-control' type='text' name='username' placeholder='Användarnamn' onfocus='clearText(this);'></div>";
		echo "<div  class='col-lg-3'><label class='sr-only' for='password'>Lösenord</label><input class='form-control' type='text' name='password' placeholder='Lösenord' onfocus='clearText(this);'></div>";
		echo "<div  class='col-lg-2'><label class='sr-only' for='privilege'>Privilege</label><input class='form-control col-lg-3' type='text' name='privilege' value='0' onfocus='clearText(this);'></div>";
		echo "<div  class='col-lg-2'><input class='btn btn-primary' type='submit' value='Lägg till'></div>";
		echo "</form></div><hr>";
		
		echo '<h4>Uppdatera Användare</h4>';
		foreach($users  as $user) {
			echo '<div class="row inputCointainer"><form method="post" action="run.php?func=adm_adm_user_update" enctype="multipart/form-data">';
			echo "<div class='col-lg-1 '>User ID:".$user["id"]."</div>";
			echo "<input type='hidden' name='id' value='".$user["id"]."'>";
			echo "<div  class='col-lg-3'><label class='sr-only' for='username'>Användarnamn</label><input class='form-control' type='text' name='username' value='".$user["username"]."'></div>";
			echo "<div  class='col-lg-3'><label class='sr-only' for='password'>Lösenord</label><input class='form-control' type='text' name='password' placeholder='Nytt lösenord'></div>";
			echo "<div  class='col-lg-2'><label class='sr-only' for='privilege'>Privilege</label><input class='form-control' type='text' name='privilege' value='".$user["privilege"]."'></div>";
			echo "<div  class='col-lg-1'><input class='btn btn-primary' type='submit' value='Uppdatera'></div>";
			echo "</form></div><hr>";	
		}
	?>
  
	</div>
  
</div>

<?php require_once(ROOT_PATH.'/footer.php'); ?>