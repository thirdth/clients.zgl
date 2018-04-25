<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include 'includes/garble_cnfg.php';
clear_session_cookies();
header("location: login.php");
?>
