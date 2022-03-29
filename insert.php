<?php
include "connection.php";
$date = $_POST["whichdata"];
$oraingr = $_POST["whenentry"];
$orausc = $_POST["whenexit"];
$greenpass = $_POST["passgreen"];
$thename = $_POST["whichname"];
$thesecondname = $_POST["whichsurname"];
$company = $_POST["whichcompany"];
$reason = $_POST["whichgoal"];
$referent = $_POST["whoreferent"];
$targa = $_POST["whichcnumber"];
$note = $_POST["thenotes"];

if (!$mysqli) {
    echo "fails connection";
} else {
    $thequery = "INSERT INTO $table (datagiorno, ora_ingresso, ora_uscita, covidControl, nome, cognome, company, entryReasons, referent, licensePlate, notes)
    VALUES ('$date', '$oraingr', '$orausc', '$greenpass', '$thename',
     '$thesecondname', '$company', '$reason', '$referent', '$targa', '$note')";

    $result = $mysqli->query($thequery);
    if (!$result) {
        echo "problematic query";
    } else {
        echo "succesuful query";
    }
}
