<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include '../includes/garble_cnfg.php';
$matterID = $_GET['ID'];

$result = delete_matter($matterID);

?>
