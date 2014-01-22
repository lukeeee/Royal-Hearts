<?php
	require_once('../config.php');
	
	$pagetitle = "Hem | Matkassen.se";
?>
<?php require_once(ROOT_PATH.'/header.php'); ?>

<br/>
<div class="row">
<div class="col-md-3 col-md-offset-4">
 <section>

<div id="header">
    <div class="title-div"><a href="index.php">MATKASSEN.SE</a></div>
    <div class="btn-toolbar" role="toolbar" id="menu">
   		<div class="btn-group btn-group-lg btn-group-justified">
            <a class="btn btn-default" role="button">Varor</a>
            <a class="btn btn-default" role="button">Om</a>
            <a class="btn btn-default" role="button" href="login.php">Logga in</a>
        </div>
    </div>
</div>

<section>
	<div>
    	<img src="img/app.png" />
    </div>
 </section>
</div>
</div> 

<?php require_once(ROOT_PATH.'/footer.php'); ?>