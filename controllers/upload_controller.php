<?php
require('../data/data.php');
$target_dir = "uploads/";
$uploadOk = 1;
$errors;
$count = 1;

// var_dump($_SERVER);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_FILES["fileToUpload"]["error"] !== 0) {
            $errors =  "Aucunes images n'a été sélectioner";
    } else {
        $_FILES["fileToUpload"]["name"] = uniqid() . '.webp';
        // var_dump($_FILES);
        $target_dir = "../assets/img/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                $errors = "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $errors = "File is not an image.";
                $uploadOk = 0;
            }
        }
        if (empty($_FILES)) {
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $errors =  "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 2000000) {
            $errors =  "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "webp") {
            $errors =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $errors =  "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $success =  "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                array_push($data, $_FILES["fileToUpload"]["name"]);
                var_dump($data);
            } else {
                $errors =  "Sorry, there was an error uploading your file.";
            }
        }
    }
}
