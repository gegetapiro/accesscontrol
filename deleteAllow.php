<?php
include "connection.php";
if (!$mysqli) {
    echo "connessione fallita " . $mysqli->connect_error;
} else {
    $id =  $_POST["whattarec"];
    $deletequery = "DELETE FROM $table2 WHERE id = $id";
    if ($mysqli->query($deletequery)) {
        echo "utente con id " . $id . " cancellato correttamente";
    } else {
        echo "query fallita user con codice fiscale " . $id . " " . $resultallow->error_log;
    }
}
