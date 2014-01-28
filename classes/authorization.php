<?php
  if (!isset($_SESSION['is_logged_in'])) {
    $_SESSION['return_to'] = $_SERVER['REQUEST_URI'];
    set_feedback('error', 'You have to log in to reach this page.');
	if(strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    	header('location: login.php');
	} else {
		header('location: login.php');
	}
  }
?>