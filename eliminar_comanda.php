<?php
include ("conexion.php");

$id=$_GET['id'];
mysqli_query($conexion,"DELETE FROM comandas WHERE id =$id");
header("Location: mostrar_comandas.php");
?>