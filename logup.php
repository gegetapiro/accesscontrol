<?php
include "connection.php";
if (!$mysqli) {
    echo "connessione fallita";
} else {
    $email = $_POST["email"];
    $pass =  $_POST["password"];
    $ashed_pass = password_hash($pass, PASSWORD_DEFAULT);

    $query = "INSERT INTO $table3 (email, password) VALUES ('$email', '$ashed_pass')";
    $resulted = $mysqli->query($query);
    if (!$resulted) {
        echo "query fallita ";
    } else {
        echo "nuovo utente " . $email . " inserito correttamente " . error_reporting();
    }
}
