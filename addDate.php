<?php
include 'includes/garble_cnfg.php';
protected_page();
header_check();
$matterID = $_GET['MatterID'];
?>
<div class="wrapper container">
  <div class="col-md-3">
  </div>
  <div class="col-md-6">
    <form action="inserts/insertDate.php" method="POST" class="form-group">
      <input type="hidden" name="MatterID" value="<? echo $matterID; ?>">
      <input type="date" name="Date">
      <input type="text" name="Description" placeholder="Description">
      <input type="text" name="Note" placeholder="Note">
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
