<?php

    require_once('../config.php');
    $pagetitle = "Ny butik | Matkassen.se";

	require_once(ROOT_PATH.'/header.php');
	
	$privilege = $_SESSION['privilege'];
	if($privilege != 1){ 
		header("location: index.php");
	}
	
	$categories = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/category/getall"),true); 
?>

<div class="row">
    <div class="col-md-3 col-md-offset-5">
        <h1>Lägg till Varor</h1>
        <div id="storeForm">
        <!--rätt runfuction   -->
            <form role="form" method="post" action="run.php?func=adm_adm_new_store">
                <div class="form-group">
                    <label for="storename">Namn</label>
                    <input type="text" class="form-control" id="storename" placeholder="Namn" name="storename">
                </div>
                <div class="form-group">
                	<select class="form-control" name="city_id">
                    <?php
                    	foreach($categories as $category){
                        	echo '<option value="'.$category["id"].'">'.$category["name"].'</option>';
                        }
					?>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Lägg till</button>
            </form>
        </div>
    </div>
</div>

<?php require_once(ROOT_PATH.'/footer.php'); ?>