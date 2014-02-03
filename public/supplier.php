<?php
	require_once('../config.php');
	
	$pagetitle = "Hem | Matkassen.se";
?>
<?php require_once(ROOT_PATH.'/header.php'); ?>

<?php 

	$admId = $_SESSION['id'];
	$products = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/foodproduct/getall"),true);
	$cats = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/category/getall"),true);
	//$_SESSION['store'] = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/category/getall"),true);
	
	

 ?>

<br/>
<div class="row">
    <div class="col-md-3 col-md-offset-4">
     <section>
        <div>Redigera Kategorier
      		
            	<h2>Add en ny product</h2>
				 <?php
                 
                    echo '<form method="post" action="run.php?func=adm_supplier_update&id="'.$product["id"].'" enctype="multipart/form-data">';
						echo "<select>";
						  foreach($cats  as $cat)
                 		  {
							echo "<option value=". $cat['id'].">".$cat['name']."</option>";
						  }
						  
						 echo "</select>";
						
						echo "<input type='text' name='price' value='".$product["name"]."'>";
						
					
						echo "<button class='cart' type='submit'>Add</button>";
					echo "</form>";
             
	 
                 ?>
                <hr>
                <h2>Uppdatera varo kategory och varor</h2>
				 <?php
                 foreach($products  as $product)
                 {
                    echo '<form method="post" action="run.php?func=adm_supplier_update&id="'.$product["id"].'" enctype="multipart/form-data">';
						echo "<select>";
						  foreach($cats  as $cat)
                 		  {
							echo "<option value=". $cat['id'].">".$cat['name']."</option>";
								
						  }
						 echo		"</select>";
						echo "<div>".$product["id"]."</div>";
						echo "<input type='text' name='price' value='".$product["name"]."'>";
						
					
						echo "<button class='cart' type='submit'>Uppdatera</button>";
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