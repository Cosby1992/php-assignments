
<?php 

    include '../database/database.inc.php';

    function login($username, $password){

        $user = getUser($username);

        if (password_verify($password, $user[2])) {

            //setting up the session
            session_set_cookie_params(3600,"/"); // TTL = 1 hour
            session_start();

            // Session variables
            $_SESSION['username'] = $username;
            $_SESSION['msgCounter'] = 0;

            // Navigate to index
            header("location: ../index.php");
            
        } else {
            header("location: /login/login.php");
        }

    }

?>