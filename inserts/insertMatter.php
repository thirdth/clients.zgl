<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include '../includes/garble_cnfg.php';
$Name = $_POST['Name'];
$Description = $_POST['Description'];
$MatterNumber = $_POST['MatterNum'];


$result = insert_matter($Name, $clientID, $Description, $MatterNum);

if ($result)  {
  header("Location: ../clientPage.php?ID=" . $clientID);
} else {
  echo "something went wrong" . mysqli_error($conn);
}
?>
