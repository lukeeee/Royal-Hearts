<?php
  require_once('../config.php');
  $pagetitle = "Redigera Grossist | Matkassen.se";

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
  }
  
   if (isset($_GET['name'])) {
    $name = urldecode($_GET['name']);
  }
  ?>
<?php require_once(ROOT_PATH.'/header.php'); ?>
<section id="content_wrap" class="row">
               
  <div id="cv" class="col span_12">                           
    <section class="col-md-8 col-md-offset-4">
       <h1>Redigera Grossist</h1>
      <form method="post" action="run.php?func=adm_adm_supp_update" enctype="multipart/form-data">
        <div class="col-xs-1">
          <input type="text" class="form-control" name="id" value="<?php echo $id?>">
        </div>
        <div class="col-xs-3">
          <input type="text" class="form-control" name="name" value="<?php echo $name ?>">
        </div>
       
         <button type="submit" class="btn btn-default">Uppdatera</button>                             
      </form>
    </section>                          
  </div>                       
</section>

<?php require_once(ROOT_PATH.'/footer.php'); ?>