<?php
include 'includes/garble_cnfg.php';
protected_page();
header_check();
$clientID = $_GET['ID'];
?>
<div class="wrapper container">
  <div class="col-md-1">
  </div>
  <div class="col-md-10">
      <h2>New Matter</h2>
      <p>Please enter Matter information.</p>

      <form action="inserts/insertMatter.php" method="post">
          <input type="hidden" name="clientID" value="<?php echo $clientID; ?>">
        <div class="col-md-6">
          <div class="form-group">
              <label>Name</label>
              <input type="text" name="Name" class="form-control">
              <span class="help-block"></span>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="Name" class="form-control">
            <span class="help-block"></span>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="Name" class="form-control">
            <span class="help-block"></span>
          </div>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="submit" value="Login">
        </div>
      </form>
    </div>
  </div>



<?php
include 'includes/footer.php'; ?>
