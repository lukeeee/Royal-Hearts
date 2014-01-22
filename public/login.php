<?php
	require_once('../config.php');
	$pagetitle = "Logga in | Matkassen.se";
?>
<?php require_once(ROOT_PATH.'/header.php'); ?>

<br/>
<div class="row">
  <div class="col-md-3 col-md-offset-5">
<form>
    <div class="form-group">
        <label for="inputEmail">Avändarnamn</label>

<div id="header">
    <div class="title-div"><a href="index.php">MATKASSEN.SE</a></div>
    <div class="btn-toolbar" role="toolbar" id="menu">
   		<div class="btn-group btn-group-lg btn-group-justified">
            <a class="btn btn-default" role="button">Varor</a>
            <a class="btn btn-default" role="button">Om</a>
            <a class="btn btn-default active" role="button">Logga in</a>
        </div>
    </div>
</div>
<div id="loginForm">
 <form>
    <div id="login" class="form-group">
        <label id="email" for="inputEmail">Avändarnamn</label>
        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
    </div>
    <div class="form-group">
        <label for="inputPassword">Lösenord</label>
        <input type="password" class="form-control" id="inputPassword" placeholder="Password">
    </div>
    <div class="checkbox">
        <label><input type="checkbox">Kom ihåg mig</label>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
    <button type="submit" class="btn btn-default">Skapa användare</button>
</form>
  </div>
</div>

 

<?php require_once(ROOT_PATH.'/footer.php'); ?>