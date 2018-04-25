<?php
include 'includes/garble_cnfg.php';
if (check_logged_in())  {
  header("Location: clients.php");
}
include 'includes/header.php';
?>

<div class="wrapper container">
  <div class="col-md-3">
  </div>
  <div class="col-md-6">
      <h2>Login</h2>
      <p>Please fill in your credentials to login.</p>
      <form action="/verify.php" method="post">
          <div class="form-group">
              <label>Username</label>
              <input type="text" name="username"class="form-control">
              <span class="help-block"></span>
          </div>
          <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control">
          </div>
          <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Login">
          </div>
          <p>Don't have an account? <a href="signup.php">Sign up now</a>.</p>
      </form>
    </div>
  </div>

<?php
include 'includes/footer.php'; ?>
