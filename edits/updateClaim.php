<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include '../includes/garble_cnfg.php';
print_r($_POST);
$claimID = $_POST['ID'];
$description = $_POST['Description'];
$typeID = $_POST['Type'];
$matterID = $_POST['matterID']

echo $claimID . ", " . $description . ". " . $typeID . ", " . $matterID;
?>
