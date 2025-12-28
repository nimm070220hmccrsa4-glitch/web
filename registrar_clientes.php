<?php
include ("restaurante_conexion.php");
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $nombre=$_POST["nombre"];
    $telefono=$_POST["telefono"];
    $tipo=$_POST["tipo_cliente"];
    $sql="INSERT INTO cliente(nombre,telefono,tipo_cliente)VALUES('$nombre','$telefono','$tipo')";
    if($conexion->query($sql)){
        echo"<p>Cliente registrado correctamente</p>";
    }else{
        echo "<p>Error:".$conexion->error."</p>";
    }
}

//Mostrar lista
$resultado=$conexion->query("SELECT* FROM cliente");
echo"<h3>Clientes Registrados</h3>
<table border='1'>
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Telefono</th>
<th>Tipo</th> 
<th>Fecha de Alta</th>
</tr>";
while($fila=$resultado->fetch_assoc()){
    echo"
    <tr>
<td>{$fila['id']}</td>
<th>{$fila['nombre']}</th>
<th>{$fila['telefono']}</th>
<th>{$fila['tipo_cliente']}</th>
<th>{$fila['fecha_alta']}</th>
    </tr>";
}
echo"</table>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Cliente</title>
    <style>
        body{
            font-family:Arial;
            background-color: #f2f2f2;
            padding: 20px;
        }
        .container{
            max-width:500px;
            margin:auto;
            background: white;
            padding: 20px;
            border-radius:10px;
        }
        label, input, select, button{
            display: block;
            width: 100%;
            margin-top:10px;
            border-radius:5px;
        }
        button{
            background: green;
            color:white;
            border:none;
            cursor:pointer;
        }
        table{
            width: 100%;
            border-collapse:collapse;
            margin-top:20px;
        }
        th, td{
            border:1px solid #333;
            padding:10px;
            text-align:center;
        }
        th{
            background-color: #444;
            color:white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registrar cliente</h2>
        <form method="POST">
            <label>Nombre Cliente</label>
            <input type="text"name="nombre" placeholder="Nombre Cliente"required>
            <label>Telefono</label>
            <input type="text"name="telefono" placeholder="Telefono"required>
            <select name="tipo_cliente" required>
                <option value="">Selecione tipo Cliente</option>
                <option value="Regular">Regular</option>
                <option value="Nuevo">Nuevo</option>
                ?>
            </select>
            <button type="submit">Registrar</button>
        </form>
    </div>
</body>
</html>