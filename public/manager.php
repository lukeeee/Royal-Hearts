<?php
	require_once('../config.php');
	
	$pagetitle = "Hem | Matkassen.se";
?>
<?php require_once(ROOT_PATH.'/header.php'); ?>

<?php 

	$admId = $_SESSION['id'];
	$products = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/foodproduct/getall"),true);
	//$_SESSION['store'] = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/category/getall"),true);
	
	

 ?>

<br/>
<div class="row">
    <div class="col-md-3 col-md-offset-4">
     <section>
        <div>Redigera Kategorier
      		
            	<h2>Välj produkter som inte säljs</h2>
				 <?php
                 foreach($products  as $product)
                 {
                    echo '<form method="post" action="run.php?func=adm_manager_update&id="'.$product["id"].'" enctype="multipart/form-data">';
						echo "<div>".$product["id"]."</div>";
						echo "<input type='checkbox' name='active' value='".$product["id"]."'>".$product["name"];
						echo "<input type='text' name='price' value='".$product["price"]."'>";
						echo "<input type='text' name='ordning' value='".$product["ordning"]."'>";
						echo "<button class='cart' type='submit'>Update</button>";
					echo "</form>";
                 }
	 
                 ?>
                 
        <button type="submit">Create</button>
             </form>
        </div>
        
        <div>Redigera Städer
      
            
        </div>
        
        
     </section>
    </div>
</div> 

<?php require_once(ROOT_PATH.'/footer.php'); ?>