<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include 'includes/garble_cnfg.php';
protected_page();
header_check();
$matterID = $_GET['ID'];
$matter = get_matter_byID($matterID);

$client = get_client_byID($matter['ClientID']);
$address = get_address_byID($client['AddressID']);
$phone = get_phone_byID($client['PhoneID']);
$email = get_email_byID($client['EmailID']);
$adverse = get_person_byID($matter['AdverseID']);
$advAddress = get_address_byID($adverse['AddressID']);
$advPhone = get_phone_byID($adverse['PhoneID']);
$advEmail = get_email_byID($adverse['EmailID']);


?>
<div class="wrapper container-fluid">
  <div class="col-md-2 sidebar">
    sidebar
  </div>
  <div class="col-md-10">
      <h3 class="text-center"><strong>Edit: <?php echo $matter['Name']; ?></strong></h3>
      <div class='col-md-12'>
        <hr>
        <div class="col-md-4 client">
          <h3 class="text-center"><strong>Client Information</strong></h3>
          <h3><?php echo $client['FName'] . " " . $client['LName']; ?></h3>
          <p><?php echo $address['Street1']; ?></br>
          <?php if ($address['Street2']){
            echo $address['Street2'] . "</br>";
          } ?>
          <?php echo $address['City'] . ", " . $address['State'] . " " . $address['Zip']; ?></br>
          <?php echo $phone['Number']; ?></br>
          <?php echo $email['Email']; ?></p>
          <a href='editClient.php?ID=<?php echo $matter['ClientID']; ?>'>Edit Client</a>
        </div>
        <div class="col-md-8 OtherParties">
          <h3 class="text-center">Adverse</h3>
          <form action="edits/updatePerson.php" method="POST">
            <div class="form-group col-md-6">
                <input type="hidden" name="AdverseID" value="<?php echo $matter['AdverseID']; ?>">
                <input type="hidden" name="ID" value="<?php echo $matterID; ?>">
                <label>First Name</label>
                <input type="text" name="FName" class="form-control" value="<?php echo $adverse['FName']; ?>">
                <span class="help-block"></span>
            </div>
            <div class="form-group col-md-6">
                <label>Last Name</label>
                <input type="text" name="LName" class="form-control" value="<?php echo $adverse['LName']; ?>">
                <span class="help-block"></span>
            </div>
            <div class="form-group col-md-12">
                <input type="hidden" name="advAddressID" value="<?php echo $advAddress['ID']; ?>">
                <label>Street</label>
                <input type="text" name="Street1" class="form-control" value="<?php echo $advAddress['Street1']; ?>">
                <span class="help-block"></span>
            </div>
            <div class="form-group col-md-12">
                <label>Street 2</label>
                <input type="text" name="Street2" class="form-control" value="<?php echo $advAddress['Street2']; ?>">
                <span class="help-block"></span>
            </div>
            <div class="form-group col-md-6">
                <label>City</label>
                <input type="text" name="City" class="form-control" value="<?php echo $advAddress['City']; ?>">
                <span class="help-block"></span>
            </div>
            <div class="form-group col-md-3">
                <label>State</label>
                <input type="text" name="State" class="form-control" value="<?php echo $advAddress['State']; ?>">
                <span class="help-block"></span>
            </div>
            <div class="form-group col-md-3">
                <label>Zip</label>
                <input type="text" name="Zip" class="form-control" value="<?php echo $advAddress['Zip']; ?>">
                <span class="help-block"></span>
            </div>
            <div class="form-group col-md-4">
                <input type="hidden" name="PhoneID" value="<?php echo $advPhone['ID']; ?>">
                <label>Phone</label>
                <input type="text" name="Phone" class="form-control" value="<?php echo $advPhone['Number']; ?>">
            </div>
            <div class="form-group col-md-6">
                <input type="hidden" name="EmailID" value="<?php echo $advEmail['ID']; ?>">
                <label>Email</label>
                <input type="text" name="Email" class="form-control" value="<?php echo $advEmail['Email']; ?>">
            </div>
            <button type="submit" class="btn btn-success btn-sm pull-right" name="submitPerson" value="submitPerson">Edit Info</button>
          </form>
        </div>
      </div>
      <hr>
      <h3>Matter Information</h3>
      <form action="edits/updateMatter.php" method="post">
          <div class="form-group col-md-6">
              <input type="hidden" name="ID" value="<?php echo $matterID; ?>">
              <label>Caption:</label>
              <input type="text" name="Name" class="form-control" value="<?php echo $matter['Name']; ?>">
              <span class="help-block"></span>
          </div>
          <div class="form-group col-md-6">
              <label>Docket No:</label>
              <input type="text" name="CourtNO" class="form-control" value="<?php echo $matter['CourtNO']; ?>">
              <span class="help-block"></span>
          </div>
          <div class="form-group col-md-12">
              <label>Notes</label>
              <textarea class="form-control" rows="3" name="Notes" value="<?php echo $matter['Notes']; ?>"></textarea>
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-success" name="submit" value="Submit">Submit</button>
              <a href="deletes/deleteMatter.php?ID=<?php echo $matterID; ?>" class="btn btn-danger btn-sm pull-right">delete Matter</a>
          </div>
      </form>
    </div>
  </div>



<?php
include 'includes/footer.php'; ?>
