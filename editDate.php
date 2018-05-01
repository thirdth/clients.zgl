<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include 'includes/garble_cnfg.php';
protected_page();
header_check();
$dateID = $_GET['ID'];
$appointment = get_date_byID($dateID);
$phpdate = strtotime($appointment['Date']);
$date = date('m/d/Y', $phpdate);
?>
<div class="wrapper container">
  <div class="col-md-3">
  </div>
  <div class="col-md-6">
    <form action="edits/updateDate.php" method="POST" class="form-group">
      <input type="hidden" name="MatterID" value="<? echo $appointment['MatterID']; ?>">
      <input type="hidden" name="DateID" value="<? echo $dateID; ?>">
      <input type="date" name="Date" value="<?php echo $date; ?>">
      <input type="text" name="Description" value="<?php echo $appointment['Description']; ?>">
      <input type="text" name="Note" value="<?php echo $appointment['Note']; ?>">
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
<?php
include 'includes/footer.php';
 ?>
