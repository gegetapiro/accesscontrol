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
    $kindaccess = $_POST["accesskind"];
    $userquery = "INSERT INTO $table2 (codiceFiscale, nome, cognome, azienda, note, workerkind)VALUES('$codicefiscale', '$nome', '$cognome', '$azienda', '$note', '$kindaccess')";

    $result = $mysqli->query($userquery);
    if (!$result) {
        echo "query fallita " .  $mysqli->error;
    } else {
        echo "Utente " . $nome . " " . $cognome . " con C.F. " . $codicefiscale . " inserito ";
    }
}
