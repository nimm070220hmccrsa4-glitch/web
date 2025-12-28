<?php
$host="localhost";
$user="root";
$pass="";
$db="restaurante";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error){
    die("Conexion fallida:" .$conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"] ?? ""; 
    $apellido = $_POST["apellido"] ?? "";
    $fecha = $_POST["fecha"] ?? ""; 
    $id2 = $_POST["idmesa"] ?? ""; 

    
        $stmt = $conn->prepare("INSERT INTO clientes(nombre, apellido, fecha, idmesa) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss", $nombre, $apellido,$fecha, $id2);

        if($stmt->execute()) {
            echo "Sesion guardada en Mysql.";
        } else {
            echo "Error al guardar: " .$stmt->error;
        }

        $stmt->close();
    }else{
        echo "faltan datos para guardar";
    }


$conn->close(); 
?>