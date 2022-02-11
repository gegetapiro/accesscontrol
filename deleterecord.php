<?php
include "connection.php";
$whattaid = $_POST["cheid"];

if(!$mysqli){
    echo "connessione fallita";
}else{
    echo "connessione ok";
}
