<?php
    require_once('../config.php');
    
    $pagetitle = "Skapa användare | Matkassen.se";
    require_once(ROOT_PATH.'/header.php'); 

?>


<div class="row">
	<div class="col-md-3 col-md-offset-5">
		<div id="loginForm">
			<form role="form" method="post" action="register.php">
				<div id="login" class="form-group">
                    <label for="username">Avändarnamn</label>
                    <input type="text" class="form-control" id="username" placeholder="Användarnamn" name="username">
                </div>
                <div class="form-group">
                    <label for="password">Lösenord</label>
                    <input type="password" class="form-control" id="password" placeholder="Lösenord" name="password">
                </div>
                
                <button type="submit" class="btn btn-primary">Skapa användare</button>
			</form>
  		</div>
	</div>
</div>


<?php require_once(ROOT_PATH.'/footer.php'); ?>