<?php
require_once('../config.php');
$pagetitle = "Kategorier | Matkassen.se";
?>
<?php require_once(ROOT_PATH.'/header.php'); ?>

<?php 

$admId = $_SESSION['id'];
$privilege = $_SESSION['privilege'];
if($privilege == 1){
	$cats = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/category/getall"),true);
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
    <a href="administrator.php" class="list-group-item active">Kategorier</a>
  	<a href="admin_edit_store.php" class="list-group-item">Butiker</a>	
     <a href="admin_edit_store_city_category.php" class="list-group-item">Kategorier i specifik butik</a>			
  	<a href="edit_user.php" class="list-group-item">Användare</a>
    <a href="admin_suppliers.php" class="list-group-item">Grossister</a>
	</div>
  	</div>
    <div class="col-md-4 col-md-offset-2">
    <div><h3>Redigera Kategorier</h3></div>
  	    <section>
        
            <?php
            foreach($cats  as $cat)
            {
 
            echo "<div><h4 hidden>".$cat["id"]."</h4></div>";
            echo "<div><h4>".$cat["name"]."</h4></div>";

            echo "<a class='btn btn-default adm' href='edit.php?id=".$cat['id']."&name=".urlencode($cat['name'])."'>Redigera</a>";
            echo "<a class='btn btn-danger adm' href='run.php?id=".$cat['id']."&func=adm_adm_delete' onclick='return confirm(\"Är du säker på att du vill ta bort kategorin?\")'>Ta bort</a></br>";
   		    }     
 
            ?>

            <div><h3><a href='new.php'>Ny Kategori</a></h3></div>

        </section>
    </div>
</div>

<?php require_once(ROOT_PATH.'/footer.php'); ?>