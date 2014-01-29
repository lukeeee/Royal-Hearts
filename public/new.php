<?php

  require_once('../config.php');


require_once(ROOT_PATH.'/header.php'); ?>

<section class="row">
  <section class="formNew col span_12">
    <h1><?php echo $page_title ?></h1>
    <form method="post" action="run.php?func=adm_adm_add" enctype="multipart/form-data">
                                  
        <input type="text" name="name" value="<?php echo $name ?>">
        <button type="submit">Create</button>
                                  
    </form>
  </section>
</section>

<?php require_once(ROOT_PATH.'/footer.php'); ?>