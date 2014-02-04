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
	$cities = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/city/getall"),true);
	
	

 ?>

<br/>
<div class="row">
    <div class="col-md-3 col-md-offset-4">
     <section>
        <div>
      		
            	<h2>Välj dina produkter</h2>
				 <?php
                 
                    echo '<form method="post" action="run.php?func=adm_client_update enctype="multipart/form-data">';
					
					echo "<select>";
						  foreach($cities  as $city)
                 		  {
							echo "<option value=". $city['id'].">".$city['name']."</option>";
						  }
						  
						 echo "</select>";
					
					
				 
                 foreach($cats  as $cat)
                 {				 
					 echo "<div class='cat'>";
					 echo "<div>".$cat['name']."</div><br>";
					 foreach($products  as $product)
					 {
							if($cat['id'] == $product['catID'])
							{
								echo "<div class='prod'>";
								echo "<input type='checkbox' name='productsID[]' value='".$product["id"]."'>".$product["name"];
								echo "<div>".$product["name"]."'</div>";
								echo '<input name="quantity" type="text value="0">';
								echo '<label name="quantity" type="text">'.$product["price"].'</label>';
								echo "</div>";
							}
					 }
				 }
				 
				 echo "<button class='cart' type='submit'>Uppdatera</button>";
				 echo "</form>";
	 
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