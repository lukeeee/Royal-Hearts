<?php
	require_once('../config.php');
?>
<?php require_once(ROOT_PATH.'/header.php'); ?>

<br/>
<div class="row">
  <div class="col-md-3 col-md-offset-5">
<form>
    <div class="form-group">
        <label for="inputEmail">Avändarnamn</label>
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