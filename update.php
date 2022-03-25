<?php
include "connection.php";
if (!$mysqli) {
    echo "connection problem";
} else {
    $id = $_POST["theid"];
    echo gettype($id);
    $data = $_POST["date2"];
    $entrata = $_POST["entry2"] + ":" + $_POST["entryminutes2"];
    $uscita = $_POST["exit2"] + ":" + $_POST["minutiuscita2"];
    $greenpass = $_POST["greenpass"];
    $nome = $_POST["name2"];
    $cognome = $_POST["surname2"];
    $azienda = $_POST["company2"];
    $motivo = $_POST["goal2"];
    $referente = $_POST["referent2"];
    $targa = $_POST["countrynum2"];
    $note = $_POST["notes2"];

    /*  $id = 2;
    $data = "12/03/2022";
    $entrata = "20:12";
    $uscita = "21:30";
    $greenpass = "no";
    $nome = "Edited";
    $cognome = "Edited";
    $azienda = "Edited";
    $motivo = "Modificare server";
    $referente = "Edited";
    $targa = "ttttttttttt";
    $note = "barcollo";
 */

    $aquery = "UPDATE $table SET datagiorno = '$data', ora_ingresso = '$entrata', ora_uscita = '$uscita',   
     covidControl = '$greenpass', nome = '$nome', cognome = '$cognome', company = '$azienda', entryReasons = '$motivo',
     referent = '$referente', licensePlate = '$targa', notes = '$note' WHERE id = $id";
    $result = $mysqli->query($aquery);

    if (!$result) {
        echo "query fallita " . $mysqli->error;
        exit();
    } else {
        echo "record modificato correttamente";
    }
}
