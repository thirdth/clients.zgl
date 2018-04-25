<?php
session_start();
include 'garble_cnfg.php';
if (!empty($_POST['submit']) && 'Log-in' == $_POST['submit']) {
  $password = $_POST['password'];
  $username = $_POST['username'];
  $conn = get_connected();
  if (verify_me($username, $password)) {
    create_session($username, $password);
    header("Location: calendar.php");
  }else {
    header("Location: login.php?error=1");
    die();
  };
}
print_r($all);
?>
