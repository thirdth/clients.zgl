<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include '../includes/garble_cnfg.php';
$Fname = $_POST['Fname'];
$Mname = $_POST['Mname'];
$Lname = $_POST['Lname'];
$Contact = $_POST['contact'];
$Street1 = $_POST['street1'];
$Street2 = $_POST['street2'];
$City = $_POST['city'];
$State = $_POST['state'];
$Zip = $_POST['zip'];
$Phone = $_POST['phone'];
$Email = $_POST['email'];

$PhoneID = insert_phone($Phone);
$EmailID = insert_email($Email);
$AddressID = insert_address($Street1, $Street2, $City, $State, $Zip);

$result = insert_client($Fname, $Mname, $Lname, $Contact, $AddressID, $PhoneID, $EmailID);

if ($result)  {
  header("Location: clients.php");
} else {
  echo "something went wrong" . mysqli_error($conn);
}
?>
