<?php
include "../connection.php";
if (!$mysqli) {
    echo "connessione fallita";
} else {

    $employe = $_POST["codfisc"];
    $searchquery = "SELECT * FROM $table2 WHERE codiceFiscale = '$employe'";
    $result = $mysqli->query($searchquery);

    if ($result->num_rows > 0) {

        $elem = array();
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            array_push($elem, $row['nome'], $row['cognome'], $row['azienda'], $row['note']);
        }

        // ############# CONTROLLO PRESENZA LAVORATORE O PRIMO ARRIVO #############
        $datatime =  date('d/m/Y');

        $time = date('H:i');

        $checkquery = "SELECT * FROM $table WHERE datagiorno = '$datatime' AND nome = '$elem[0]' AND cognome = '$elem[1]' ORDER BY id DESC LIMIT 1";

        $elemcheck = array();

        $resultx2 = $mysqli->query($checkquery);

        if ($resultx2) {



            while ($rowcheck = $resultx2->fetch_array(MYSQLI_ASSOC)) {
                array_push($elemcheck, $rowcheck['ora_ingresso'], $rowcheck['ora_uscita'], $rowcheck['nome'], $rowcheck['cognome'], $rowcheck['company'], $rowcheck['id']);
            }
            if ($elemcheck[0] == null) {
                /* primo accesso */
                $insertquery = "INSERT INTO $table (datagiorno, ora_ingresso, nome, cognome, company)
                VALUE ('$datatime', '$time', '$elem[0]', '$elem[1]', '$elem[2]')";
                $result_2 = $mysqli->query($insertquery);
                if (!$result_2) {
                    echo "query fallita " . $mysqli->error;
                } else {
                    echo "lavoratore " . $elem[0] . " " . $elem[1] . " inserito correttamente IN ENTRATA alle ore " . $time;
                }
            } elseif (($elemcheck[1] == null) and ($elemcheck[0] != null)) {
                /*  ############## vuol dire che il lavoratore è presente e sta uscendo ############### */
                $queryinssertexit = "UPDATE $table SET ora_uscita = '$time' WHERE nome = '$elem[0]' AND cognome = '$elem[1]' AND datagiorno = '$datatime' AND id = $elemcheck[5]";
                $result_3 = $mysqli->query($queryinssertexit);
                if (!$result_3) {
                    echo "fallito inserimento ora uscita";
                } else {
                    echo "lavoratore " . $elem[0] . " " . $elem[1] . " ha timbrato l'uscita alle ore " . $time;
                }
            } else {
                /* primo accesso */
                $insertquery = "INSERT INTO $table (datagiorno, ora_ingresso, nome, cognome, company)
                 VALUE ('$datatime', '$time', '$elem[0]', '$elem[1]', '$elem[2]')";
                $result_2 = $mysqli->query($insertquery);
                if (!$result_2) {
                    echo "query fallita " . $mysqli->error;
                } else {
                    echo "lavoratore " . $elem[0] . " " . $elem[1] . " IN ENTRATA SUCCESSIVA alle ore " . $time;
                }
            }
        }
    }
}
