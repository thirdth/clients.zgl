<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include 'includes/garble_cnfg.php';
protected_page();
header_check();
$matterID = $_GET['ID'];
$partyTypes = get_party_types();
//print_r($partyTypes);
?>
<div class="wrapper container">
  <div class="col-md-3">
  </div>
  <div class="col-md-6">
    <h3>Add Party</h3>
    <hr>
    <form action="inserts/insertParty.php" method="POST" class="form-group">
        <input type="hidden" name="MatterID" value="<? echo $matterID; ?>">
      <div class='col-md-12 form-group'>
        <label>Party Type</label>
        <select class='form-control' name='PartyTypeID'>
          <?php
            foreach ($partyTypes as $party) {
              echo "<option value='" . $party['ID'] . "'>". $party['Name'] . "</option>";
              //echo $party['Name'];
            }
          ?>
        </select>
      </div>
      <div class='col-md-4 form-group'>
        <label>First/Company Name</label>
        <input class="form-control" type="text" name="FName">
      </div>
      <div class='col-md-4 form-group'>
        <label>Middle Name/Initial</label>
        <input class="form-control" type="text" name="MName">
      </div>
      <div class='col-md-4 form-group'>
        <label>Last Name</label>
        <input class="form-control" type="text" name="LName">
      </div>
      <div class='col-md-12 form-group'>
        <label>Street</label>
        <input class="form-control" type="text" name="Street1">
      </div>
      <div class='col-md-12 form-group'>
        <label>Street Line 2</label>
        <input class="form-control" type="text" name="Street2">
      </div>
      <div class='col-md-7 form-group'>
        <label>City</label>
        <input class="form-control" type="text" name="City">
      </div>
      <div class='col-md-2 form-group'>
        <label>State</label>
        <input class="form-control" type="text" name="State">
      </div>
      <div class='col-md-3 form-group'>
        <label>Zip</label>
        <input class="form-control" type="text" name="Zip">
      </div>
      <div class='col-md-5 form-group'>
        <label>Phone</label>
        <input class="form-control" type="text" name="Phone">
      </div>
      <div class='col-md-7 form-group'>
        <label>Email Address</label>
        <input class="form-control" type="email" name="Email">
      </div>
      <div class="row">
        <div class='col-md-12 form-group'>
          <div class='col-md-4'>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<?php
include 'includes/footer.php';
 ?>
