<?php
include "connection.php";

if (!$mysqli) {
    echo "errore di connessione";
} else {
    $theid = $_POST["whattax"];
    $aquery = "SELECT * FROM $table WHERE id = $theid";
    $theresult = $mysqli->query($aquery);
    $row = mysqli_fetch_array($theresult, MYSQLI_ASSOC);
    echo json_encode($row);
}

