<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Save Userdata</title>
</head>
<body>

<div class="container">

<h1>Save userdata in database</h1>

<form action="/index.php" method="post">
    username: <input type="text" name="username">
    age: <input type="number" name="age">
    <input type="submit" value="Save data in SQL database">
</form>

<?php

    if(isset($_POST['username']) && $_POST['age']){
        echo $_POST['username'];
        echo $_POST['age'];

            /** Save userdata from POST form in SQL database */

        // database info
        $servername = "localhost"; 
        $username = "username"; // <------------- replace with your db settings
        $password = "password"; // <------------- replace with your db settings
        $dbname = "databasename"; // <----------- replace with your db name settings

        // create db connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // check connection
        if($conn->connect_error) {
            die("Connection to sql-db failed: " . $conn->connect_error);
        }


        //replace table name with your table name in your db
        //                                      |
        // prepare sql statements and bind      |
        //                                      |
        //                                      V
        $stmt = $conn->prepare("INSERT INTO tablename (username, age) VALUES(?,?)"); 
        $stmt->bind_param("sd", $usrname, $age);

        // use arguments (from POST request) in prepared statement
        $usrname = $_POST['username'];
        $age = $_POST['age'];

        // execute prepared statement
        $stmt->execute();

        // close connection
        $stmt->close();
        $conn->close();

    } 

?>


</div>


    
</body>
</html>