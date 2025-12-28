<?php
$host="localhost";
$user="root";
$pass="";
$db="restaurante";

$conexion=mysqli_connect($host, $user, $pass, $db);

if(!$conexion){
    die("error de conexion:".mysqli_connect_error());
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $num=$_POST["num_mesa"];
    $descripcion=$_POST["descripcion"];
    $fecha=$_POST["fecha"];
    $id3=$_POST["idplatillo"];
        $stmt = $conexion->prepare("INSERT INTO mesa(num_mesa, descripcion, fecha, idplatillo) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss", $num, $descripcion, $fecha, $id3);
 
        if($stmt->execute()) {
            echo "Sesion guardada en Mysql.";
        } else {
            echo "Error al guardar: " .$stmt->error;
        }

        $stmt->close();
    }else{
        echo "faltan datos para guardar";
    }
$conexion->close(); 
?>