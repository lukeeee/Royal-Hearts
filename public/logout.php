<?php
  require_once('../config.php');

  if (isset($_SESSION['is_logged_in'])) {
    unset($_SESSION['is_logged_in']);
    //set_feedback("success", "You are now logged out.");
  }

  header('location: login.php');
?>