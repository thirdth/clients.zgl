<?php
include 'includes/garble_cnfg.php';
header_check();
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="text-center">Welcome<h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8">
      <h3 class="text-center">Create Document</h3>
      <div class="col-md-4">
        <div class="col-md-12 docButton">
          <h3>&#127968; Residential Lease</h3>
        </div>
      </div>
      <div class="col-md-4">
        <div class="col-md-12 docButton">
          <h3>Simple Will</h3>
        </div>
      </div>
      <div class="col-md-4">
        <div class="col-md-12 docButton">
          <h3>Non-Discolure Agreement</h3>
        </div>
      </div>
    </div>
    <div class="col-md-4 login">
      <h3 class="text-center">Login/Signup</h3>
      <form action="verify.php" method="post">
          <div class="form-group">
              <label>Username</label>
              <input type="text" name="username"class="form-control">
              <span class="help-block"></span>
          </div>
          <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control">
          </div>
          <div class="col-md-6">
            <input type="checkbox" name="remember">Remember me
          </div>
          <div class="form-group">
              <input type="submit" class="btn btn-primary" name="submit" value="Login">
          </div>
          <p>Don't have an account? <a href="signup.php">Sign up now</a>.</p>
      </form>
    </div>
  </div>
</div>
<?php

include 'includes/footer.php'; ?>
