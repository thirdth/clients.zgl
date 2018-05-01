<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include '../includes/garble_cnfg.php';

$matterID = $_POST['MatterID'];
$date = $_POST['Date'];
$description = $_POST['Description'];
$note = $_POST['Note'];

$result = insert_date_byMatterID($matterID, $date, $description, $note);

if ($result)  {
  header("Location: ../matter.php?ID=" . $matterID);
} else {
  echo "something went wrong" . mysqli_error($conn);
}
?>
