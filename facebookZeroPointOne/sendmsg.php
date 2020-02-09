
<?php

    require './database/database.php';

    if (empty($_POST['msg'])){
        header('location: /index.php');
    } else {

        sendAnonMsg($_POST['msg']);

        header('location: index.php');

    }



?>