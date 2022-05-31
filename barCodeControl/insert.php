<?php
include "../connection.php";

if (!$mysqli) {
    echo "connessione fallita";
} else {
    $codicefiscale = $_POST["fiscalcode"];
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $azienda = $_POST["azienda"];
    $note = $_POST["note"];

    /* $codicefiscale = "TRMGRD59L02F205Q";
    $nome = "Gerardo";
    $cognome = "Trimarco";
    $azienda = "ZeroC";
    $note = "Frontend controller"; */

    $userquery = "INSERT INTO $table2 (codiceFiscale, nome, cognome, azienda, note)VALUES('$codicefiscale', '$nome', '$cognome', '$azienda', '$note')";

    $result = $mysqli->query($userquery);
    if (!$result) {
        echo "query fallita " .  $mysqli->error;
    } else {
        echo "Utente " . $nome . " " . $cognome . " con C.F. " . $codicefiscale . " inserito ";
    }
}
