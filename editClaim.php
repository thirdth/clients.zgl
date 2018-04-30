<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include '../includes/garble_cnfg.php';
protected_page();
header_check();
$claimID = $_GET['ID'];
$matterID = $_GET['matterID'];
$claim = get_claim_byID($claimID);
print_r($claim);
$Description = $claim['Description'];
$Type = $claim['TypeID'];
?>
<div class="wrapper container">
  <div class="col-md-3">
  </div>
  <div class="col-md-6">
      <h2>Edit Claim</h2>
      <p>Please enter Claim information.</p>
      <form action="edits/updateClaim.php" method="post">
          <div class="form-group">
              <input type="hidden" name="matterID" value="<?php echo $matterID; ?>">
              <label>Description</label>
              <input type="text" name="Description" class="form-control" value="<?php echo $Description; ?>">
              <span class="help-block"></span>
          </div>
          <div class="form-group">
              <label>Type of Claim</label>
              <input type="text" name="Type" class="form-control" value="<?php echo $Type; ?>">
              <span class="help-block"></span>
          </div>
          <div class="form-group">
              <input type="submit" class="btn btn-success" name="submit" value="Submit">
          </div>
      </form>
    </div>
  </div>



<?php
include 'includes/footer.php'; ?>
