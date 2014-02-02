<?php
  require_once('../config.php');


  if (isset($_GET['id'])) {
    $id = $_GET['id'];
  }
  
   if (isset($_GET['name'])) {
    $name = urldecode($_GET['name']);
  }



 require_once(ROOT_PATH.'/header.php'); ?>

<section id="content_wrap" class="row">
               
  <div id="cv" class="col span_12">
                            
    <section class="col-md-8 col-md-offset-4">
      <h1><?php //echo $page_title ?></h1>
      <form method="post" action="run.php?func=adm_adm_update" enctype="multipart/form-data">
        <input type="text" name="id" value="<?php echo $id?>">
        <input type="text" name="name" value="<?php echo $name ?>">
        <button type="submit">Update</button>
                                  
      </form>
    </section>
                           
  </div>
                        
</section>
<?php require_once(ROOT_PATH.'/footer.php'); ?>