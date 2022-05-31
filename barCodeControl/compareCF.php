<?php
include "../connection.php";
if (!$mysqli) {
    echo "connessione fallita";
} else {
    $fiscode = "RNNDCC80A41C895O";
    $searchquery = "SELECT * FROM $table2 WHERE codiceFiscale = $fiscode";
   $result = $mysqli->query($searchquery);
        if($result->num_rows > 0){
                while($row = $result->fetch_array(MYSQLI_ASSOC)){
                    echo $row;
                }
        }
    
}
