<?php
	require_once('../config.php');
	$pagetitle = "Logga in | Matkassen.se";
	//$db = new Db();
	//$users = $db->getUserSalt("user");
	//echo $usersalt;
	//$user = serialize($users);
	//$salt = (string)$users->salt;
	//echo hash('sha256', "pass".$salt.SALT);
	//echo " - ";
	//echo hash('sha256', "pass"."07a46b1a155a3c07e34de".SALT);
	//var_dump(substr(md5(rand()), 0, 21));
	
	if (!(isset($_COOKIE['remember_me']))) {	//if username cookie isn't set
		$_COOKIE['remember_me'] = "";			//changes value of username-input to null
	}
	
	if (isset($_POST) && isset($_POST['username'])) {
		$username = $_POST['username'];
		$db = new Db();
		$db_username = $db->getUsername($username);
		
		if (count($db_username) > 0) {
			
			if ($db_username->username == $username) {
				$db_salt = $db->getUserSalt($username);
				$salt = (string)$db_salt->salt;
				$password = hash('sha256', $_POST['password'].$salt.SALT);
				$db_password = $db->getPassword($password);
				
				if (count($db_password) > 0) {
					
					if ($db_password->password == $password) {
						$_SESSION['is_logged_in'] = true;
						$_SESSION['user_username'] = $username;
                      	$_SESSION['user_id'] = $db_username->id;
						
						echo "LOGGED IN AS ";	//TEMP
						echo $username;			//TEMP
						
						/*
						if (isset($_SESSION['return_to'])) {
							$return_to = $_SESSION['return_to'];
							$_SESSION['return_to'] = null;
							header('location: '.$return_to);

						} else {
							$year = time() + 31536000;
			
							if($_POST['remember']) {									//if "Remember me"-checkbox is checked
								setcookie('remember_me', $_POST['username'], $year);	//sets one-year cookie for username
							} elseif(!$_POST['remember']) {								//if "Remember me"-checkbox isn't checked
								if(isset($_COOKIE['remember_me'])) {
									$past = time() - 100;
									setcookie(remember_me, gone, $past);	//removes username-cookie
								} 	
							} 
							header('location: index.php');
						} */
					} else {
						//set_feedback("error", "Wrong username or password.");
						echo "Wrong username or password.";
					}
				} else {
						//set_feedback("error", "Wrong username or password.");
						echo "Wrong username or password.";
				}
			} else {
					//set_feedback("error", "Wrong username or password.");
					echo "Wrong username or password.";
			}
		} else {
				//set_feedback("error", "Wrong username or password.");
				echo "Wrong username or password.";
		}
  	}
?>
<?php require_once(ROOT_PATH.'/header.php'); ?>

<br/>
<div class="row">
	<div class="col-md-3 col-md-offset-5">
		<div id="loginForm">
			<form role="form" method="post" action="login.php">
				<div id="login" class="form-group">
                    <label for="username">Avändarnamn</label>
                    <input type="text" class="form-control" id="username" placeholder="Användarnamn" name="username">
                </div>
                <div class="form-group">
                    <label for="password">Lösenord</label>
                    <input type="password" class="form-control" id="password" placeholder="Lösenord" name="password">
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