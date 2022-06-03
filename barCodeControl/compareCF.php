<?php
include "../connection.php";
if (!$mysqli) {
    echo "connessione fallita";
} else {
    $employe = $_POST["codfisc"];
    $searchquery = "SELECT * FROM $table2 WHERE codiceFiscale = '$employe'";
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

        $datatime =  date('d/m/Y');
        $time = date('H:i');
        // echo $datatime . " - " . $time;
        // echo $elem[0];
        echo gettype($time);
        echo "---->";
        $insertquery = "INSERT INTO $table (datagiorno, ora_ingresso, nome, cognome, company)
         VALUE ('$datatime', '$time', '$elem[0]', '$elem[1]', '$elem[2]')";
        $result_2 = $mysqli->query($insertquery);
        if (!$result_2) {
            echo "query fallita " . $mysqli->error;
        } else {
            echo "lavoratore " . $elem[0] . " " . $elem[1] . " inserito correttamente";
        }
        // $mysqli->close();
    }
}
