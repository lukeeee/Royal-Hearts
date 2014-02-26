<?php
require_once('../config.php');
$pagetitle = "Butiker | Matkassen.se";
?>
<?php require_once(ROOT_PATH.'/header.php'); ?>

<?php 

$admId = $_SESSION['id'];
$privilege = $_SESSION['privilege'];
if($privilege == 1){
	$stores = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/store/getall"),true);
	//$_SESSION['store'] = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/category/getall"),true);
} else {
	header("location: index.php");
}

?>

<div class="row">
	<div class="col-md-1"></div>
 	<div class="col-md-2">
  	<div class="list-group">
    <a href="administrator.php" class="list-group-item">Kategorier</a>
  	<a href="admin_edit_store.php" class="list-group-item active">Butiker</a>				
  	<a href="edit_user.php" class="list-group-item">Användare</a>
    <a href="admin_suppliers.php" class="list-group-item">Grossister</a>
	</div>
  	</div>
    <div class="col-md-4 col-md-offset-2">
    <div><h3>Redigera Butiker</h3></div>
  	    <section>
            <?php
            foreach($stores  as $store)
            {
 
            echo "<div><h4 hidden>".$store["id"]."</h4></div>";
            echo "<div><h4>".$store["name"]." &nbsp;(".$store["cityName"].")</h4></div>";
            echo "<a class='btn btn-default adm' href='/edit_store.php?id=".$store['id']."&name=".urlencode($store['name'])."&city=".$store['cityName']."'>Redigera</a>";
            echo "<a class='btn btn-danger adm' href='/run.php?id=".$store['id']."&cityID=".$store["cityID"]."&func=adm_adm_delete_store' onclick='return confirm(\"Är du säker på att du vill ta bort butiken?\")'>Ta bort</a></br>";
   		    }    
            ?>

            <div><h3><a href='new_store.php'>Ny Butik</a></h3></div>

        </section>

    </div>
</div>
<?php require_once(ROOT_PATH.'/footer.php'); ?>