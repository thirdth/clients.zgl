<?php
include 'includes/garble_cnfg.php';
protected_page();
header_check();
$clients = get_clients();
print_r($clients);
?>
<div class="wrapper container">
  <a href="addClient.php">Add Client</a>
</div>



<?php
include 'includes/footer.php'; ?>
