<?php 
	require_once('../config.php');
	//error_reporting(E_ALL);
	//ini_set('display_errors', '1');
	
	$db = new Db();
	
	if($_POST['username'] == null || $_POST['password'] == null || $_POST['password2'] == null) {
		set_feedback("danger", "Du måste fylla i alla fälten."); 
		header('location: register_user.php');
	} elseif($db->getUsername($_POST['username']) != null) {
		set_feedback("danger", "Användarnamn finns redan."); 
		header('location: register_user.php');
	} elseif($_POST['password'] != $_POST['password2']) {
		set_feedback("danger", "Dina lösenord matchar inte."); 
		header('location: register_user.php');
	} else {
		$usersalt = substr(md5(rand()), 0, 21);
		$password = hash('sha256', $_POST['password'].$usersalt.SALT);
		$user = $db->createUser($_POST['username'], $password, $usersalt);
		
		if($user) {
			set_feedback("success", "Ditt konto är skapat!");
			header('location: login.php');
		} else {
			set_feedback("danger", "Något gick fel. Försök igen.");
			header('location: register_user.php');
		}
	}
?>