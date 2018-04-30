<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include '../includes/garble_cnfg.php';

$matterID = $_POST['ID'];
$ID = $_POST['AdverseID'];
$FName = $_POST['FName'];
$LName = $_POST['LName'];
$advAddressID = $_POST['advAddressID'];
$Street1 = $_POST['Street1'];
$Street2 = $_POST['Street2'];
$City = $_POST['City'];
$State = $_POST['State'];
$Zip = $_POST['Zip'];
$advPhoneID = $_POST['PhoneID'];
$Phone = $_POST['Phone'];
$advEmailID = $_POST['EmailID'];
$Email = $_POST['Email'];

$AddressID = update_address_byID($advAddressID, $Street1, $Street2, $City, $State, $Zip);
$PhoneID = update_phone_byID($advPhoneID, $Phone);
$EmailID = update_email_byID($advEmailID, $Email);


$result = update_person_byID($ID, $FName, $LName, $AddressID, $PhoneID, $EmailID);

if ($result)  {
  header("Location: ../matter.php?ID=" .  $matterID);
} else {
  echo "something went wrong" . mysqli_error($conn);
}

?>
