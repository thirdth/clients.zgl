<?php
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
  session_start();
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

function insert_client($client_name, $contact, $address_id, $phone_id, $email_id) {
  $client_name = $client_name;
  $contact = $contact;
  $address_id = $address_id;
  $phone_id = $phone_id;
  $email_id = $email_id;
  $conn = get_connected();
  $query = "INSERT into Clients
              (Name, Contact, AddressID, PhoneID, EmailID)
              VALUES ('$client_name', '$contact', '$address_id', '$phone_id', '$email_id')";
  $result = mysqli_query($conn, $query);
  if ($result)  {
    return $result;
  } else {
    print(mysqli_error($conn));
  }
}
?>
