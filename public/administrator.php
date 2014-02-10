<?php
require_once('../config.php');
$pagetitle = "Hem | Matkassen.se";
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
    <div class="col-md-4 col-md-offset-2">
    <div><h3>Redigera Kategorier</h3></div>
  	    <section>
        
            <?php
            foreach($cats  as $cat)
            {
 
            echo "<div><h4 hidden>".$cat["id"]."</h4></div>";
            echo "<div><h4>".$cat["name"]."</h4></div>";

            echo "<a class='btn btn-default' href='/edit.php?id=".$cat['id']."&name=".urlencode($cat['name'])."'>Redigera</a>";
            echo "<a class='btn btn-danger' href='/run.php?id=".$cat['id']."&func=adm_adm_delete'>Delete</a></br>";
   		    }     
 
            ?>

            <div><h3><a href='/new.php'>Ny Kategori</a></h3></div>

        </section>

    </div>


    <div class="col-md-6 col-md-offset-0">

            <div><h3>Redigera Butiker</h3></div>
 
        <section>
        
            <?php
            foreach($stores  as $store)
            {
 
            echo "<div><h4 hidden>".$store["id"]."</h4></div>";
            echo "<div><h4>".$store["name"]."</h4></div>";

            echo "<a class='btn btn-default' href='/edit.php?id=".$store['id']."&name=".urlencode($store['name'])."'>Redigera</a>";
            echo "<a class='btn btn-danger' href='/run.php?id=".$store['id']."&func=adm_adm_delete'>Delete</a></br>";
            }
 
            ?>

            <div><h3><a href='/new_store.php'>Ny Butik</a></h3></div>
        
        </section>
    </div>
</div>

<?php require_once(ROOT_PATH.'/footer.php'); ?>