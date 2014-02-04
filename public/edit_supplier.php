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

<section id="content_wrap" class="row">
               
  <div id="cv" class="col span_12">                           
    <section class="col-md-8 col-md-offset-4">
       <h1>Redigera</h1>
      <form method="post" action="run.php?func=adm_supp_update" enctype="multipart/form-data">
        <div class="col-xs-1">
          <input type="text" class="form-control" name="id" value="<?php echo $id?>">
        </div>
        <div class="col-xs-3">
          <input type="text" class="form-control" name="name" value="<?php echo $name ?>">
        </div>
        <div class="col-xs-3">
        	<select>
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
         <button type="submit" class="btn btn-default">Update</button>                             
      </form>
    </section>                          
  </div>                       
</section>

<?php require_once(ROOT_PATH.'/footer.php'); ?>