<?php
$con = mysqli_init();
mysqli_ssl_set($con,NULL,NULL, "BaltimoreCyberTrustRoot.crt.pem", NULL, NULL) ; 
mysqli_real_connect($con, 'servername', 'username', 'password', 'youngguns', 3306, MYSQLI_CLIENT_SSL, MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT);
if (mysqli_connect_errno($con)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
}
?>

