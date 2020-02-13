

<?php

    function checkAuth() {
        
        if(isset($_SESSION['username']) && !empty($_SESSION['username'])){
            // everything is fine
            return;

        } else {
            header('location: login/login.php');
        }
        
    }


?>