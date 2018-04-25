<?php
if(!isset($_SESSION)) {
  session_start();
}
$error = $_GET['error'];
include 'header.php';

include 'registerTemplate.php';
include 'footer.php'; ?>
