<?php
require_once('../config.php');
$pagetitle = "Hem | Matkassen.se";
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
    <div class="col-md-4 col-md-offset-2">
    <div><h3>Redigera Kategorier</h3></div>
  	    <section>
        
            <?php
            foreach($stores  as $store)
            {
 
            echo "<div><h4 hidden>".$store["id"]."</h4></div>";
            echo "<div><h4>".$store["name"]."</h4></div>";

            echo "<a class='btn btn-default adm' href='/edit_store.php?id=".$store['id']."&name=".urlencode($store['name'])."'>Redigera</a>";
            echo "<a class='btn btn-danger adm' href='/run.php?id=".$store['id']."&func=adm_adm_delete_store'>Ta bort</a></br>";
   		    }    
            ?>

            <div><h3><a href='new_store.php'>Ny Butik</a></h3></div>

        </section>

    </div>
</div>
<?php require_once(ROOT_PATH.'/footer.php'); ?>