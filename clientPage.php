<?php
include 'includes/garble_cnfg.php';
protected_page();
header_check();
$clientID = $_GET['ID'];
$client = get_client_byId($clientID);
// TODO: add matters here
?>
<div class="wrapper container">
  <div class="col-md-12">
    <h3>Client Information</h3>
  </hr>
  <div class="col-md-4">
    <h4><?php echo $client['FName'] . " " . $client['LName']; ?></h4>
  </div>
  </hr>
  <a href='editClient.php?ID=" . $clientID . "'>Edit Client</a>
</div>


<?php
include 'includes/footer.php'; ?>
