<?php

$host = $_ENV['DB_HOST'];
$db   = $_ENV['DB_NAME'];
$user = $_ENV['DB_USERNAME'];
$pass = $_ENV['DB_PASSWORD'];
$port = $_ENV['DB_PORT'];

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
