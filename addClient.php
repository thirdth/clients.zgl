<?php
include 'includes/garble_cnfg.php';
protected_page();
header_check();
?>
<div class="wrapper container">
  <div class="col-md-3">
  </div>
  <div class="col-md-6">
      <h2>New Client</h2>
      <p>Please enter Client information.</p>
      <form action="inserts/insertClient.php" method="post">
          <div class="form-group">
              <label>First Name</label>
              <input type="text" name="Fname"class="form-control">
              <span class="help-block"></span>
          </div>
          <div class="form-group">
              <label>Middle Name</label>
              <input type="text" name="Mname"class="form-control">
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
