<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include '../includes/garble_cnfg.php';
$client_name = $_POST['name'];
$contact = $_POST['contact'];
$street1 = $_POST['street1'];
$street2 = $_POST['street2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$phone = $_POST['phone'];
$email = $_POST['email'];

$phone_id = insert_phone($phone);
$email_id = insert_email($email);
$address_id = insert_address($street1, $street2, $city, $state, $zip);

$result = insert_client($client_name, $contact, $address_id, $phone_id, $email_id);

if ($result)  {
  header("Location: clients.php");
} else {
  echo "something went wrong" . mysqli_error($conn);
}
?>
