<?php
	require_once('../config.php');
	
	$pagetitle = "Hem | Matkassen.se";
?>
<?php require_once(ROOT_PATH.'/header.php'); ?>

<?php 

	$admId = $_SESSION['id'];
	$_SESSION['cats'] = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/category/getall"),true);
	//$_SESSION['store'] = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/category/getall"),true);
	
	

 ?>

<br/>
<div class="row">
    <div class="col-md-3 col-md-offset-4">
     <section>
        <div>Redigera Kategorier
      
         <?php
		 foreach($_SESSION['cats']  as $cat)
		 {
			 
		 	echo "<div>".$cat["id"]."</div>";
			echo "<div>".$cat["name"]."</div>";
			
			echo "<a href='/edit.php?id=".$cat['id']."&name=".urlencode($cat['name'])."'>Redigera</a>";
			echo "<a href='/run.php?id=".$cat['id']."&func=adm_adm_delete'>Delete</a>";
			
			
		 }
		
		echo "<a href='/new.php'>New Category</a>";		 
		 ?>
            
        </div>
        
        <div>Redigera Städer
      
            
        </div>
        
        
     </section>
    </div>
</div> 

<?php require_once(ROOT_PATH.'/footer.php'); ?>