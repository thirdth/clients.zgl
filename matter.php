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
$claims = get_claims_byID($matterID);
// TODO: add matters here
?>
<div class="wrapper container-fluid">
  <div class="col-md-2 sidebar">
    sidebar column
  </div>
  <div class='col-md-10'>
    <div class="col-md-12">
        <h3 class="text-center"><strong><?php echo $matter['Name']; ?></strong>  (<?php echo $matter['CourtNO']; ?>)</h3>
        <hr>
        <div class="col-md-3">
          <h3><?php echo $person['FName'] . " " . $person['LName']; ?></h3>
          <p><?php echo $address['Street1']; ?></br>
          <?php if ($address['Street2']){
            echo $address['Street2'] . "</br>";
          } ?>
          <?php echo $address['City'] . ", " . $address['State'] . " " . $address['Zip']; ?></br>
          <?php echo $phone['Number']; ?></br>
          <?php echo $email['Email']; ?></p>
          <a class="pull-left" href='editMatter.php?ID=<?php echo $matterID; ?>'>Edit Matter</a>
        </div>
        <div class='col-md-9 notes'>
          <small class="text-center">Notes:</small>
          <p><?php
          foreach ($notes as $note) {
            $phpdate = strtotime($note['Edit_Date']);
            $date = date('M-d-Y', $phpdate);
            echo "<div class='col-md-10' style='border-bottom: 1px dotted lightgrey; margin-bottom: 5px;'>
                    <p class='text-muted text-uppercase'><small>Last Edit: " . $date . " | By: " . $note['CreatorID'] . "</small></p>
                    <p><small>" . $note['Body'] . "</small></p>
                  </div>
                  <div class='col-md-2'>
                      <a href='mailto:" . $email['Email'] . "?Body=" . $note['Body'] . "' class='text-success'>Email</a> |
                      <a href='deletes/deleteNote.php?ID=" . $note['ID'] . "' class='text-danger'>Delete</a>
                  </div>";
          }
          ?></p>
          <form class="form-group" action="inserts/insertNote.php" method="POST">
            <input type="hidden" name="matterID" value="<?php echo $matterID; ?>">
            <div class="form-group col-md-10">
              <textarea class="form-control" rows="3" name="body"></textarea>
            </div>
            <div class="form-group col-md-2">
              <button type="submit" class="btn btn-primary btn-sm pull-right" name="submit" value="note">add Note</button>
            </div>
          </form>
        </div>
        <hr>
      <div class="col-md-12">
        <div class="col-md-12">
          <strong class="text-center">Claims:</strong>
          <?php
            foreach ($claims as $claim) {
              echo "<div class='col-md-12 claim'>
                      <div class='col-md-12'>
                        <p>Description: " . $claim['Description'] . "
                        <a href='/editClaim.php?ID=" . $claim['ID'] . "&MatterID=" . $matterID . "' class=' pull-right'>edit Claim</a>
                        </p>
                      </div>
                    <form class='form-group'>
                      <div class='col-md-2'>
                        <label>Date</label>
                      </div>
                      <div class='col-md-8'>
                        <label>Memo</label>
                      </div>
                      <div class='col-md-2'>
                        <label>Amount</label>
                      </div>";
              $xactionTotal = 0;
              $xactions = get_xaction_byClaimID($claim['ID']);
              foreach ($xactions as $xaction) {
                $phpdate = strtotime($xaction['CreatedDate']);
                $date = date('M-d-Y', $phpdate);
                echo "<div class='col-md-12'>
                        <div class='form-group col-md-2'>
                          <input type='text' class='form-control' value='" . $date . "' readonly>
                        </div>
                        <div class='form-group col-md-5'>
                          <input type='text' class='form-control' value='" . $xaction['Note'] . "' readonly>
                        </div>
                        <div class='form-group col-md-2'>
                          <input type='text' class='form-control text-right' value='" . $xaction['Amount'] . "' readonly>
                        </div>
                        <div class='form-group col-md-2'>
                          <input type='text' class='form-control text-right' value='" . $xaction['CategoryID'] . "' readonly>
                        </div>
                        <div class='form-group col-md-1'>
                          <a href='/deletes/deleteXaction.php?ID=" . $xaction['ID'] . "&matterID=" . $matterID. "' class='btn btn-sm btn-danger pull-right'>delete</a>
                        </div>
                      </div>
                      ";
                $xactionTotal += $xaction['Amount'];
              }
              ?>
                <div class="col-md-8">
                </div>
                <div class="form-group col-md-2">
                  <label>Total</label>
                </div>
                <div class="form-group col-md-2">
                  <input type="text" class="form-control text-right" value="<?php echo number_format($xactionTotal, 2); ?>" readonly>
                </div>
              </form>
              <hr>
              <form class="form-group" action="inserts/insertXaction.php" method="POST">
                <input type="hidden" name="claimID" value="<?php echo $claim['ID']; ?>">
                <input type="hidden" name="matterID" value="<?php echo $matterID; ?>">
                <div class="form-group col-md-3">
                  <label>Amount</label>
                  <div class="input-group">
                    <span class="input-group-addon">$</span>
                    <input type="text" class="form-control" aria-label="amount" name="amount">
                  </div>
                  </div>
                <div class="form-group col-md-5">
                  <label>Memo</label>
                  <input type="text" class="form-control" name="memo">
                </div>
                <div class="form-group col-md-2">
                  <label>Type</label>
                  <select class="form-control" name="type">
                    <option value="0">Damages</option>
                    <option value="1">Attorney Fees</option>
                    <option value="2">Costs</option>
                    <option value="3">Misc.</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <button type="submit" class="btn btn-sm btn-primary pull-right" style="margin-top: 25px;" name="submit">add Transaction</button>
                </div>
              </form>
            </div>
              <?php
            }

           ?>
           <form class="form-group" action="inserts/insertClaim.php" method="POST">
             <input type="hidden" name="matterID" value="<?php echo $matterID; ?>">
             <div class="form-inline">
               <label>Description</label>
               <input type="text" class="form-control" name="description">
               <label>Incident Date</label>
               <input type="text" class="form-control" name="incidentDate">
             </div>
             <div class="form-group">
               <button type="submit" class="btn btn-sm btn-primary pull-right" name="submit">add Claim</button>
             </div>
           </form>
         </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php
include 'includes/footer.php'; ?>
