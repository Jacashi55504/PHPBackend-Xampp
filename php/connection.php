
<?php

$db_host = 'localhost';
$db_username = 'sysadmin1';
$db_password = 'yHA*FphIePljwbWE';
$db_database = 'carsale';

$db = new mysqli($db_host, $db_username, $db_password, $db_database);
mysqli_query($db, "SET NAMES 'utf8'");

if($db->connect_errno > 0){
    die('No es psible conectarse a la base de datos ['. $db->connect_error .']');
}

?>