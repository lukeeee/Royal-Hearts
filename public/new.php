<?php

  require_once('../config.php');


require_once(ROOT_PATH.'/header.php'); ?>

<section class="row">
  <section class="formNew col span_12">
      <h1><?php echo $page_title ?></h1>
    <form method="post" action="run.php?func=adm_adm_add" enctype="multipart/form-data">
      <div class="row">
      	<div class="col-md-7 col-md-offset-5">
          <div class="col-xs-3">
          	<input type="text" class="form-control" name="name" value="<?php echo $name ?>">
          </div>
          <button type="submit" class="btn btn-default">Create</button>
      	</div>
		  </div>
    </form>
  </section>
</section>

<?php require_once(ROOT_PATH.'/footer.php'); ?>