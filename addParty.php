<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include 'includes/garble_cnfg.php';
protected_page();
header_check();
$matterID = $_GET['ID'];
$partyTypes = get_party_types();
?>
<div class="wrapper container">
  <div class="col-md-3">
  </div>
  <div class="col-md-6">
    <form action="inserts/insertParty.php" method="POST" class="form-group">
        <input type="hidden" name="MatterID" value="<? echo $matterID; ?>">
      <div class='col-md-4 form-group'>
        <select>
          <?php
            foreach ($partyTypes as $party) {
              echo "<option value='" . $party['ID'] . "'>". $party['name'] . "</option>"
            }
          ?>
        </select>
      </div>
      <div class='col-md-4 form-group'>
        <input type="text" name="FName">
      </div>
      <div class='col-md-4 form-group'>
        <input type="text" name="MName">
      </div>
      <div class='col-md-4 form-group'>
        <input type="text" name="LName">
      </div>
      <div class='col-md-12 form-group'>
        <input type="text" name="Street1">
      </div>
      <div class='col-md-12 form-group'>
        <input type="text" name="Street2">
      </div>
      <div class='col-md-7'>
        <input type="text" name="City">
      </div>
      <div class='col-md-2'>
        <input type="text" name="State">
      </div>
      <div class='col-md-3'>
        <input type="text" name="Zip">
      </div>
      <div class='col-md-5'>
        <input type="text" name="Phone">
      </div>
      <div class='col-md-7'>
        <input type="text" name="Email">
      </div>
      <div class='col-md-12'>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>
<?php
include 'includes/footer.php';
 ?>
