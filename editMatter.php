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
          <div class="form-group col-md-6">
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
          <div class="form-group col-md-2">
              <label>State</label>
              <input type="text" name="State" class="form-control" value="<?php echo $advAddress['State']; ?>">
              <span class="help-block"></span>
          </div>
          <div class="form-group col-md-4">
              <label>Zip</label>
              <input type="text" name="Zip" class="form-control" value="<?php echo $advAddress['Zip']; ?>">
              <span class="help-block"></span>
          </div>
        </div>
      </div>
      <hr>
      <h3>Matter Information</h3>
      <form action="edits/updateMatter.php" method="post">
          <div class="form-group col-md-6">
              <input type="hidden" name="ID" value="<?php echo $matterID; ?>">
              <label>Name:</label>
              <input type="text" name="Name" class="form-control" value="<?php echo $matter['Name']; ?>">
              <span class="help-block"></span>
          </div>
          <div class="form-group col-md-6">
            <select class="form-group" name="Type" value="<?php echo $matter['CategoryID']; ?>">
              <option value="0">Landord/Tenant</option>
              <option value="1">Breach of Contract</option>
              <option value="2">Tort</option>
            </select>
          </div>
          <div class="form-group">
              <label>Notes</label>
              <input type="text" name="Notes" class="form-control" value="<?php echo $matter['Notes']; ?>">
              <span class="help-block"></span>
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
