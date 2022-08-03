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
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $rowcontent['visitatori'][] = $row;
            }
            echo json_encode($rowcontent);
        }
    }
}
