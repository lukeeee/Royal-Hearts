<?php
	require_once('../config.php');
	$pagetitle = "Logga in | Matkassen.se";
?>
<?php require_once(ROOT_PATH.'/header.php'); ?>

<br/>
<div class="row">
	<div class="col-md-3 col-md-offset-5">
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
                <button type="submit" class="btn btn-primary">Logga in</button>
            	<button type="submit" class="btn btn-default">Skapa användare</button>
			</form>
  		</div>
	</div>
</div>

 

<?php require_once(ROOT_PATH.'/footer.php'); ?>