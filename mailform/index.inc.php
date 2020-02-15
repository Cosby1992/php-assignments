
<?php

 //import code

 function sendEmail(){
    $to = "example@exapmle.com";
    $subject = "Mail from php";
    $txt = "My php mail service is running!";

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: webmaster@example.com" . "\r\n" .
    "CC: somebodyelse@example.com";

    return mail($to,$subject,$txt,$headers);
 }




?>