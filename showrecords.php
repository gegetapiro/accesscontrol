<?php
include "connection.php";
if(!$mysqli){
    echo "failed connection";
}else{
  if($mysqli->connect_error){
  die('Errore di connessione (' . $result->connect_errno . ') '. $result->connect_error);
  }else{
      $thequery = "SELECT * FROM $table";
     $result = mysqli_query($mysqli, $thequery);
     if($result->num_rows > 0){
         while ($row = $result->fetch_array(MYSQLI_ASSOC)){
            $elem['visitatori'][] = $row;
         }
         echo json_encode($elem);
     }
  }
}
