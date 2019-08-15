<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include '../includes/garble_cnfg.php';
$MatterID = $_POST['MatterID'];
$PartyType = $_POST['PartyType'];
$Fname = $_POST['FName'];
$Mname = $_POST['MName'];
$Lname = $_POST['LName'];
$Street1 = $_POST['Street1'];
$Street2 = $_POST['Street2'];
$City = $_POST['City'];
$State = $_POST['State'];
$Zip = $_POST['Zip'];
$Phone = $_POST['Phone'];
$Email = $_POST['Email'];

$PersonID = insert_person_1($Fname, $Mname, $Lname, $SSN)
$AddressID = insert_address_1($Street1, $Street2, $City, $State, $Zip, $PersonID);
$PhoneID = insert_phone_1($Phone, $PersonID);
$EmailID = insert_email_1($Email, $PersonID);
$PartyID = insert_party($PartyType, $MatterID, $PersonID);

if ($PartyID)  {
  header("Location: ../matter.php?ID=" . $MatterID);
} else {
  echo "something went wrong" . mysqli_error($conn);
}
?>
