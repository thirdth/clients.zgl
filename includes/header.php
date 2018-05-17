<!-- TODO: create README.md and documentation -->
<html>
  <head>
<!-- TODO: get favicon -->
    <meta name="description" content="Protect Your Dreams">
    <meta name="author" content="//zackglaser.com">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=yes">
    <meta charset="utf-8">
    <meta name="mobile-web-app-capable" content="yes">
    <meta id="theme-color" name="theme-color" content="#36f">
    <!--change to _blank if you want to open links in new window-->
    <base target="_self">

    <title>Zack Glaser Legal</title>
<!--TODO: check on polyfil for other browsers -->
    <!--add bootstrap css-->
<!-- TODO: localize bootstap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--specialized css has to load after bootstrap's more general css-->
    <link rel="stylesheet" href="css/fonts/css/font-awesome.min.css"><!-- TODO: localize these fonts -->
    <link rel="stylesheet" href="css/style.css">
    <!-- reCAPTCHA from Google -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>
<body>
    <!--collapsable navbar-->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        <a class="navbar-brand" href="/">
          <p class="brand">ZGL</p>
        </a>
        </div>
        <div class="collapse navbar-collapse col-md-7" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="/">Home</a></li>
            <li><a href="/clients.php">Clients</a></li>
            <li><a href="#">Jobs</a></li>
            <li><a href="#">Calendar</a></li>
						<li><a href="#">Admin</a></li>
          </ul>
        </div>
        <div class="col-md-5 callout">
          <h3 class="text-right text-danger"><a href="login.php">Login</a></h3>
        </div>
      </div>
    </nav>
