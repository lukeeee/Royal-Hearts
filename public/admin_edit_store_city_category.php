<?php
require_once('../config.php');
$pagetitle = "Kategorier i butik | Matkassen.se";
?>
<?php require_once(ROOT_PATH.'/header.php'); ?>

<?php 

$admId = $_SESSION['id'];
//$cities = array("Växjö", "Karlskrona");
$ui_ids[] = '';

$privilege = $_SESSION['privilege'];
if($privilege == 1){
  $cities = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/city/getall"),true);
  $categories = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/category/getall"),true);
  //$_SESSION['store'] = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/category/getall"),true);
} else {
	header("location: index.php");
}

?>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">

  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<div class="row">
	<div class="col-md-1"></div>
 	<div class="col-md-2">
  	<div class="list-group">
    <a href="administrator.php" class="list-group-item">Kategorier</a>
  	<a href="admin_edit_store.php" class="list-group-item">Butiker</a>				
    <a href="admin_edit_store_city_category.php" class="list-group-item active">Kategorier i specifik butik</a>
  	<a href="edit_user.php" class="list-group-item">Användare</a>
    <a href="admin_suppliers.php" class="list-group-item">Grossister</a>
	</div>
  	</div>
    <div class="col-md-4 col-md-offset-2 nopadding">
    <div><h3>Redigera Butiker</h3></div>
    
  	    <section>
        
            <?php echo categoryinStore($cities, $categories); ?>


        </section>

      </div>
</div>
<?php echo categoryinStoreScript($cities) ?>

    
<?php require_once(ROOT_PATH.'/footer.php'); ?>