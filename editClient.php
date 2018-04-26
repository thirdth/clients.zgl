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
?>
<div class="wrapper container">
  <div class="col-md-3">
  </div>
  <div class="col-md-6">
      <h2>New Client</h2>
      <p>Please enter Client information.</p>
      <form action="edits/updateClient.php" method="post">
          <input type="hidden" name="ID" value="<?php echo $clientID; ?>"
          <div class="form-group">
              <label>First Name</label>
              <input type="text" name="Fname"class="form-control" value="<?php echo $client['FName']; ?>">
              <span class="help-block"></span>
          </div>
          <div class="form-group">
              <label>Middle Name</label>
              <input type="text" name="Mname"class="form-control" value="<?php echo $client['MName']; ?>">
              <span class="help-block"></span>
          </div>
          <div class="form-group">
              <label>Last Name</label>
              <input type="text" name="Lname"class="form-control" value="<?php echo $client['LName']; ?>">
              <span class="help-block"></span>
          </div>
          <div class="form-group">
              <label>Contact</label>
              <input type="text" name="contact"class="form-control" value="<?php echo $client['Contact']; ?>">
          </div>
          <div class="form-group">
              <label>Street 1</label>
              <input type="text" name="street1" class="form-control" value="<?php echo $address['Street1']; ?>">
          </div>
          <div class="form-group">
              <label>Street 2</label>
              <input type="text" name="street2" class="form-control" value="<?php echo $address['Street2']; ?>">
          </div>
          <div class="form-group">
              <label>City</label>
              <input type="text" name="city" class="form-control" value="<?php echo $address['City']; ?>">
          </div>
          <div class="form-group">
              <label>State</label>
              <input type="text" name="state" class="form-control" value="<?php echo $address['State']; ?>">
          </div>
          <div class="form-group">
              <label>Zip Code</label>
              <input type="text" name="zip" class="form-control" value="<?php echo $address['Zip']; ?>">
          </div>
          <div class="form-group">
              <label>Phone Number</label>
              <input type="text" name="phone" class="form-control" value="<?php echo $phone['Number']; ?>">
          </div>
          <div class="form-group">
              <label>Email</label>
              <input type="text" name="email" class="form-control" value="<?php echo $email['Email']; ?>">
          </div>
          <div class="form-group">
              <input type="submit" class="btn btn-primary" name="submit" value="Update">
          </div>
      </form>
    </div>
  </div>


<?php
include 'includes/footer.php'; ?>
