<?php
$host = "localhost";
$user_name = "root";
$password = "";
$name = "rental";

$con = mysqli_connect($host, $user_name, $password, $name);
if ($con === false) {
    error_log('cant connect to database');
}

?>