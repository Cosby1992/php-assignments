
<?php

    function createMessageAnon($conn, $msg) {

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO messages (message) VALUES (?)");
        $stmt->bind_param("s", $message);

        $message = $msg;

        $stmt->execute();

        $stmt->close();
        $conn->close();

    }

    function readMessages($conn){
                
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "SELECT * FROM messages ORDER BY id DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<div class="msgcontainer">
                            <div class="usernameText">'.$row["username"].'</div>
                            <div class="timestampText">'.$row["timestamp"].'</div>
                            <div class="msgText">'.$row["message"]."</div>
                        </div>";
            }
        } else {
            echo '<div class="msgcontainer">
                        <div class="usernameText">Database</div>
                        <div class="timestampText">Error</div>
                        <div class="msgText">Page was unable to load any messages from the database.</div>
                    </div>';
            
        }

        $conn->close();
    }

?>