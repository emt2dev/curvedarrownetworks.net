<?php
function signIn($connection, $username, $password) {

    /* HERE WE DETERMINE IF THE PASSWORD MATCHES BEFORE GETTING ALL FROM THE ROW */
    $query = "SELECT * FROM canadmin WHERE username=?";

    $query = $connection->prepare($query);
        $query->bind_param("s", $a);
            $a = $username;
    $query->execute();

    $result = $query->get_result();
    $row = $result->fetch_assoc();


    if(password_verify($password, $row['password'])) {

    /* HERE WE ASSIGN EACH COLUMN TO THE SESSION */
        $_SESSION['id']= $row['id'];
        $_SESSION['username'] = $row['username'];

        header('Location: http://madebycan.com/dashboard.phtml');
        exit();

    } else {

        $_SESSION['incorrectLogin'] = "The email or password that you entered was incorrect";
        header('Location: http://madebycan.com/login');
        exit();
    }
}
?>