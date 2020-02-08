<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fileupload</title>
</head>
<body>

    <?php 

        // Writes error to user if one is set in get request
        if (isset($_GET['err'])){
            echo '<h1 class="header-text">' . $_GET['err'] . '</h1>';
        } else {
            echo "<h1>The Upload page!</h1>";
        }
    ?>

    
    <!-- Form that takes a file and allows user to submit file to upload -->
    <form action="/upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="fileUploaded" id="inputFileUpload">
        <button type="submit" name="submit" id="btn_uplaod_submit">Upload Fil</button>
    </form>
    
</body>
</html>