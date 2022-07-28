<?php
session_start();
include "connection.php";
$user;
if (!$mysqli) {
    echo "connessione fallita";
} else {
    $themail = $_POST["email"];
    $password = $_POST["pw"];
    $querylogin = "SELECT email, password FROM $table3 WHERE email = '$themail' LIMIT 1";
    if ($resultlogin = $mysqli->query($querylogin)) {
        if ($resultlogin->num_rows != 1) {
            die("utente non trovato");
        }
        while ($user = $resultlogin->fetch_assoc()) {
            if ($user['password'] != $password) {
                die("Password errata");
            }
        }
    } else {
        echo "query fallita";
    }

    // echo ("user trovato");
    $_SESSION['usersession'] = "sessionOK";
    echo "index.php";
}

/* ############### view this: https://www.php.net/manual/en/reserved.variables.session.php ##########
 */