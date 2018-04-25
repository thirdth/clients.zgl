<?php
include 'includes/garble_cnfg.php';
protected_page();
header_check();
$clients = get_clients();
print_r($clients);
?>
<div class="wrapper container">
  <?php
foreach ($clients as $client){
  echo $client['FName'] . "</br>";
}
   ?>
  <a href="addClient.php">Add Client</a>
</div>
<?php echo $clients[0]['FName']; ?>



<?php
include 'includes/footer.php'; ?>
