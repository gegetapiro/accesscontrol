<?php
include "connection.php";
if (!$mysqli) {
    echo "connessione fallita";
} else {
    $themail = $_POST["email"];
    $password = $_POST["pw"];
    $querylogin = "SELECT * FROM $table3";
    if ($resultlogin = $mysqli->query($querylogin)) {
        if ($resultlogin->num_rows > 0) {
            while ($rows = $resultlogin->fetch_array(MYSQLI_ASSOC)) {
                $element['observers_modifiers'][] = $rows;
                if ($themail == $element['observers_modifiers']['email'] and $password == $element['observers_modifiers']['email']) {
                    echo "utente trovato";
                } else {
                    echo "utente assente";
                }
            }
            echo json_encode($element);
        }
        // foreach()
    } else {
        echo "query fallita";
    }
}
