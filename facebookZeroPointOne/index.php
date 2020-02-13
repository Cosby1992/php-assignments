<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No Face Chat</title>

    <!-- // Import of stylesheets -->
    <link rel="stylesheet" href="./styles/faceStyle.css">
    <link rel="stylesheet" href="./styles/message.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<?php
    // sessions start and include files
    session_start();

    include './index.inc.php';
    include './database/database.inc.php';

    if(isset($_POST['logout'])){
        // remove all session variables
        session_unset();

        // destroy the session
        session_destroy();
    }

    // check if user is authenticated
    checkAuth();

    if (!empty($_POST['msg'])){
        sendMsg($_SESSION['username'], $_POST['msg']);
        $_SESSION['msgCounter']++;

        header('location: index.php');
    }

?>

    <div class="container">

        <div class="container-sm">

            <?php

                if(isset($_SESSION['username'])){
                    echo "<p>You're logged in as " . $_SESSION['username'] . "</p>";
                    echo "<p>You've sent " . $_SESSION['msgCounter'] . " messeges in this session so far.</p>";
                } 

            ?>

            <h1>Chatteren</h1>

            <!-- Form that posts on sendmsg.php, that updates db -->
            <div class="form-cont">
                <form action="/index.php" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Write here!" aria-label="Message" aria-describedby="basic-addon2" name="msg">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">►</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- contains scroll view and messages -->
            <div class="msgscrollview">

            <?php
                // gets messages from db
                getMessages();

                ?>

            </div>

            <form action="index.php" method="post">
                <button type="submit" class="btn btn-secondary" name='logout'>Log out</button>
            </form>

        </div>

    </div>   

    <!-- Bootstrap js -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>