<?php
	require_once('../config.php');
?>
<?php require_once(ROOT_PATH.'/header.php'); ?>


<div id="loginForm">
 <form>
    <div id="login" class="form-group">
        <label id="email" for="inputEmail">Avändarnamn</label>
        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
    </div>
    <div class="form-group">
        <label id="password" for="inputPassword">Lösenord</label>
        <input type="password" class="form-control" id="inputPassword" placeholder="Password">
    </div>
    <div id="checkbox" class="checkbox">
        <label><input type="checkbox">Kom ihåg mig</label>
    </div>
    <button id="btn" type="submit" class="btn btn-primary">Login</button>
    <button type="submit" class="btn btn-default">Skapa användare</button>
 </form>
</div>

<?php require_once(ROOT_PATH.'/footer.php'); ?>