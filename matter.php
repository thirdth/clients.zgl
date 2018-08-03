<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include 'includes/garble_cnfg.php';
protected_page();
header_check();
$matterID = $_GET['ID'];
$matter = get_matter_byId($matterID);

$notes = get_notes_byID($matterID);
$claims = get_claims_byID($matterID);
$client = get_client_byID($matter['ClientID']);
$clientEmail = get_email_byID($client['EmailID']);
$documents = get_documents_byMatter($matterID);
$appointments = get_dates_byMatter($matterID);

// TODO: add matters here
?>
<div class="wrapper container-fluid">
  <div class="col-md-2 sidebar">
    <div class='col-md-12'>
      <h3>Calendar:</h3>
      <?php
      foreach ($appointments as $appointment) {
        $phpdate = strtotime($appointment['Date']);
        $date = date('M-d-Y', $phpdate);
        echo "<div class='dates text-center'>
                <a href='editDate.php?ID=" . $appointment['ID'] . "'><p>" . $date . "</br>
                <small>" . $appointment['Description'] . "</small></p></a>
              </div>";
      }
       ?>
      <a href="/addDate.php?ID=<?php echo $matterID; ?>" class="btn btn-success btn-sm">add Date</a>
    </div>
    <div class='col-md-12'>
      <h3>Documents:</h3>
      <?php
      foreach ($documents as $document) {
        echo "<div class='documents text-center'>
                <a href='" . $document['Location'] . "' target='_blank'>" . $document['Name'] . "</a>
              </div>";
      }
      ?>
      </table>
      <hr>
      <form action="upload.php" method="post" enctype="multipart/form-data">
        Select file to upload:
        <input type="hidden" name="MatterID" value="<?php echo $matterID; ?>">
        <label class="custom-file">
          <input type="file" name="fileToUpload" id="fileToUpload" class="custom-file-input">
          <span class="custom-file-control"></span>
        </label>
        <input class="btn btn-success" type="submit" value="Upload File" name="submit">
      </form>
    </div>
  </div>
  <div class='col-md-10'>
    <div class="col-md-12">
      <div class='col-md-12'>
        <h3 class="text-center"><strong><?php echo $matter['Name']; ?></strong> <?php if ($matter['CourtNO']) {
                                                                                    echo "(" . $matter['CourtNO'] . ")";} ?></h3>
        <a class="text-center" href='editMatter.php?ID=<?php echo $matterID; ?>'>Edit Matter</a>
      </div>
      <hr>
        <div class="col-md-3">
        <?php
        echo "<h5><a href='/clientPage.php?ID=" . $client['ID'] . "'>" . $client['FName'] . " " . $client['LName'] . "</a></h5>";
        $address = get_address_byID($client['AddressID']);
        echo "<h5>" . $address['Street1'] . "</h5>";
        echo "<h5>" . $address['City'] . "<?h5>" . ", " . $address['State'] . " " . $address['Zip'] . "</h5>";
        $phone = get_phone_byID($client['PhoneID']);
        echo "<h5><a href='tel:+" . $phone['Number'] . "'>" . $phone['Number'] . "</a></h5>";
        $email = get_email_byID($client['EmailID']);
        echo "<h5>" . $email['Email'] . "</h5>";
        ?>
        <a class="btn btn-primary btn-sm" href="/addParty">+ Party</a>
        </div>
        <div class='col-md-9 notes'>
          <small class="text-center">Notes:</small>
          <p><?php
          foreach ($notes as $note) {
            $phpdate = strtotime($note['Edit_Date']);
            $date = date('M-d-Y', $phpdate);
            echo "<div class='col-md-10' style='border-bottom: 1px dotted lightgrey; margin-bottom: 5px;'>
                    <p class='font-weight-bold text-uppercase'><small>Last Edit: " . $date . " | By: " . $note['CreatorID'] . "</small></p>
                    <p><small>" . $note['Body'] . "</small></p>
                  </div>
                  <div class='col-md-2'>
                      <a href='mailto:" . $clientEmail['Email'] . "?Body=" . $note['Body'] . "' class='text-success'>Email</a> |
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
