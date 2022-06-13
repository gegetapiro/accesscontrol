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

        $checkquery = "SELECT * FROM $table WHERE datagiorno = '$datatime' AND nome = '$elem[0]' AND cognome = '$elem[1]'";

        $elemcheck = array();

        $resultx2 = $mysqli->query($checkquery);

        if ($resultx2) {

            echo "fino a qui va " . $elem[1] . PHP_EOL;

            while ($rowcheck = $resultx2->fetch_array(MYSQLI_ASSOC)) {
                array_push($elemcheck, $rowcheck['ora_ingresso']);
            }

            if ($elemcheck[0] == null) {
                echo $elemcheck[0] . PHP_EOL;
                echo "primo accesso del giorno " . PHP_EOL;
                $insertquery = "INSERT INTO $table (datagiorno, ora_ingresso, nome, cognome, company)
                VALUE ('$datatime', '$time', '$elem[0]', '$elem[1]', '$elem[2]')";
                $result_2 = $mysqli->query($insertquery);
                if (!$result_2) {
                    echo "query fallita " . $mysqli->error;
                } else {
                    echo "lavoratore " . $elem[0] . " " . $elem[1] . " inserito correttamente IN ENTRATA";
                }
            } else {

                /*  ############## vuol dire che il lavoratore è presente e sta uscendo ############### */
                $queryinssertexit = "UPDATE $table SET ora_uscita = '$time' WHERE nome = '$elem[0]' AND cognome = '$elem[1]'";
                echo "lavoratore in uscita tabella = " . getType($time) . PHP_EOL;
                // UPDATE accesses SET ora_uscita = '11:11' WHERE nome = 'Alessandro' AND cognome = 'Meloni'
                $result_3 = $mysqli->query($queryinssertexit);
                if (!$result_3) {
                    echo "fallito inserimento ora uscita";
                } else {
                    echo "lavoratore " . $elem[0] . " " . $elem[1] . " ha timbrato l'uscita alle ore " . $time;
                }
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
