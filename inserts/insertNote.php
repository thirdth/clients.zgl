<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include '../includes/garble_cnfg.php';
$matterID = $_POST['matterID'];
$text = $_POST['text'];
print_r($_SESSION);

$result = insert_note($matterID, $text);

if ($result)  {
  header("Location: ../matter.php" . $matterID);
} else {
  echo "something went wrong" . mysqli_error($conn);
}
?>
