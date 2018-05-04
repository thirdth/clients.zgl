<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include 'includes/garble_cnfg.php';
// Get the PHP helper library from https://twilio.com/docs/libraries/php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
require_once 'SDK/twilio-php-master/Twilio/autoload.php'; // Loads the library
use Twilio\Rest\Client;
protected_page();
header_check();

// Your Account Sid and Auth Token from twilio.com/user/account
$callSid= $_GET['callSid']
print_r($_GET);
$client = new Client($TWsid, $TWtoken);

echo $callSid;

$recordings = $client->recordings->read(
    array(
        "callSid" => $callSid,
    )
);

//print_r($client->recordings->read());
// Loop over the list of recordings and echo a property for each one
foreach ($recordings as $recording) {
    echo "<div>
            <a href='https://api.twilio.com/2010-04-01/Accounts/" . $TWsid . "/Recordings/" . $recording->sid . "'>" . $recording->sid . "</a>
          </div>";
}


?>



<?php
include 'includes/footer.php';
?>
