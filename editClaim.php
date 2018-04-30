<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include 'includes/garble_cnfg.php';
protected_page();
header_check();
$claimID = $_GET['ID'];
$claim = get_claim_byID($claimID);
print_r($claim);
$Description = $claim['Description'];
$Type = $claim['CategoryID'];
?>
<div class="wrapper container">
  <div class="col-md-3">
  </div>
  <div class="col-md-6">
      <h2>Edit Claim</h2>
      <p>Please enter Claim information.</p>
      <form action="inserts/updateClaim.php" method="post">
          <div class="form-group">
              <label>Description</label>
              <input type="text" name="Description"class="form-control" value="<?php echo $Description; ?>">
              <span class="help-block"></span>
          </div>
          <div class="form-group">
              <label>Type of Claim</label>
              <input type="text" name="Type"class="form-control" value="<?php echo $Type; ?>">
              <span class="help-block"></span>
          </div>
          <div class="form-group">
              <label>Last Name</label>
              <input type="text" name="Lname"class="form-control">
              <span class="help-block"></span>
          </div>
          <div class="form-group">
              <label>Contact</label>
              <input type="text" name="contact"class="form-control">
          </div>
          <div class="form-group">
              <label>Street 1</label>
              <input type="text" name="street1" class="form-control">
          </div>
          <div class="form-group">
              <label>Street 2</label>
              <input type="text" name="street2" class="form-control">
          </div>
          <div class="form-group">
              <label>City</label>
              <input type="text" name="city" class="form-control">
          </div>
          <div class="form-group">
              <label>State</label>
              <input type="text" name="state" class="form-control">
          </div>
          <div class="form-group">
              <label>Zip Code</label>
              <input type="text" name="zip" class="form-control">
          </div>
          <div class="form-group">
              <label>Phone Number</label>
              <input type="text" name="phone" class="form-control">
          </div>
          <div class="form-group">
              <label>Email</label>
              <input type="text" name="email" class="form-control">
          </div>
          <div class="form-group">
              <input type="submit" class="btn btn-primary" name="submit" value="Login">
          </div>
      </form>
    </div>
  </div>



<?php
include 'includes/footer.php'; ?>
