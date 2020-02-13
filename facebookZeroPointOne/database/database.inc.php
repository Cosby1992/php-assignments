

<?php

    require 'messagesdb.inc.php';
    require 'userdb.inc.php';

    $servername = "localhost";
    $username = "root";
    $password = "password";
    $dbname = "nofacechat";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // using prepared statement from messagesdb.inc.php to save method in db
    function sendAnonMsg($msg) {
        createMessageAnon($GLOBALS['conn'], $msg);
    }

    function sendMsg($username, $msg){
        createMessage($GLOBALS['conn'], $username, $msg);
    }

    // using method from messagesdb.inc.php to get messages from db
    function getMessages() {
        readMessages($GLOBALS['conn']);
    }

    // creates a new user in the database
    function signUp($username, $password, $rem_token) {
        createUser($GLOBALS['conn'], $username, $password, $rem_token);
    }

    function getUser($username) {
        return readUser($GLOBALS['conn'], $username);
    }

    function comTokens($username, $remtoken) {
        return compareTokens($GLOBALS['conn'], $username, $remtoken);
    }


?>