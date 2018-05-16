<?php
// Connection to database
include "connection.php";
    
$sql = "SELECT *  FROM students_yg_muc WHERE endday > date(now())  ORDER BY RAND()";
$result = mysqli_query($con, $sql);
 


//Initialize array variable
  $dbdata = array();

//Fetch into associative array
  while ( $row = $result->fetch_assoc())  {
	$dbdata[]= $row;
  }

//Print array in JSON format
 echo json_encode($dbdata);

 

mysqli_close($con);

?> 