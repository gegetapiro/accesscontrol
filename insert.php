<?php
include "connection.php";
/* $date = "04/03/2022";
$oraingr = "09:10";
$orausc = "11:45";
$greenpass = true;
$thename = "Gianni";
$thesecondname = "Bianchi";
$company = "Catozzo S.p.A.";
$reason = "we will do better";
$referent = "Giancarlo Categani";
$targa = "NB565MN";
$note = "disse la vacca al mulo...";
 */

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
        
    } else {
        echo "succesuful query";
    }
}
