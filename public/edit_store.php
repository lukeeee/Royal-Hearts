<?php
	require_once('../config.php');
	$pagetitle = "Redigera Butik | Matkassen.se";
	
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	}
	
	if (isset($_GET['name'])) {
		$name = urldecode($_GET['name']);
	}
	
	if(isset($_GET['city'])) {
		$cityname = $_GET['city'];
	}
		
	$cities = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/city/getall"),true);
	
	$privilege = $_SESSION['privilege'];
	if($privilege != 1){ 
		header("location: index.php");
	}
	
	require_once(ROOT_PATH.'/header.php'); 
?>

<div class="row">
	<div class="col-md-3 col-md-offset-5">
    	<h1>Redigera Butik</h1>
        <form method="post" action="run.php?func=adm_adm_update_store&id=<?php echo $id?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="storename">Butiksnamn</label>
                <input type="text" class="form-control hidden" id="store_id" name="storeID" value="<?php echo $id ?>">
                <input type="text" class="form-control" id="storename" name="name" value="<?php echo $name ?>">
            </div>
             <div class="form-group">
                <select class="form-control" name="cityID">
                <?php
                    foreach($cities as $city){
						if($city["name"] == $cityname) {
                        	echo '<option value="'.$city["id"].'" selected>'.$city["name"].'</option>';
						} else  {
							echo '<option value="'.$city["id"].'">'.$city["name"].'</option>';
						}
                    }
                ?>
                </select>
            </div>
            <button type="submit" class="btn btn-default">Redigera</button>                             
        </form>                          
 	</div>
</div>  

<?php require_once(ROOT_PATH.'/footer.php'); ?>