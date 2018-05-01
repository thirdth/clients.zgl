<?php
$target_dir = "uploads/";
$fileName = $_FILES['filetoUpload'];
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$matterID = $_POST['MatterID'];
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $fileInfo = insert_file_byName($fileName, $matterID, $fileType, 'Zack', $target_file)
        if ($fileInfo) {
          header("Location: ../matter.php?ID=" .  $fileInfo['MatterID']);
        }else {
          echo "Bam! Errored!";
        }
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
