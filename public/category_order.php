<?php
require_once('../config.php');
$pagetitle = "Ordna kategorier | Matkassen.se";
?>
<?php require_once(ROOT_PATH.'/header.php'); ?>

<?php 

$admId = $_SESSION['id'];
$privilege = $_SESSION['privilege'];
//if($privilege == 3){
	$cats = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/category/getall"),true);
/*} else {
	header("location: index.php");
}*/


/**	
* TODO: 
* $cats must get categories sorted by order in store based on which manager is logged in (database + webservice). 
* Form -> action must point to run.php-function for updating category order.
* Default input value must be the category order index.
* Remove out-commented privilege check.
*/

?>
<div class="container">
    <div class="row">
        <div class="col-md-offset-4">
            <h3>Ändra ordning</h3>
            <form class="form-inline" method="post" action="">
				<?php
                    foreach($cats  as $cat)
                    {
                        echo "<div class='row cat-order-row'>";
                        echo "<h4 hidden>".$cat["id"]."</h4>";
                        echo "<div class='col-md-1'><label class='sr-only' for='order-value'></label><input id='order-value' class='form-control cat-order-input' value=''></div>";
                        echo "<div class='col-md-8'><h4>".$cat["name"]."</h4></div>";
                        echo "</div>";
                    } 
                ?>
                <div class="row">
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Uppdatera</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once(ROOT_PATH.'/footer.php'); ?>