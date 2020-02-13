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
    
            if(!isset($_POST['uid']) || empty($_POST['uid'])){
                $err = "Missing username";
                $errCode = 1;
            } elseif (!isset($_POST['pwd']) || empty($_POST['pwd'])) {
                $err = "Missing password";
                $errCode = 2;
            } else {
                login($_POST['uid'], $_POST['pwd']);
            }

        } elseif (isset($_POST['register'])) {

            if(!isset($_POST['uid']) || empty($_POST['uid'])){
                $err = "Missing username";
                $errCode = 1;
            } elseif (!isset($_POST['pwd']) || empty($_POST['pwd'])) {
                $err = "Missing password";
                $errCode = 2;
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

                <div class="errormsg">
                    <?php
                        if(isset($err)){
                        echo $err;
                        }
                    ?>
                </div>


            <form action="login.php" method="POST"> 
                <div class="form-group">
                    <label>Username</label>
                    <?php

                    if(!empty($_GET['usrname'])){
                        echo '<input type="text" class="form-control" value=' . $_GET['usrname'] . ' name="uid">';
                    } elseif (isset($errCode)) {
                        switch($errCode){
                            case 1: 
                                echo '<input type="text" class="form-control" placeholder="Username" name="uid" autofocus>';
                                break;
                            case 2:     
                                echo '<input type="text" class="form-control" placeholder="Username" name="uid">';
                                break;
                            default:     
                                echo '<input type="text" class="form-control" placeholder="Username" name="uid">';
                                break;
                        }
                    } else {
                        echo '<input type="text" class="form-control" placeholder="Username" name="uid">';
                    }
                    ?>
                    
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