
<?php

    function sendMessageAnon($conn, $msg) {

        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO messages (message) VALUES (?)");
        $stmt->bind_param("s", $message);

        $message = $msg;

        $stmt->execute();

        $stmt->close();
        $conn->close();

    }

?>