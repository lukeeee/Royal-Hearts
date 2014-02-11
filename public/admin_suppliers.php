<?php
	require_once('../config.php');
	
	$pagetitle = "Hem | Matkassen.se";
?>
<?php require_once(ROOT_PATH.'/header.php'); ?>

<?php 

	$admId = $_SESSION['id'];
	$privilege = $_SESSION['privilege'];
	$privilege = 1;
	if($privilege == 1){
		$suppliers = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/supplier/getall"),true);
	}else{
		header("Location: /index.php");	
	}
	
	
	//$_SESSION['store'] = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/category/getall"),true);
	
	
 ?>

<div class="row">
      <div class="col-md-7 col-md-offset-4">
          <div><h3>Redigera Suppliers</h3></div>
      </div>
</div>

<div class="col-md-3 col-md-offset-4">
     <section>
     <?php
		foreach($suppliers  as $supplier){
 			echo "<div><h4 hidden>".$supplier["id"]."</h4></div>";
			echo "<div><h4>".$supplier["name"]."</h4></div>";
			echo "<a class='btn btn-default' href='/admin_edit_supp.php?id=".$supplier['id']."&name=".$supplier['name']."'>Redigera</a>";
   			echo "<a class='btn btn-danger' href='/run.php?id=".$supplier['id']."&func=adm_supp_delete'>Delete</a></br>";
		}
 
?>

		<div><a href="new_supplier.php">Ny Grossist</a></div>
     </section>
</div>

<?php require_once(ROOT_PATH.'/footer.php'); ?>