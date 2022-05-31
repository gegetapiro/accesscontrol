<?php
include "connection.php";
if (!$mysqli) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
} else {
    $choicedfield = $_POST["field"];
    $fieldcontent = $_POST["textin"];
    $thequery = "SELECT * FROM $table WHERE $choicedfield = '$fieldcontent'";
    $result = $mysqli->query($thequery);
    if (!$result) {
        echo "problematic query";
    } else {
        // echo "Returned rows are: " . $result->free_result('nome');
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                /*  echo $row['datagiorno'] . " " .  $row['ora_ingresso'] . " " .  $row['ora_uscita']
                    . " " .  $row['covidControl']   . " " .  $row['nome'] . " " .  $row['cognome']
                    . " " .  $row['company'] . " " .  $row['entryReasons'] . " " .  $row['referent']
                    . " " .  $row['licensePlate'] . " " .  $row['notes']; */
                $rowcontent['visitatori'][] = $row;
            }
            echo json_encode($rowcontent);
        }
    }
}
