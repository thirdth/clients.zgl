<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include 'includes/garble_cnfg.php';
protected_page();
header_check();
$matterID = $_GET['ID'];
$matter = get_matter_byID($matterID);

$client = get_client_byID($matter['ClientID']);
$adverse = get_person_byID($matter['AdverseID']);

?>
<div class="wrapper container-fluid">
  <div class="col-md-2">
    sidebar
  </div>
  <div class="col-md-10">
      <h2>Edit: <?php echo $matter['Name']; ?></h2>
      <div class='col-md-12'>
        <h3>Client Information</h3>
        <a href="editClient.php?ID=<?php echo $matter['ClientID']; ?>" class="btn btn-success btn-sm">Edit Client</a>
      </div>
      <hr>
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
