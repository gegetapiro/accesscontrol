<?php
include "connection.php";
$whattaid = $_POST["wichid"];

if (!$mysqli) {
    echo "connessione fallita";
} else {
    $aquery = "DELETE FROM $table WHERE id = $whattaid";
    if ($mysqli->query($aquery)) {
        echo "record con id " . $whattaid . "cancellato correttamente";
    } else {
        echo "problema nella cancellazione del ecor con id " . $whattaid;
    }
}
