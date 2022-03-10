<?php
include "connection.php";
if (!$mysqli) {
    echo "connection problem";
} else {
    $id = $_POST["theid"];
    $data = $_POST["date2"];
    $entrata = $_POST["entry2"] + ":" + $_POST["entryminutes2"];
    $uscita = $_POST["exit2"] + ":" + $_POST["minutiuscita2"];
    $greenpass = $_POST["greenpass2"];
    $nome = $_POST["name2"];
    $cognome = $_POST["surname2"];
    $azienda = $_POST["company2"];
    $motivo = $_POST["goal2"];
    $referente = $_POST["refernt2"];
    $targa = $_POST["countrynum2"];
    $note = $_POST["notes2"];
    $aquery = "UPDATE $table SET datagiorno = $data, ora_ingresso = $entrata, ora_uscita = $uscita,
     covidControl = $greenpass, nome = $nome, cognome = $cognome, company = $azienda, entryReasons = $motivo,
     referent = $referente, licensePlate = $targa, notes = $note WHERE id = $id";
    $result = $mysqli->query($aquery);
    if (!$result) {
        echo "query fallita";
    } else {
        echo "record modificato correttamente";
    }
}
