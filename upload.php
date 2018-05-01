<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include 'includes/garble_cnfg.php';
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$matterID = $_POST['MatterID'];
$fileName = basename($_FILES['fileToUpload']['name']);


// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $result = insert_file_byName($fileName, $matterID, $fileType, $target_file);
        if($result) {
          header("Location: ../matter.php?ID=" .  $matterID);
        } else {
          echo "damn";
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
