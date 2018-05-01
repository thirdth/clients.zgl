<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include '../includes/garble_cnfg.php';

$matterID = $_POST['ID'];
$name = $_POST['Name'];
$courtNO = $_POST['CourtNO'];
$notes = $_POST['Notes'];

$result = update_matter_byID($matterID, $name, $courtNO, $notes);

if ($result)  {
  header("Location: ../matter.php?ID=" .  $matterID);
} else {
  echo "something went wrong" . mysqli_error($conn);
}

?>
