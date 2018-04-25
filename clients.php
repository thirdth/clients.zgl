<?php
include 'includes/garble_cnfg.php';
protected_page();
header_check();
$clients = get_clients();
?>
<div class="wrapper container">
  <?php
foreach ($clients as $client){
  echo $client['FName'] . " " . $client['LName'] . "</br>";
}
   ?>
  <a href="addClient.php">Add Client</a>
</div>


<?php
include 'includes/footer.php'; ?>
