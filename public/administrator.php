<?php
	require_once('../config.php');
	
	$pagetitle = "Hem | Matkassen.se";
?>
<?php require_once(ROOT_PATH.'/header.php'); ?>

<?php 

	$admId = $_SESSION['id'];
	$cats = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/category/getall"),true);
	$stores = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/category/getall"),true);
	$cities = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/category/getall"),true);
	
	

 ?>

<br/>
<div class="row">
    <div class="col-md-3 col-md-offset-4">
     <section>
     
     
     	<div>Add ny categoty</div>
        	<?php
		 foreach($cats  as $cat)
		 {
			echo '<form method="post" action="run.php?func=adm_adm_add" enctype="multipart/form-data">';
		 	
			echo "<input type='text' name='price' value='".urlencode($cat["name"])."'>";
			
			//echo "<a href='/edit.php?id=".$cat['id']."&name=".urlencode($cat['name'])."'>Redigera</a>";
		
			echo '</form>';
		 }
		 	 
		 ?>
         
        </div>
        <hr>
     
        <div>Uppdate Kategorier
      
         <?php
		 foreach($cats  as $cat)
		 {
			echo '<form method="post" action="run.php?func=adm_adm_update_cat&id="'.$cat["id"].'" enctype="multipart/form-data">';
		 	echo "<div>".$cat["id"]."</div>";
		
			echo "<input type='text' name='price' value='".urlencode($cat["name"])."'>";
			
			//echo "<a href='/edit.php?id=".$cat['id']."&name=".urlencode($cat['name'])."'>Redigera</a>";
			echo "<a href='/run.php?id=".$cat['id']."&func=adm_adm_delete'>Delete</a>";
			echo '</form>';
			
			
		 }
	 
		 ?>
            
        </div>
        
        <div>Redigera Städer</div>
        
        <?php
		 foreach($stores  as $st)
		 {
			echo '<form method="post" action="run.php?func=adm_adm_update_store&id="'.$st["id"].'" enctype="multipart/form-data">';
		 	echo "<div>".$st["id"]."</div>";
		
			echo "<input type='text' name='name' value='".urlencode($st["name"])."'>";
			
			echo "<select>";
						  foreach($cities  as $city)
                 		  {
							if($city['id'] == $city['cityID'])
							{
								echo "<option selected value=". $city['id'].">". $city['name']."</option>";
							}
							
							else
							{
								echo "<option value=". $city['id'].">". $city['name']."</option>";
							}
								
						  }
			echo "</select>";
			
			
			echo '</form>';
			
			
		 }
		
			 
		 ?>
        
        
     </section>
    </div>
</div> 

<?php require_once(ROOT_PATH.'/footer.php'); ?>