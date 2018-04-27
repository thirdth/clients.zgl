<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include '../includes/garble_cnfg.php';
$claimID = $_POST['claimID'];
$matterID = $_POST['matterID'];
$note = $_POST['memo'];
$amount = $_POST['amount'];
$type = $_POST['type'];

$result = insert_xaction($claimID, $note, $amount, $type);

if ($result)  {
  header("Location: ../matter.php?ID=" . $matterID);
} else {
  echo "something went wrong" . mysqli_error($conn);
}
?>
