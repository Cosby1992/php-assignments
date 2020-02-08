
<?php

    // define file path on server side
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileUploaded"]["name"]);

    // error handling bool
    $uploadOk = 1;

    // gets file extension in lowercase
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileUploaded"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $errorMsg = "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $errorMsg = "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileUpload"]["size"] > 500000) {
        $errorMsg = "Sorry, your file is too large. (max 500 kb)";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $errorMsg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {

        // redirect to index.php with error info
        header('Location: /index.php?err=' . $errorMsg);
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileUploaded"]["tmp_name"], $target_file)) {
            $succesMsg = "The file ". basename( $_FILES["fileUploaded"]["name"]). " has been uploaded.";
            header('Location: /index.php?err=' . $succesMsg); //redirect with good news (url extension succes msg)
        } else {
            $errorMsg = "Sorry, there was an error uploading your file.";
            header('Location: /index.php?err=' . $errorMsg); //redirect with bad news (url extension error msg)
        }
    }
?>