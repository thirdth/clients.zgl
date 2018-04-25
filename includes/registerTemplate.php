<div class="col-md-12">
  <div class="col-md-3">
  </div>
  <div class="col-md-6">
    <h3><?php $error ?></h3>
    <form method="POST" action="inserts/insertUser.php">
      <input type="text" class="form-control" name="name" placeholder="username">
      <input type="text" class="form-control" name="email" placeholder="email@example.com">
      <input type="password" class="form-control" name="password" placeholder="password">
      <input type="checkbox" class="from-control" name="remember">Remember me
      <input type="submit" class="btn btn-success">
    </form>
  </div>
  <div class="col-md-3">
  </div>
</div>
