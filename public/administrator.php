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

<div class="row">
      <div class="col-md-7 col-md-offset-4">
          <div><h3>Redigera Kategorier</h3></div>
      </div>
</div>

    <div class="col-md-3 col-md-offset-4">
     <section>
        
         <?php
		 foreach($_SESSION['cats']  as $cat)
		 {
			 
		 	echo "<div><h4 hidden>".$cat["id"]."</h4></div>";
			echo "<div><h4>".$cat["name"]."</h4></div>";

			echo "<a class='btn btn-default' href='/edit.php?id=".$cat['id']."&name=".urlencode($cat['name'])."'>Redigera</a>";
		    echo "<a class='btn btn-danger' href='/run.php?id=".$cat['id']."&func=adm_adm_delete'>Delete</a></br>";
		 }
		 
		 ?>

        <div class="row">
      		<div class="col-md-12 col-md-offset-0">
          		<div><h3><a href='/new.php'>New Category</a></h3></div>
          		
      		</div>
		</div>
        
     </section>
    </div>


<?php require_once(ROOT_PATH.'/footer.php'); ?>