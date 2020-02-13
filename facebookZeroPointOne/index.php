<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No Face Chat</title>

    <link rel="stylesheet" href="faceStyle.css">
    <link rel="stylesheet" href="message.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<?php

    session_start();

    include './index.inc.php';
    include './database/database.inc.php';

    checkAuth();

    if (!empty($_POST['msg']) && isset($_SESSION['username']) && !empty($_SESSION['username'])) {
        sendMsg($_SESSION['username'], $_POST['msg']);
        header('location: index.php');
    }

    // works: signUp("admin", "pwd", "123");

    // works: getUser("admin"); //retrives an array of userdata

    // works & prints: print_r(getUser("admin"));

    /* works: 
    if(comTokens("admin", "124") === true) {
        echo "true";
    } else echo "false";
    */





?>

<div class="container">


    <div class="container-sm">

    <h1>No Face Chat</h1>

        <div class="msgscrollview">

            <?php
                
                getMessages();

            ?>

        </div>

        
    </div>

    <div id="sendTextContainer">
        <form action="/index.php" method="post">
            <input type="text" class="form-control" name="msg" id="msginput">
            <button type="submit" class="btn btn-primary" id="sendbtn">Send</button>
        </form>
    </div>


</div>

    

<!-- Bootstrap js -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>