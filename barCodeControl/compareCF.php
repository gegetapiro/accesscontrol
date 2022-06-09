<?php
include "../connection.php";
if (!$mysqli) {
    echo "connessione fallita";
} else {
    $employe = $_POST["codfisc"];
    $searchquery = "SELECT * FROM $table2 WHERE codiceFiscale = '$employe'";
    $result = $mysqli->query($searchquery);
    if ($result->num_rows > 0) {
        // echo "file trovato posi 1";
        $elem = array();
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            array_push($elem, $row['datagiorno'], $row['nome'], $row['cognome'], $row['azienda'], $row['note']);
        }

        // ############# CONTROLLO PRESENZA LAVORATORE O PRIMO ARRIVO #############
        $datatime =  date('d/m/Y');
        $time = date('H:i');
        $checkquery = "SELECT * FROM $table WHERE datagiorno = '$datatime' AND nome = '$elem[1]' AND cognome = '$elem[2]'";
        $resultx2 = $mysqli->query($checkquery);
        $elemcheck = array();
        if ($resultx2->num_rows > 0) {
            while ($rowcheck = $resultx2->fetch_array(MYSQLI_ASSOC)) {
                array_push($elemcheck, $rowcheck['ora_ingresso']);
            }
        }
        echo "QUI " . $elemcheck[0];

        if ($resultx->num_rows > 0) {
            echo "file trovato posi 2";
            /*  ############## vuol dire che il lavoratore è presente e sta uscendo ############### */
            $queryinssertexit = "INSERT INTO $table (ora_uscita) VALUE ('$time') WHERE nome = $elem[1] AND cognome = $elem[2]";
        } else {
            /* ################## vuo dire che il lavoratore sta entrando per la prima volta nella giornata ########### */
            $insertquery = "INSERT INTO $table (datagiorno, ora_ingresso, nome, cognome, company)
            VALUE ('$datatime', '$time', '$elem[0]', '$elem[1]', '$elem[2]')";
            $result_2 = $mysqli->query($insertquery);
            if (!$result_2) {
                echo "query fallita " . $mysqli->error;
            } else {
                echo "lavoratore " . $elem[0] . " " . $elem[1] . " inserito correttamente IN ENTRATA";
            }
        }

        // #########################################################################



        // echo $elem[0];
        // echo date('d, m, yyyy') . "cazzi";
        //    echo  date('d-m-Y H:i:s', strtotime('+1 year', strtotime($today)) );


        // echo $datatime . " - " . $time;
        // echo $elem[0];
        /*  echo gettype($time);
        echo "---->"; */



        // $mysqli->close();
    }
}
