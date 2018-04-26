<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include 'includes/garble_cnfg.php';
protected_page();
header_check();
$matterID = $_GET['ID'];
$matter = get_matter_byId($matterID);
$adverseID = $matter['AdverseID'];
$person = get_person_byID($adverseID);
$addressID = $person['AddressID'];
$phoneID = $person['PhoneID'];
$emailID = $person['EmailID'];
$address = get_address_byID($addressID);
$phone = get_phone_byID($phoneID);
$email = get_email_byID($emailID);
$notes = get_notes_byID($matterID);
// TODO: add matters here
?>
<div class="wrapper container">
  <div class="col-md-12">
    <h3 class="text-center">Matter Information</h3>
    <h3 class="text-center"><strong><?php echo $matter['Name']; ?></strong></h3>
    <hr>
    <div class="col-md-4">
      <h3><?php echo $person['FName'] . " " . $person['LName']; ?></h3>
      <p><?php echo $address['Street1']; ?></br>
      <?php if ($address['Street2']){
        echo $address['Street2'] . "</br>";
      } ?>
      <?php echo $address['City'] . ", " . $address['State'] . " " . $address['Zip']; ?></br>
      <?php echo $phone['Number']; ?></br>
      <?php echo $email['Email']; ?></p>
      <hr>
      <a href='editMatter.php?ID=<?php echo $matterID; ?>'>Edit Matter</a>
    </div>
    <div class="col-md-8">
      <small class="text-center">Notes:</small>
      <p><?php
      foreach ($notes as $note) {
        echo "<p><small>" . $note['Body'] . "<button type='submit' href='deletes/deleteNote.php?ID=" . $note['ID'] . "' class='btn btn-danger btn-sm pull-right'>Delete</button></p></small><hr>";
      }
      ?></p>
      <form class="form-group" action="inserts/insertNote.php" method="POST">
        <input type="hidden" name="matterID" value="<?php echo $matterID; ?>">
        <div class="form-group">
          <textarea class="form-control" rows="3" name="body"></textarea>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary pull-right" name="submit">add Note</button>
        </div>
      </form>
    </div>
  </div>
</div>


<?php
include 'includes/footer.php'; ?>
