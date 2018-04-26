<?php
include 'includes/garble_cnfg.php';
protected_page();
header_check();
$matterID = $_GET['ID'];
$matter = get_matter_byId($matterID);
$addressID = $matter['AddressID'];
$phoneID = $matter['PhoneID'];
$emailID = $matter['EmailID'];
$address = get_address_byID($addressID);
$phone = get_phone_byID($phoneID);
$email = get_email_byID($emailID);
// TODO: add matters here
?>
<div class="wrapper container">
  <div class="col-md-12">
    <h3 class="text-center">Matter Information</h3>
    <hr>
    <div class="col-md-4">
      <h3><?php echo $matter['FName'] . " " . $matter['LName']; ?></h3>
      <p><?php echo $address['Street1']; ?></br>
      <?php if ($address['Street2']){
        echo $address['Street2'] . "</br>";
      } ?>
      <?php echo $address['City'] . ", " . $address['State'] . " " . $address['Zip']; ?></br>
      <?php echo $phone['Number']; ?></br>
      <?php echo $email['Email']; ?></p>
      <hr>
      <a href='editMatter.php?ID=<?php echo $MatterID; ?>'>Edit Matter</a>
    </div>
    <div class="col-md-4">
      <h3 class="text-center">Notes:</h3>
      <p><?php echo $matter['Notes']; ?></p>
    </div>
  </div>
</div>


<?php
include 'includes/footer.php'; ?>