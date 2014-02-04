<?php
	require_once('../config.php');
	
	$pagetitle = "Hem | Matkassen.se";
?>
<?php require_once(ROOT_PATH.'/header.php'); ?>

<?php 

	$admId = $_SESSION['id'];
	$privilege = $_SESSION['privilege'];
	if($privilege == 2){
		$products = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/foodproduct/getbysupplier/".$admId),true);
	}else{
		header("Location: /index.php");	
	}
	
	
	//$_SESSION['store'] = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/category/getall"),true);
	
	
 ?>

<div class="row">
      <div class="col-md-7 col-md-offset-4">
          <div><h3>Redigera Varor</h3></div>
      </div>
</div>

<div class="col-md-3 col-md-offset-4">
     <section>
     <?php
		foreach($products  as $product){
 			echo "<div><h4 hidden>".$product["id"]."</h4></div>";
			echo "<div><h4>".$product["name"]."</h4></div>";
			echo "<a class='btn btn-default' href='/edit_supplier.php?id=".$product['id']."&name=".$product['name']."&cat_id=".$product["categoryID"]."'>Redigera</a>";
   			echo "<a class='btn btn-danger' href='/run.php?id=".$product['id']."&func=adm_supp_delete'>Delete</a></br>";
		}
 
?>
     </section>
</div>

<?php require_once(ROOT_PATH.'/footer.php'); ?>