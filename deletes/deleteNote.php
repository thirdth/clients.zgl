<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include '../includes/garble_cnfg.php';
$noteID = $_GET['ID'];

$result = delete_note($noteID);
$conn->close();
?>
