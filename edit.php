<?php
include "connection.php";

if (!$mysqli) {
    echo "errore di connessione";
} else {
    $theid = $_POST["whattax"];
    // $theid = 14;
    $aquery = "SELECT * FROM $table WHERE id = $theid";
    $theresult = $mysqli->query($aquery);
    $row = mysqli_fetch_array($theresult, MYSQLI_ASSOC);
    /*  $fields = [];
    for ($i = 0; $i < 11; $i++) {
        $fields[$i];
    } */




    echo json_encode($row);
}
