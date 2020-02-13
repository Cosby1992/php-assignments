
<?php


    function createUser($conn, $username, $password, $remtoken) {

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        $hashedToken = password_hash($remtoken, PASSWORD_DEFAULT);

        //INSERT INTO USERS
        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO users (username, password, rem_token) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $usrname, $pwd, $remTok);

        $usrname = $username;
        $pwd = $hashedPwd;
        $remTok = $remtoken;

        $stmt->execute();

        $stmt->close();
        $conn->close();

    }

    function readUser($conn, $username) {

        //SELECT FROM USERS
        // prepare and bind
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $usrname);

        $usrname = $username;

        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows === 0) exit('No rows');

        while($row = $result->fetch_assoc()) {

            $ids[] = $row['id'];
            $names[] = $row['username'];
            $pwds[] = $row['password'];
            $creations[] = $row['created'];
            $tokens[] = $row['rem_token'];

        }

        $userdata = [$ids[0], $names[0], $pwds[0], $creations[0], $tokens[0]];
        return($userdata);

        $stmt->close();
        $conn->close();

    }

    $readUserFunctionHolder = "readUser";

    function compareTokens($conn, $username, $remtoken) {

        // SELECT FROM USERS
        $user = $GLOBALS['readUserFunctionHolder']($conn, $username);


        // COMPARE PARAM WITH DB
        if($remtoken === $user[4]){
            return true;
        } else return false;

    }




?>