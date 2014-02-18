<?php
	require_once('../config.php');
	$pagetitle = "Redigera butik | Matkassen.se";
	
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	}
	
	if (isset($_GET['name'])) {
		$name = urldecode($_GET['name']);
	}
	
	$privilege = $_SESSION['privilege'];
	if($privilege != 1){ 
		header("location: index.php");
	}else{
		
	}
	
	require_once(ROOT_PATH.'/header.php'); 
?>

<div class="row">
	<div class="col-md-3 col-md-offset-5">
    	<h1>Redigera Butik</h1>
        <form method="post" action="run.php?func=adm_adm_update_store&id=<?php echo $id?>" enctype="multipart/form-data"><!--TODO: Action -> run.php-function for updating store-->
            <div class="form-group">
                <label for="storename">Butiksnamn</label>
                <input type="text" class="form-control" id="storename" name="storename" value="<?php echo $name ?>">
            </div>
            <button type="submit" class="btn btn-default">Redigera</button>                             
        </form>                          
 	</div>
</div>  

<?php require_once(ROOT_PATH.'/footer.php'); ?>