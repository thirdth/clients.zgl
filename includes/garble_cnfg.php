<?php
error_reporting(-1);
ini_set('display_errors', 'On');
// TODO: confirm that this DB is protected

function header_check() {
  if(check_logged_in() == false)  {
    include 'header.php';
  } else {
    include 'header_logged.php';
  };
}

// database functions
function get_connected()  {
  $db = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/config/config.ini');
  $conn = mysqli_connect($db['host'], $db['user'], $db['pass'], $db['name']);
  if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
  }
  return $conn;
}


// login functions
function get_hash_by_name ($username)  {
  $conn = get_connected();
  $query = "SELECT hash from Users where username = '" . $username . "' limit 1";
  $results = mysqli_query($conn, $query);
  $all = mysqli_fetch_array($results, MYSQLI_ASSOC);
  mysqli_close($conn);
  return $all['hash'];
}

function verify_me($username, $password)  {
  $hash = get_hash_by_name($username);
  if (password_verify($password, $hash))  {
    return true;
  } else {
    return false;
  }
}

function create_session($username, $password) {
  $_SESSION['username'] = $username;
  $_SESSION['password'] = $password;
  if (isset($_POST['remember']))  {
    setcookie("zglname", $_SESSION['username'], time()+60*60*24*100, "/");
    setcookie("zglpassword", $_SESSION['password'], time()+60*60*24*100, "/"); //TODO: may need to encode this password for storing
    return;
  }
  return;
}

function clear_session_cookies()  {
  session_start();
  unset($_SESSION['username']);
  unset($_SESSION['password']);
  session_unset();
  session_destroy();
  setcookie("zglname", "", time()-60*60*24*100, "/");
  setcookie("zglpassword", "", time()-60*60*24*100, "/");
  return;
}

function check_logged_in() {
  if (!isset($_SESSION))  {
    session_start();
  }
  if(isset($_SESSION['username']) && isset($_SESSION['password']))  {
    return true;
  } else if(isset($_COOKIE['zglname']) && isset($_COOKIE['zglpassword'])) {
    if(verify_me($_COOKIE['zglname'], $_COOKIE['zglpassword'])) {
      create_session($_COOKIE['zglname'], $_COOKIE['zglpassword']);
      return true;
    } else {
      clear_session_cookies();
      return false;
    }
  } else {
    return false;
  }
}

function register_user($name, $password, $email)  {
  $conn = get_connected();
  $pw_hash = password_hash($password, PASSWORD_DEFAULT);
  $sql = "INSERT into Users(username, hash, email)
            VALUES ('$name', '$pw_hash', '$email')";

  if($conn->query($sql) === TRUE) {
    create_session($name, $pw_hash);
    mysqli_close($conn);
    return;
  } else {
    echo "error registering: " . $conn->error;
    mysqli_close($conn);
  }
}

function protected_page() {
  if(check_logged_in() == false)  {
    header("Location: login.php");
    die();
  };
}

// Insert functions

function insert_phone_1($Phone, $PersonID) {
  $Phone = $Phone;
  $PersonID = $PersonID;
  $conn = get_connected();
  $query = "INSERT into Phones (Type, Number, PersonID)
              Values ('1', '$Phone', '$PersonID')";
  $result = mysqli_query($conn, $query);
  $last_id = mysqli_insert_id($conn);
  mysqli_close($conn);
  return $last_id;
}

function insert_phone($phone) {
  $phone = $phone;
  $conn = get_connected();
  $query = "INSERT into Phones (Type, Number)
              Values ('1', '$phone')";
  $result = mysqli_query($conn, $query);
  $last_id = mysqli_insert_id($conn);
  mysqli_close($conn);
  return $last_id;
}

function insert_email($Email, $PersonID) {
  $Email = $Email;
  $PersonID = $PersonID;
  $conn = get_connected();
  $query = "INSERT into Emails (Email, PersonID)
              Values ('$Email', '$PersonID')";
  $result = mysqli_query($conn, $query);
  $last_id = mysqli_insert_id($conn);
  mysqli_close($conn);
  return $last_id;
}

function insert_email($email) {
  $email = $email;
  $conn = get_connected();
  $query = "INSERT into Emails (Email)
              Values ('$email')";
  $result = mysqli_query($conn, $query);
  $last_id = mysqli_insert_id($conn);
  mysqli_close($conn);
  return $last_id;
}

function insert_address($street1, $street2, $city, $state, $zip)  {
  $street1 = $street1;
  $street2 = $street2;
  $city = $city;
  $state = $state;
  $zip = $zip;
  $conn = get_connected();
  $query = "INSERT into Addresses
              (Street1, Street2, City, State, Zip)
              VALUES ('$street1', '$street2', '$city', '$state', '$zip')";
  $result = mysqli_query($conn, $query);
  $last_id = mysqli_insert_id($conn);
  mysqli_close($conn);
  return $last_id;
}

function insert_address_1($Street1, $Street2, $City, $State, $Zip, $PersonID)  {
  $Street1 = $Street1;
  $Street2 = $Street2;
  $City = $City;
  $State = $State;
  $Zip = $Zip;
  $PersonID = $PersonID;
  $conn = get_connected();
  $query = "INSERT into Addresses
              (Street1, Street2, City, State, Zip, PersonID)
              VALUES ('$Street1', '$Street2', '$City', '$State', '$Zip', '$PersonID')";
  $result = mysqli_query($conn, $query);
  $last_id = mysqli_insert_id($conn);
  mysqli_close($conn);
  return $last_id;
}

function insert_client($Fname, $Mname, $Lname, $contact, $address_id, $phone_id, $email_id) {
  $Fname = $Fname;
  $Mname = $Mname;
  $Lname = $Lname;
  $contact = $contact;
  $address_id = $address_id;
  $phone_id = $phone_id;
  $email_id = $email_id;
  $conn = get_connected();
  $query = "INSERT into Clients
              (Fname, Mname, Lname, Contact, AddressID, PhoneID, EmailID)
              VALUES ('$Fname', '$Mname', '$Lname', '$contact', '$address_id', '$phone_id', '$email_id')";
  $result = mysqli_query($conn, $query);
  if ($result)  {
    return $result;
  } else {
    print(mysqli_error($conn));
  }
}

function insert_matter($Name, $clientID, $Description, $MatterNum) {
  $Name = $Name;
  $Description = $Description;
  $clientID = $clientID;
  $MatterNum = $MatterNum;
  $conn = get_connected();
  $query = "INSERT into Matters
              (Name, Description, ClientID, MatterNum)
              VALUES ('$Name', '$Description', '$clientID', '$MatterNum')";
  $result = mysqli_query($conn, $query);
  if ($result)  {
    return $result;
  } else {
    print(mysqli_error($conn));
  }
}

function insert_party($PartyTypeID, $MatterID, $PersonID) {
  $PartyTypeID = $PartyTypeID;
  $MatterID = $MatterID;
  $PersonID = $PersonID;
  $conn = get_connected();
  $query = "INSERT into Parties
              (PartyTypeID, MatterID, PersonID)
              VALUES ('$PartyTypeID', '$MatterID', '$PersonID')";
  $result = mysqli_query($conn, $query);
  if ($result)  {
    return $result;
  } else {
    print(mysqli_error($conn));
}

function insert_person_1($Fname, $Mname, $Lname, $SSN) {
  $Fname = $Fname;
  $Mname = $Mname;
  $Lname = $Lname;
  $SSN = $SSN;
  $conn = get_connected();
  $query = "INSERT into People
              (Fname, Mname, Lname, SSN)
              VALUES ('$Fname', '$Mname', '$Lname', '$SSN')";
  $result = mysqli_query($conn, $query);
  $last_id = mysqli_insert_id($conn);
  return $last_id;
}

function insert_person($Fname, $Mname, $Lname, $address_id, $phone_id, $email_id) {
  $Fname = $Fname;
  $Mname = $Mname;
  $Lname = $Lname;
  $address_id = $address_id;
  $phone_id = $phone_id;
  $email_id = $email_id;
  $conn = get_connected();
  $query = "INSERT into People
              (Fname, Mname, Lname, AddressID, PhoneID, EmailID)
              VALUES ('$Fname', '$Mname', '$Lname', '$address_id', '$phone_id', '$email_id')";
  $result = mysqli_query($conn, $query);
  $last_id = mysqli_insert_id($conn);
  return $last_id;
}

function insert_note($matterID, $body) {
  $matterID = $matterID;
  $body = $body;
  $conn = get_connected();
  $query = "INSERT into Notes
              (MatterID, Body)
              VALUES ('$matterID', '$body')";
  $result = mysqli_query($conn, $query);
  if ($result)  {
    return $result;
  } else {
    print(mysqli_error($conn));
  }
}

function insert_claim($matterID, $description, $incidentDate) {
  $matterID = $matterID;
  $description = $description;
  $incidentDate = $incidentDate;
  $conn = get_connected();
  $query = "INSERT into Claims
              (MatterID, Description, IncidentDate)
              VALUES ('$matterID', '$description', '$incidentDate')";
  $result = mysqli_query($conn, $query);
  if ($result)  {
    return $result;
  } else {
    print(mysqli_error($conn));
  }
}

function insert_xaction($claimID, $note, $amount, $type) {
  $claimID = $claimID;
  $note = $note;
  $amount = $amount;
  $type = $type;
  $conn = get_connected();
  $query = "INSERT into Xactions
              (ClaimID, Note, Amount, CategoryID)
              VALUES ('$claimID', '$note', '$amount', '$type')";
  $result = mysqli_query($conn, $query);
  if ($result)  {
    return $result;
  } else {
    print(mysqli_error($conn));
  }
}

function insert_file_byName($fileName, $matterID, $fileType, $target_file)  {
  $fileName = $fileName;
  $target_file = $target_file;
  $matterID = $matterID;
  $fileType = $fileType;
  $conn = get_connected();
  $query = "INSERT into Documents
              (Name, MatterID, Type, Location)
              VALUES ('$fileName', '$matterID', '$fileType', '$target_file')";
  $result = mysqli_query($conn, $query);
  if ($result)  {
    return $result;
  } else {
    print(mysqli_error($conn));
  }
}

function insert_date_byMatterID($matterID, $date, $description, $note)  {
  $matterID = $matterID;
  $date = $date;
  $description = $description;
  $note = $note;
  $conn = get_connected();
  $query = "INSERT into Dates
              (MatterID, Date, Description, Note)
              VALUES ('$matterID', '$date', '$description', '$note')";
  $result = mysqli_query($conn, $query);
  if ($result)  {
    return $result;
  } else {
    print(mysqli_error($conn));
  }
}

// Update functions

function update_phone($phone, $clientId)  {
  $phone = $phone;
  $clientId = $clientId;
  $conn = get_connected();
  $client = get_client_byId($clientId);
  $phoneId = $client['PhoneID'];
  $query = "UPDATE Phones
              SET Number='$phone' WHERE ID = '$phoneId'";
  $result = mysqli_query($conn, $query);
  mysqli_close($conn);
  return $phoneId;
}

function update_phone_byID($phoneId, $phone)  {
  $phone = $phone;
  $phoneId = $phoneId;
  $conn = get_connected();
  $query = "UPDATE Phones
              SET Number='$phone' WHERE ID = '$phoneId'";
  $result = mysqli_query($conn, $query);
  mysqli_close($conn);
  return $phoneId;
}

function update_email($email, $clientId)  {
  $email = $email;
  $clientId = $clientId;
  $conn = get_connected();
  $client = get_client_byId($clientId);
  $emailId = $client['EmailID'];
  $query = "UPDATE Emails
              SET Email='$email'
              WHERE ID = '$emailId'";
  $result = mysqli_query($conn, $query);
  mysqli_close($conn);
  return $emailId;
}

function update_email_byID($emailId, $email)  {
  $email = $email;
  $emailId = $emailId;
  $conn = get_connected();
  $query = "UPDATE Emails
              SET Email='$email'
              WHERE ID = '$emailId'";
  $result = mysqli_query($conn, $query);
  mysqli_close($conn);
  return $emailId;
}

function update_address($street1, $street2, $city, $state, $zip, $clientId)  {
  $street1 = $street1;
  $street2 = $street2;
  $city = $city;
  $state = $state;
  $zip = $zip;
  $clientId = $clientId;
  $conn = get_connected();
  $client = get_client_byId($clientId);
  $addressId = $client['AddressID'];
  $query = "UPDATE Addresses
              SET Street1='$street1', Street2='$street2', City='$city', State='$state',
              Zip='$zip'
              WHERE ID = '$addressId'";
  $result = mysqli_query($conn, $query);
  $last_id = mysqli_insert_id($conn);
  mysqli_close($conn);
  return $addressId;
}

function update_address_byID($addressID, $street1, $street2, $city, $state, $zip)  {
  $street1 = $street1;
  $street2 = $street2;
  $city = $city;
  $state = $state;
  $zip = $zip;
  $addressId = $addressID;
  $conn = get_connected();
  $query = "UPDATE Addresses
              SET Street1='$street1', Street2='$street2', City='$city', State='$state',
              Zip='$zip'
              WHERE ID = '$addressId'";
  $result = mysqli_query($conn, $query);
  $last_id = mysqli_insert_id($conn);
  mysqli_close($conn);
  return $addressId;
}


function update_client($clientId, $FName, $MName, $LName, $contact, $address_id, $phone_id, $email_id) {
  $clientId = $clientId;
  $FName = $FName;
  $MName = $MName;
  $LName = $LName;
  $contact = $contact;
  $address_id = $address_id;
  $phone_id = $phone_id;
  $email_id = $email_id;
  $conn = get_connected();
  $query = "UPDATE Clients
              SET FName='$FName', MName='$MName', LName='$LName', AddressID='$address_id', PhoneID='$phone_id',
                  EmailID='$email_id', Contact='$contact'
              WHERE id='$clientId'";
  $result = mysqli_query($conn, $query);
  if ($result)  {
    return $result;
  } else {
    print(mysqli_error($conn));
  }
}

function update_claim($claimId, $description, $typeID) {
  $claimId = $claimId;
  $description = $description;
  $typeID = $typeID;
  $conn = get_connected();
  $query = "UPDATE Claims
              SET Description='$description', TypeID='$typeID'
              WHERE ID='$claimId'";
  $result = mysqli_query($conn, $query);
  if ($result)  {
    return $result;
  } else {
    print(mysqli_error($conn));
  }
}

function update_date_byID($dateID, $date, $description, $note) {
  $dateID = $dateID;
  $date = $date;
  $description = $description;
  $note = $note;
  $conn = get_connected();
  $query = "UPDATE Dates
              SET Date = '$date', Description='$description', Note = '$note'
              WHERE ID='$dateID'";
  $result = mysqli_query($conn, $query);
  if ($result)  {
    return $result;
  } else {
    print(mysqli_error($conn));
  }
}

function update_matter_byID($matterID, $name, $courtNO, $notes) {
  $matterID = $matterID;
  $name = $name;
  $courtNO = $courtNO;
  $notes = $notes;
  $conn = get_connected();
  $query = "UPDATE Matters
              SET Name = '$name', CourtNO = '$courtNO', Notes = '$notes'
              WHERE ID = '$matterID'";
  $result = mysqli_query($conn, $query);
  if ($result)  {
    return $matterID;
  } else {
    print(mysqli_error($conn));
  }
}

function update_person_byID($ID, $FName, $LName, $AddressID, $PhoneID, $EmailID)  {
  $ID = $ID;
  $FName = $FName;
  $LName = $LName;
  $AddressID = $AddressID;
  $PhoneID = $PhoneID;
  $EmailID = $EmailID;
  $conn = get_connected();
  $query = "UPDATE People
              SET FName = '$FName', LName = '$LName', AddressID = '$AddressID', PhoneID = '$PhoneID', EmailID = '$EmailID'
              WHERE ID = '$ID'";
  $result = mysqli_query($conn, $query);
  if ($result)  {
    return $result;
  } else {
    print(mysqli_error($conn));
  }
}

// Get Info Functions

function get_parties_byMatter($matterID) {
  $conn = get_connected();
  $query = "SELECT * from Parties, People
              JOIN Parties.PersonID ON People.ID
              WHERE Parties.MatterID = '$matterID'";
  $result = mysqli_query($conn, $query);
  print_r($result);
  $all = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_close($conn);
  return $all;
}

function get_clients()  {
  $conn = get_connected();
  $query = "SELECT * from Clients ORDER by Fname asc";
  $result = mysqli_query($conn, $query);
  $all = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_close($conn);
  return $all;
}

function get_client_byId($clientId)  {
  $conn = get_connected();
  $query = "SELECT * from Clients where ID='$clientId'";
  $result = mysqli_query($conn, $query);
  $all = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_close($conn);
  return $all[0];
}

function get_address_byID($addressID) {
  $conn = get_connected();
  $query = "SELECT * from Addresses where ID='$addressID'";
  $result = mysqli_query($conn, $query);
  $all = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_close($conn);
  if ($all) {
    return $all[0];
  }
}

function get_phone_byID($phoneID) {
  $conn = get_connected();
  $query = "SELECT * from Phones where ID='$phoneID'";
  $result = mysqli_query($conn, $query);
  $all = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_close($conn);
  if ($all) {
    return $all[0];
  }
}

function get_email_byID($emailID) {
  $conn = get_connected();
  $query = "SELECT * from Emails where ID='$emailID'";
  $result = mysqli_query($conn, $query);
  $all = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_close($conn);
  if ($all) {
    return $all[0];
  }
}

function get_matters_byClientID($clientID)  {
  $clientID = $clientID;
  $conn = get_connected();
  $query = "SELECT * from Matters where ClientID = '$clientID' ORDER by Name asc";
  $result = mysqli_query($conn, $query);
  $all = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_close($conn);
  return $all;
}

function get_matter_byId($matterID)  {
  $conn = get_connected();
  $query = "SELECT * from Matters where ID='$matterID'";
  $result = mysqli_query($conn, $query);
  $all = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_close($conn);
  return $all[0];
}

function get_person_byID($personID) {
  $conn = get_connected();
  $query = "SELECT * from People where ID='$personID'";
  $result = mysqli_query($conn, $query);
  $all = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_close($conn);
  if ($all) {
    return $all[0];
  }
}

function get_people_byMatter($matterID) {
  $conn = get_connected();
  $query = "SELECT * from People where MatterID='$matterID'";
  $result = mysqli_query($conn, $query);
  $all = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_close($conn);
  return $all;
}

function get_notes_byId($matterID)  {
  $conn = get_connected();
  $query = "SELECT * from Notes where MatterID='$matterID'";
  $result = mysqli_query($conn, $query);
  $all = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_close($conn);
  return $all;
}

function get_claims_byId($matterID)  {
  $conn = get_connected();
  $query = "SELECT * from Claims where MatterID='$matterID'";
  $result = mysqli_query($conn, $query);
  $all = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_close($conn);
  return $all;
}

function get_claim_byId($claimID)  {
  $conn = get_connected();
  $query = "SELECT * from Claims where ID='$claimID' Limit 1";
  $result = mysqli_query($conn, $query);
  $all = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_close($conn);
  return $all[0];
}

function get_xaction_byClaimId($claimID)  {
  $conn = get_connected();
  $query = "SELECT * from Xactions where ClaimID='$claimID'";
  $result = mysqli_query($conn, $query);
  $all = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_close($conn);
  return $all;
}

function get_documents_byMatter($matterID) {
  $conn = get_connected();
  $query = "SELECT * from Documents where MatterID='$matterID'";
  $result = mysqli_query($conn, $query);
  $all = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_close($conn);
  return $all;
}

function get_dates_byMatter($matterID) {
  $conn = get_connected();
  $query = "SELECT * from Appointments where MatterID='$matterID'";
  $result = mysqli_query($conn, $query);
  $all = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_close($conn);
  return $all;
}

function get_date_byId($ID)  {
  $conn = get_connected();
  $query = "SELECT * from Appointments where ID='$ID'";
  $result = mysqli_query($conn, $query);
  $all = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_close($conn);
  return $all[0];
}

function get_party_types()  {
  $conn = get_connected();
  $query = "SELECT * from PartyType";
  $result = mysqli_query($conn, $query);
  $all = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_close($conn);
  return $all;
}



// Delete functions

function delete_note($noteID) {
  $conn = get_connected();
  $query = "SELECT * from Notes where ID='$noteID'";
  $result = mysqli_query($conn, $query);
  $all = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $matterID = $all[0];
  $sql = "DELETE from Notes where ID='$noteID'";
  if ($conn->query($sql) === TRUE) {
      mysqli_close($conn);
      header("Location: ../matter.php?ID=" . $matterID['MatterID']);
  } else {
      echo "Error deleting record: " . $conn->error;
  }
  $conn->close();
}

function delete_xaction($xactionID, $matterID) {
  $conn = get_connected();
  $xactionID = $xactionID;
  $matterID = $matterID;
  $sql = "DELETE from Xactions where ID='$xactionID'";
  if ($conn->query($sql) === TRUE) {
      mysqli_close($conn);
      header("Location: ../matter.php?ID=" . $matterID);
  } else {
      echo "Error deleting record: " . $conn->error;
  }
  $conn->close();
}

function delete_claim($claimID, $matterID) {
  $conn = get_connected();
  $claimID = $claimID;
  $matterID = $matterID;
  $sql = "DELETE from Claims where ID='$claimID'";
  if ($conn->query($sql) === TRUE) {
      mysqli_close($conn);
      header("Location: ../matter.php?ID=" . $matterID);
  } else {
      echo "Error deleting record: " . $conn->error;
  }
  $conn->close();
}

function delete_matter($matterID) {
  $matterID = $matterID;
  $conn = get_connected();
  $query = "DELETE from Matters where ID='$matterID'";
  if ($conn->query($query) === TRUE) {
      mysqli_close($conn);
      header("Location: ../clients.php");
  } else {
      echo "Error deleting record: " . $conn->error;
  }
  $conn->close();
}
?>
