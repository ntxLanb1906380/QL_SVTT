<?php
/* Database connection start */
$serverName = "LLANN";
  $database = "QL_SVTT";
  $uid = "";
  $pass = "";

  $conn = sqlsrv_connect($serverName, array(
    "Database" => $database,
    "Uid" => $uid,
    "PWD" => $pass
  )
  );
// if(!$conn){
//     die (print_r(sqlsrv_errors(),true));
// } 
// else {   echo 'Kết nối thành công';}
?>