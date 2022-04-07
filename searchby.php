<?php
include "connection.php";
if (!$mysqli) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
} else {
    $choicedfield = "cognome";
    $fieldcontent = "Liverani";
    $thequery = "SELECT * FROM $table WHERE $choicedfield = '$fieldcontent'";
    $result = $mysqli->query($thequery);
    if (!$result) {
        echo "problematic query";
    } else {
        // echo "Returned rows are: " . $result->free_result('nome');
        while ($row = $result->fetch_array()) {
            echo $row['datagiorno'] . " " .  $row['ora_ingresso'] . " " .  $row['ora_uscita']
                . " " .  $row['covidControl']   . " " .  $row['nome'] . " " .  $row['cognome']
                . " " .  $row['company'] . " " .  $row['entryReasons'] . " " .  $row['referent']
                . " " .  $row['licensePlate'] . " " .  $row['notes'];
        }
    }
}
