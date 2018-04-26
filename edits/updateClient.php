<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include '../includes/garble_cnfg.php';
$ClientID = $_POST['ID'];
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

$PhoneID = update_phone($Phone, $ClientID);
$EmailID = update_email($Email, $ClientID);
$AddressID = update_address($Street1, $Street2, $City, $State, $Zip, $ClientID);

$result = update_client($ClientID, $Fname, $Mname, $Lname, $Contact, $AddressID, $PhoneID, $EmailID);

if ($result)  {
  header("Location: ../clientPage.php?ID=<?php echo $ClientID; ?>");
} else {
  echo "something went wrong" . mysqli_error($conn);
}
?>
