<?php

require 'messagesdb.php';

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


// using prepared statement from messagesdb.php to save method in db
function sendAnonMsg($msg) {
    sendMessageAnon($GLOBALS['conn'], $msg);
}


?>