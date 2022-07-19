<?php
include "connection.php";
if (!$mysqli) {
    echo "connessione fallita";
} else {
    $querylogin = "SELECT * FROM $table3";
    if ($resultlogin = $mysqli->query($querylogin)) {
        // foreach()
    } else {
        echo "query fallita";
    }
}
