<?php
session_start();
if ($_SESSION["usersession"] != "sessionOK") {
    header("Location: login.html");
} else {
    include "connection.php";
    if (!$mysqli) {
        echo "connessione falita";
    } else {
        if ($mysqli->connect_error) {
            die('Errore di connessione (' . $result->connect_errno . ') ' . $result->connect_error);
        } else {
            $allowsquery = "SELECT * FROM $table2  ORDER BY `id` DESC";
            $resulallows = mysqli_query($mysqli, $allowsquery);
            if ($resulallows->num_rows > 0) {
                while ($allowrow = $resulallows->fetch_array(MYSQLI_ASSOC)) {
                    $element['ammessi'][] = $allowrow;
                }
                echo json_encode($element);
            } else {
                echo "la tabella è vuota";
            }
        }
    }
}
