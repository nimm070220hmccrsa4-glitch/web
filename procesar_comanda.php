<?php
include("conexion.php");
$mesa=$_POST['id_mesa'];
$descripcion=$_POST['descripcion'];
$total=$_POST['total'];
$sql="INSERT INTO comandas(id_mesa, descripcion, total, fecha) VALUES ('$mesa','$descripcion','$total',NOW())";
if(mysqli_query($conexion,$sql)){
    echo"Comanda registrada con exito.";
}else{
    echo"Error:".mysqli_error($conexion);
}
?>