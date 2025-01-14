<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database_name = "toko_kita";

$db = mysqli_connect($hostname, $username, $password, $database_name);

if($db->connect_error) {
    echo "database connection error";
    die("error!");
}
?>