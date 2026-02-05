<?php

$host = getenv('DB_HOST') ?: 'localhost';
$dbname = getenv('DB_NAME') ?: 'mydb';
$user = getenv('DB_USERNAME') ?: 'root';
$pass = getenv('DB_PASSWORD') ?: '';
$port = getenv('DB_PORT') ?: 3306;

$con = new mysqli($host, $user, $pass, $db, $port);




// $server="localhost";
// $usrnm="root";
// $pass="";
// $dbname="formvalidation";
// $con=mysqli_connect($server,$usrnm,$pass,$dbname);
if(!$con){
    die("connection to this server failed due to ".mysqli_connect_errno());
}


?>
