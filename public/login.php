<?php
	require_once('../config.php');
	$pagetitle = "Logga in | Matkassen.se";
	
	//$salt = substr(md5(rand()), 0, 21));			//function to generate user salt
	//hash('sha256', '[password]'.'$salt'.SALT);	//hash function
	
	if (!(isset($_COOKIE['remember_me']))) {	//if username cookie isn't set
		$_COOKIE['remember_me'] = "";			//changes value of username-input to null
	}
	/*
	if (isset($_POST) && isset($_POST['username'])) {
		$username = $_POST['username'];
		$db = new Db();
		$db_username = $db->getUsername($username);
		
		if (count($db_username) > 0) {
			
			if ($db_username->username == $username) {
				$db_salt = $db->getUserSalt($username);
				$salt = (string)$db_salt->salt;		//converts user salt from object to string
				$password = hash('sha256', $_POST['password'].$salt.SALT);
				$db_password = $db->getPassword($password);
				
				if (count($db_password) > 0) {
					
					if ($db_password->password == $password) {
						$db_privilege = $db->getUserPrivilege($username);
						$privilege = (int)$db_privilege->privilege;	//converts user privilege from object to integer
						$_SESSION['is_logged_in'] = true;
						$_SESSION['user_privilege'] = $privilege;	//stores user privilege in session
						$_SESSION['user_username'] = $username;		//stores username in session
                      	$_SESSION['user_id'] = $db_username->id;	//stores user id in session
						
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
						} 
					} else {
						set_feedback("danger", "Fel användarnamn eller lösenord.");
					}
				} else {
						set_feedback("danger", "Fel användarnamn eller lösenord.");
				}
			} else {
					set_feedback("danger", "Fel användarnamn eller lösenord.");
			}
		} else {
				set_feedback("danger", "Fel användarnamn eller lösenord.");
		}
  	}*/
	if (isset($_POST) && isset($_POST['username']) && isset($_POST['password'])) {
		$user = json_decode(file_get_contents('http://dev2-vyh.softwerk.se:8080/matkasseWS/rest/user/login/'.$_POST['username'].'/'.$_POST['password'].''), true);
		if ($user['id'] > 0) {
			$_SESSION['is_logged_in'] = true;
			$_SESSION['privilege'] = $user['privilege'];	//stores user privilege in session
			$_SESSION['username'] = $user['username'];		//stores username in session
			$_SESSION['id'] = $user['id'];	//stores user id in session
			
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
				if($_SESSION['privilege'] == 1) {
					header("location: administrator.php");
				} elseif($_SESSION['privilege'] == 2) {
					header("location: supplier.php");
				} elseif($_SESSION['privilege'] == 3) {
					header("location: manager.php");
				} else {
					header('location: index.php');
				}
			}
		} else {
			set_feedback("danger", "Fel användarnamn eller lösenord.");
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
                    <input type="text" class="form-control" id="username" placeholder="Användarnamn" name="username" value="<?php
echo $_COOKIE['remember_me']; ?>">
                </div>
                <div class="form-group">
                    <label for="password">Lösenord</label>
                    <input type="password" class="form-control" id="password" placeholder="Lösenord" name="password">
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" id="remember" name="remember" value="1" 
								<?php if ($_COOKIE['remember_me'] != "") {	//checks if a cookie is stored
										echo 'checked="checked"';
									} else {
										echo '';
									} ?> 
                      		>Kom ihåg mig</label>
                </div>
                <button type="submit" class="btn btn-primary">Logga in</button>
            	<button type="button" onclick="window.location.href='register_user.php'" class="btn btn-default">Skapa användare</button>
			</form>
  		</div>
	</div>
</div>

<?php require_once(ROOT_PATH.'/footer.php'); ?>