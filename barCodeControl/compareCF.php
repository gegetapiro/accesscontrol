<?php
include "../connection.php";
if (!$mysqli) {
    echo "connessione fallita";
} else {
    $fiscode = "RNNDCC80A41C895O";
    $searchquery = "SELECT * FROM $table2 WHERE codiceFiscale = '$fiscode'";
    $result = $mysqli->query($searchquery);
    if ($result->num_rows > 0) {
        // echo "file trovato";
        $elem = array();
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            array_push($elem, $row['nome'], $row['cognome'], $row['azienda'], $row['note']);
        }
        // echo $elem[0];
        // echo date('d, m, yyyy') . "cazzi";
        //    echo  date('d-m-Y H:i:s', strtotime('+1 year', strtotime($today)) );
        echo date('H:m');
        $datatime =  date('d/m/Y');
        $time = date('h:m');
        // $insertquery = "INSERT * FROM $table (datagiorno, ora_ingresso, nome, cognome, company) VALUE ()"
        // $mysqli->close();
    }
}
