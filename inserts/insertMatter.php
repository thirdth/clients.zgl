<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include '../includes/garble_cnfg.php';
$Name = $_POST['Name'];
$FName = $_POST['AdverseFirst'];
$MName = $_POST['AdverseMiddle'];
$LName = $_POST['AdverseLast'];
$Street1 = $_POST['street1'];
$Street2 = $_POST['street2'];
$City = $_POST['city'];
$State = $_POST['state'];
$Zip = $_POST['zip'];
$Phone = $_POST['phone'];
$Email = $_POST['email'];
$Notes = $_POST['Notes'];
$clientID = $_POST['clientID'];

$PhoneID = insert_phone($Phone);
$EmailID = insert_email($Email);
$AddressID = insert_address($Street1, $Street2, $City, $State, $Zip);
$AdverseID = insert_person($FName, $MName, $LName, $AddressID, $PhoneID, $EmailID);

$result = insert_matter($Name, $clientID, $AdverseID, $Notes);

if ($result)  {
  header("Location: ../clientPage.php?ID=" . $clientID);
} else {
  echo "something went wrong" . mysqli_error($conn);
}
?>
