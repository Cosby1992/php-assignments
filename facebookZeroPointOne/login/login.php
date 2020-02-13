<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="login.css">

</head>
<body>

    <?php

        include 'authuser.inc.php';

        if(isset($_POST['login'])) {

            echo "<p class='debug'>login button pressed</p>";

            if(!isset($_POST['uid']) || empty($_POST['uid'])){
                echo "<p class='debug'>Missing username</p>";
            } elseif (!isset($_POST['pwd']) || empty($_POST['pwd'])) {
                echo "<p class='debug'>Missing password</p>";
            } else {
                login($_POST['uid'], $_POST['pwd']);
            }


        } elseif (isset($_POST['register'])) {

            echo "<p class='debug'>register button pressed</p>";

            if(!isset($_POST['uid']) || empty($_POST['uid'])){
                echo "<p class='debug'>Missing username</p>";
            } elseif (!isset($_POST['pwd']) || empty($_POST['pwd'])) {
                echo "<p class='debug'>Missing password</p>";
            } else {
                signUp($_POST['uid'], $_POST['pwd'], "tempToken");
            }
            

        }

    

    ?>


    <div class="sidenav">
        <div class="login-main-text">
            <h2>Chatteren<br> Login Page</h2>
            <p>Login or register from here to access.</p>
        </div>
    </div>
    <div class="main">
        <div class="col-md-6 col-sm-12">
            <div class="login-form">
            <form action="login.php" method="POST"> <!-- TODO: create action page and refer here -->
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" placeholder="Username" name="uid">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="pwd">
                </div>
                <button type="submit" name="login" class="btn btn-black">Login</button>
                <button type="submit" name="register" class="btn btn-secondary">Register</button>
            </form>
            </div>
        </div>
    </div>



    <!-- Bootstrap js -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>