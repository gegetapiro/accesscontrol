<?php
include "connection.php";
$date = "02/03/2022";
$oraingr = "10:20";
$orausc = "16:45";
$greenpass = true;
$thename = "Giovanni";
$thesecondname = "Rossi";
$company = "GinevraS.p.A.";
$reason = "our goals are to grow up e better society";
$referent = "John Zippy";
$targa = "KJ546MN";
$note = "disse la vacca al mulo...";


if(!$mysqli){
    echo "fails connection";
}else{
    $thequery = "INSERT INTO $table (datagiorno, ora_ingresso, ora_uscita, covidControl, nome, cognome, company, entryReasons, referent, licensePlate, notes)
    VALUES ('$date', '$oraingr', '$orausc', '$greenpass', '$thename',
     '$thesecondname', '$company', '$reason', '$referent', '$targa', '$note')";

     $result = $mysqli->query($thequery);
     if(!$result){
         echo "query fallita";
     }else{
         echo "succesuful query";
     }
}
?>
