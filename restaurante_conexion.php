<?php
$host="localhost";
$user="root";
$pass="";
$db="restaurant";

$conexion=mysqli_connect($host, $user, $pass, $db);

if(!$conexion){
    die("error de conexion:".mysqli_connect_error());
}
?>