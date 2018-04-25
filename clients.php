<?php
include 'includes/garble_cnfg.php';
protected_page();
header_check();
$clients = get_clients();
?>
<div class="wrapper container">
  <div class="col-md-4">
    <h3>Clients</h3>
            <?php
          foreach ($clients as $client){
            echo $client['FName'] . " " . $client['LName'] . "</br>";
          }
             ?>
  <a href="addClient.php">Add Client</a>
  </div>
</div>


<?php
include 'includes/footer.php'; ?>
