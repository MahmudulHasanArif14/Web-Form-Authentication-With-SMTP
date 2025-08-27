<?php
$server="localhost";
$usrnm="root";
$pass="";
$dbname="formvalidation";
$con=mysqli_connect($server,$usrnm,$pass,$dbname);
if(!$con){
    die("connection to this server failed due to ".mysqli_connect_errno());
}


?>