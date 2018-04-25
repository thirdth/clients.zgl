<?php
error_reporting(-1);
ini_set('display_errors', 'On');
session_start();
include 'includes/garble_cnfg.php';
if (!empty($_POST['submit']) && 'Login' == $_POST['submit']) {
  $password = $_POST['password'];
  $username = $_POST['username'];
  $conn = get_connected();
  if (verify_me($username, $password)) {
    create_session($username, $password);
    header("Location: index.php");
  }else {
    header("Location: login.php?error=1");
    die();
  };
}
?>
