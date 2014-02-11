<?php
	require_once('../config.php');
	$pagetitle = "Edit User | Matkassen.se";
	$categoryID = null;	
	$itemsbycat = null;
	
	$users = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/user/getall"),true);
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
	.users-group{ width:90%; margin:0 auto;}

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
		margin:0 10px;
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
					
						
						echo "<input class='col-lg-3' type='text' name='username' value='Användarensnamn' onfocus='clearText(this);'>";
						echo "<input class='col-lg-3' type='text' name='password' value='Lösenord' onfocus='clearText(this);'>";
						echo "<input class='col-lg-3' type='text' name='privilege' value='0' onfocus='clearText(this);'>";
						echo "<input class='col-lg-1' type='submit' value='Lägga till'>";
					
						echo "</form></div><hr>";
						
						echo '<h3>Uppdatera användare</h3>';
  		foreach($users  as $user)
                 {
                    echo '<div class="row inputCointainer"><form method="post" action="run.php?func=adm_adm_user_update" enctype="multipart/form-data">';
					
						echo "<div class='col-lg-12 '>User ID:".$user["id"]."</div>";
						echo "<input type='hidden' name='id' value='".$user["id"]."'>";
						echo "<input class='col-lg-3' type='text' name='username' value='".$user["username"]."'>";
						echo "<input class='col-lg-3' type='text' name='password'>";
						echo "<input class='col-lg-3' type='text' name='privilege' value='".$user["privilege"]."'>";
						echo "<input class='col-lg-1' type='submit' value='uppdatera'>";
					
						echo "</form></div><hr>";
						
    			}
				?>
  
	</div>

  
</div>

<?php require_once(ROOT_PATH.'/footer.php'); ?>