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
  	<?php
  		foreach($users  as $user)
                 {
                    echo '<div class="row"><form method="post" action="run.php?func=adm_adm_user_update" enctype="multipart/form-data">';
					
						echo "<div class='col-lg-12'>User ID:".$user["id"]."</div>";
						echo "<input type='hidden' name='id' value='".$user["id"]."'>";
						echo "<input class='col-lg-3' type='text' name='username' value='".$user["username"]."'>";
						echo "<input class='col-lg-3' type='text' name='password'>";
						echo "<input class='col-lg-3' type='text' name='privilege' value='".$user["privilege"]."'>";
						echo "<input class='col-lg-1' type='submit' value='uppdatera'>";
					
						echo "</form></div><hr>";
						
    			}?>
  
	</div>

  
</div>

<?php require_once(ROOT_PATH.'/footer.php'); ?>