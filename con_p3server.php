<?php
//$servername = "mysql.hostinger.com";
$servername = "localhost";
$username = "root";
$password = "";
//$dbname = "dummidata";
$dbname = "p3_group";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?> 