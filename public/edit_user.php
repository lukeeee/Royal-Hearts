<?php
	require_once('../config.php');
	$pagetitle = "Edit User | Matkassen.se";
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
<br/>
<div class="row">
<div class="col-md-6 col-md-offset-4">
  <div><h2>Redigera användare</h2></div>
</div> 
</div> 
<br/>

<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-12">
  	<div class="users-group">
    <h1>Användarens Info</h1>
    <hr>
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
		echo '<h3>Lägga till en ny användare</h3>';
		echo '<div class="row inputCointainer"><form method="post" action="run.php?func=adm_adm_user_new" enctype="multipart/form-data">';
					
						
						echo "<div  class='col-lg-3'><input class='form-control' type='text' name='username' placeholder='Användarensnamn' value='Användarensnamn' onfocus='clearText(this);'></div>";
						echo "<div  class='col-lg-3'><input class='form-control' type='text' name='password' value='Lösenord' onfocus='clearText(this);'></div>";
						echo "<div  class='col-lg-3'><input class='form-control col-lg-3' type='text' name='privilege' value='0' onfocus='clearText(this);'></div>";
						echo "<div  class='col-lg-2'><input class='btn btn-primary' type='submit' value='Lägga till'></div>";
					
						echo "</form></div><hr>";
						
						echo '<h3>Uppdatera användare</h3>';
  		foreach($users  as $user)
                 {
                    echo '<div class="row inputCointainer"><form method="post" action="run.php?func=adm_adm_user_update" enctype="multipart/form-data">';
					
						echo "<div class='col-lg-12 '>User ID:".$user["id"]."</div>";
						echo "<input type='hidden' name='id' value='".$user["id"]."'>";
						echo "<div  class='col-lg-3'><input class='form-control' type='text' name='username' value='".$user["username"]."'></div>";
						echo "<div  class='col-lg-3'><input class='form-control' type='text' name='password'></div>";
						echo "<div  class='col-lg-3'><input class='form-control' type='text' name='privilege' value='".$user["privilege"]."'></div>";
						echo "<div  class='col-lg-1'><input class='btn btn-primary' type='submit' value='uppdatera'></div>";
					
						echo "</form></div><hr>";
						
    			}
				?>
  
	</div>

  
</div>

<?php require_once(ROOT_PATH.'/footer.php'); ?>