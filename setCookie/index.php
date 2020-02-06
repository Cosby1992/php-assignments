<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Set a username cookie</title>
</head>
<body>


    <?php
    // set a cookie if a form post a username to index.php
        if(isset($_POST['username'])){
            $cookie_name = "username";
            setcookie($cookie_name, $_POST['username'], time() + (3600000), "/"); //sets cookie with TTL 1 hour 
        }
    ?>

    <form action=<?php echo $_SERVER['PHP_SELF'] ?> method='post'>
        <input type='text' name='username'>
        <input type='submit' value='submit'>
    </form>


</body>
</html>