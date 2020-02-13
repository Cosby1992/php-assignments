
<?php

    function checkAuth() {
        
        if(isset($_SESSION['username']) && !empty($_SESSION['username'])){
            // everything is fine
            return;

        } else {
            // user not authenticated, send to login
            header('location: login/login.php');
        }
        
    }

?>