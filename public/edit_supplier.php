<?php
  require_once('../config.php');
  $pagetitle = "Hem | Matkassen.se";

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
  }
  
   if (isset($_GET['name'])) {
    $name = urldecode($_GET['name']);
  }
  
  if(isset($_GET['cat_id'])){
	$cat_id = $_GET['cat_id'];	  
  }


	$cats = json_decode(file_get_contents("http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/category/getall"),true);
 require_once(ROOT_PATH.'/header.php'); ?>

<div id="content_wrap" class="row">                   
    <div class="col-md-7 col-md-offset-4">
    	<h1>Redigera</h1>
        <form method="post" class="form-inline" action="run.php?func=adm_supp_update" enctype="multipart/form-data">
            <div hidden="hidden">
            	<input type="text" class="form-control" name="prod_id" value="<?php echo $id?>">
            </div>
            <div class="form-group">
            	<label class="sr-only" for="name">Namn</label>
            	<input type="text" class="form-control" id="name" name="name" value="<?php echo $name ?>">
            </div>
            <div class="form-group">
                <select class="form-control" id="cat" name="cat_id">
                <?php 	foreach($cats  as $cat)
                        {
                            if($cat["id"] == $cat_id){
                                echo "<option selected value=".$cat['id'].">".$cat['name']."</option>";
                            }else{
                                echo "<option value=".$cat['id'].">".$cat['name']."</option>";
                            }
                            
                        }
                ?>		  
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Uppdatera</button> 
            </div>                            
        </form>     
	</div>                                         
</div>

<?php require_once(ROOT_PATH.'/footer.php'); ?>