<?php

    require_once('../config.php');
    $pagetitle = "Ny Vara | Matkassen.se";

	require_once(ROOT_PATH.'/header.php');
	
	$privilege = $_SESSION['privilege'];
	if($privilege != 2){ 
		header("location: index.php");
	} else {
		$user_id = $_SESSION['id'];
		$db = new Db();
		$supplier_id = $db->getSupplierID($user_id);
		
		$categories = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/category/getall"),true); 
	}
?>

<div class="row">
    <div class="col-md-3 col-md-offset-5">
        <h1>Lägg till Vara</h1>
        <div id="storeForm">
            <form role="form" method="post" action="run.php?func=adm_supp_new">
            	<div class="form-group">
                	<label for="supp_id" class="sr-only">Supplier ID</label>
                	<input type="text" class="form-control hidden" id="supplierID" name="supplierID" value="<?php echo $supplier_id['id']; ?>">
                </div>
                <div class="form-group">
                    <label for="name">Namn</label>
                    <input type="text" class="form-control" id="name" placeholder="Namn" name="name">
                </div>
                <div class="form-group">
                	<select class="form-control" name="cat_id">
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