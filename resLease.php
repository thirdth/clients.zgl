<?php
include 'includes/garble_cnfg.php';
header_check();
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 welcome">
      <div class="col-md-1">
      </div>
      <div class="col-md-10">
        <h2 style="color: #224468; margin-left: 40px;">Residential Lease Agreement<h2>
        <div class="col-md-12">
          <p>This lease is intended to be used in conjuction with competent legal advice. If you would like to meet with one of our attorneys you can schedule an on-line consultation at any time.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <h3 class="text-center"><strong>Please answer a few preliminary questions before we begin.</strong></h3><hr>
      <form class="form-group" action="/resLeaseInput.php" method="POST">
        <div class="col-md-6">
          <label>How many landlords?</label>
          <input class="form-control" type="text" name="LLNum">
        </div>
        <div class="col-md-6">
          <label>What county is the property located in?</label>
          <select class="form-control">
            <option>Select a county . . .</option>
            <option>Anderson</option>
          </select>
        </div>
        <div class="col-md-12">
          <label>Address of Property</label>
          <label>Street</label>
          <input class="form-control" type="text" name="Street1">
        </div>
        <div class="col-md-12">
          <label>Street</label>
          <input class="form-control" type="text" name="Street2">
        </div>
        <div class="col-md-7">
          <label>City</label>
          <input class="form-control" type="text" name="City">
        </div>
        <div class="col-md-2">
          <label>State</label>
          <input class="form-control" type="text" name="State">
        </div>
        <div class="col-md-3">
          <label>Zip Code</label>
          <input class="form-control" type="text" name="Zip">
        </div>
        <div class="col-md-6">
          <label>How many tenants signing the lease?</label>
          <input class="form-control" type="text" name="numTen">
        </div>
        <div class="col-md-6">
          <label>How many dependant residents</label>
          <input class="form-control" type="text" name="numDep">
        </div>
        <button class="btn btn-success">Next>></button>
      </form>
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
    <div class="col-md-4 docFind">
      <h3 class="text-center">Find a Document</h3><hr>
      <div class="col-md-4">
        <div class="col-md-12 docButton">
          <a href="/resLease.php"><h1>&#127968;&#xFE0E;</h1>
          <h4>Residential Lease</h4></a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="col-md-12 docButton">
          <a href="#"><h1>&#128462;&#xFE0E;</h1>
          <h4>Simple Will</h4></a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="col-md-12 docButton">
          <a href="#"><h1>&#128172;&#xFE0E;</h1>
          <h4>Non-Disclosure Agreement</h4></a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php

include 'includes/footer.php'; ?>
