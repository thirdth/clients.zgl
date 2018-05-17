<?php
include 'includes/garble_cnfg.php';
header_check();
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 welcome">
      <div class="col-md-2">
      </div>
      <div class="col-md-8">
        <h2 class="text-center">Welcome<h2>
        <div class="col-md-12">
          <p>The self-service portal is a way to create Tennessee specific documents on your own time. Once purchased, you can download your document for immediate use or opt to have it emailed to you and up to two other parties. If you have any questions along the way, or you just want to have your document reviewed by an experienced attorney, set-up an online consultation at any time or add it on to your purchase at checkout.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <p>Create professional looking leagal documents in 5 easy steps.</p>
      <h3>1. Create an account, Login, or Continue as a Guest</h3>
      <p>When you create an account, you will have the ability to save your documents and access them at a later date. You can also save time through auto-fill options.</p>
      <h3>2. Browse and Select a Document</h3>
      <p>Search through the documents that we offer. When you find one that will fit your needs, select it and begin tayloring it to your needs. If you need help at any time, you can always set-up a consultation with one of our lawyers.</p>
      <h3>3. Answer the Questions</h3>
      <p>Once you have selected your document, you will be able to fill out the form by answering a series of questions that are asked. Once you are done, you will be asked to verify the answers to your questions before moving on.</p>
      <h3>4. Select Add-ons</h3>
      <p>Once you have completed your document, you will be presented with some options that others found helpful when creating the same document. At that time, you can elect to have a licensed Tennessee attorney review your document and your specific situation.</p>
      <h3>5. Pay and Download</h3>
      <p>Once you have selected any extra services or related documents you may pay for and download your purchases.</p>
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
          <a href="/resLease"><h1>&#127968;&#xFE0E;</h1>
          <h4>Residential Lease</h4></a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="col-md-12 docButton">
          <a href="/simpWill"><h1>&#128462;&#xFE0E;</h1>
          <h4>Simple Will</h4></a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="col-md-12 docButton">
          <a href="/NDA"><h1>&#128172;&#xFE0E;</h1>
          <h4>Non-Disclosure Agreement</h4></a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php

include 'includes/footer.php'; ?>
