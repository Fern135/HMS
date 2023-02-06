<?php 

use controllers\DbConnector;

if(isset($_POST['sign-up'])){
    $username = $email = $password = $pin = "";
    $username_err = $email_err = $password_err = $pin_err = "";

    // user-name
    if(isset($_POST['user-name'])){
        $username = $_POST['user-name'];

    }else{
        $username_err = "No username set";
    }


    // email
    if(isset($_POST['email'])){
        $email = $_POST['email'];

    }else{
        $email_err = "No email set";
    }

    // password
    if(isset($_POST['pass-word-main'])){
        $password = $_POST['pass-word-main'];

    }else{
        $password_err = "No password set";
    }

    // 4 digit pinpin
    if(isset($_POST['pin-main'])){
        $pin = $_POST['pin-main'];

    }else{
        $pin_err = "No pin set";
    }


    if(empty($username_err) && empty($email_err) && empty($password_err) && empty($pin_err)){
        signup($username, $email, $password, $pin);
    }else{
        return false;
    }
}

function signup($username, $email, $password, $pin){
    // include "../Inc/connection.inc.php"; 
    $dbCon = new DbConnector();
    
    $password_enc  = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT into users (username, email, password, pin) 
        VALUES ('$username', '$email', '$password_enc', '$pin')";

    $dbCon->query($query);// running the query

}