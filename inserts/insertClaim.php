<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include '../includes/garble_cnfg.php';
$matterID = $_POST['matterID'];
$description = $_POST['description'];
$incidentDate = $_POST['incidentDate'];

$result = insert_claim($matterID, $description, $incidentDate);

if ($result)  {
  header("Location: ../matter.php?ID=" . $matterID);
} else {
  echo "something went wrong" . mysqli_error($conn);
}
?>
