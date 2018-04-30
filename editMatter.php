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
        <h3>Client Information</h3>
        <hr>
        <div class="col-md-4">
          <h3><?php echo $client['FName'] . " " . $client['LName']; ?></h3>
          <p><?php echo $address['Street1']; ?></br>
          <?php if ($address['Street2']){
            echo $address['Street2'] . "</br>";
          } ?>
          <?php echo $address['City'] . ", " . $address['State'] . " " . $address['Zip']; ?></br>
          <?php echo $phone['Number']; ?></br>
          <?php echo $email['Email']; ?></p>
          <a href='editClient.php?ID=<?php echo $clientID; ?>'>Edit Client</a>
        </div>
      </div>
      <hr>
      <h3>Matter Information</h3>
      <form action="edits/updateMatter.php" method="post">
          <div class="form-group">
              <input type="hidden" name="ID" value="<?php echo $matterID; ?>">
              <label>Name:</label>
              <input type="text" name="Name" class="form-control" value="<?php echo $matter['Name']; ?>">
              <span class="help-block"></span>
          </div>
          <div class="form-group">
              <label>Notes</label>
              <input type="text" name="Notes" class="form-control" value="<?php echo $matter['Notes']; ?>">
              <span class="help-block"></span>
          </div>
          <div class="form-group">
              <label>First Name</label>
              <input type="text" name="FName" class="form-control" value="<?php echo $adverse['FName']; ?>">
              <span class="help-block"></span>
          </div>
          <div class="form-group">
              <label>Last Name</label>
              <input type="text" name="LName" class="form-control" value="<?php echo $adverse['LName']; ?>">
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
