<?php
include 'includes/garble_cnfg.php';
protected_page();
header_check();
$clientID = $_GET['ID'];
$client = get_client_byId($clientID);
$addressID = $client['AddressID'];
$phoneID = $client['PhoneID'];
$emailID = $client['EmailID'];
$address = get_address_byID($addressID);
$phone = get_phone_byID($phoneID);
$email = get_email_byID($emailID);
// TODO: add matters here
?>
<div class="wrapper container">
  <div class="col-md-12">
    <h3 class="text-center">Client Information</h3>
    </hr>
    <div class="col-md-4">
      <h4><?php echo $client['FName'] . " " . $client['LName']; ?></h4>
      <p><?php echo $address['Street1']; ?></p>
      <p><?php echo $address['Street2']; ?></p>
      <p><?php echo $address['City'] . ", " . $address['State'] . " " . $address['Zip']; ?></p>
      <p><?php echo $phone['Number']; ?></p>
      <p><?php echo $email['Email']; ?></p>
      </hr>
      <a href='editClient.php?ID=" . $clientID . "'>Edit Client</a>
    </div>
    <div class="col-md-4">
      <h3 class="text-center">Case Files:</h3>
    </div>
  </div>
</div>


<?php
include 'includes/footer.php'; ?>
