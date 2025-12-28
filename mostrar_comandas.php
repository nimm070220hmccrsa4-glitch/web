<?php
include ("conexion.php");
$resultado=mysqli_query($conexion,"SELECT c.id, m.numero AS mesa, c.descripcion, c.total, c.fecha FROM comandas c JOIN mesas m ON c.id_mesa=m.id");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comandas Registradas</title>
    <style>
        body{
            font-family: Arial,sans-serif;
            background: #f2f2f2;
            padding: 20px;
        }
        .container{
            max-width:900px;
            margin:auto;
            background #fff;
            padding: 20px;
            border-radius:10px;
        }
        h3{
            text-align:center;
            color#333;
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
        a.btn{
            display:inline-block:block;
            padding: 6px 12px;
            text-decoration: none;
            border-radius:4px;
            margin:2px;
        }
        .btn-warning{
            background-color:red;
            color:white;
        }
    </style>
</head>
<body>
    <div class="container">
    <h3>Lista de Comandas</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Mesa</th>
                <th>Descripcion</th>
                <th>Total</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_assoc($resultado)):?>
                <tr>
                    <td><?= $row['id']?></td>
                    <td><?= $row['mesa']?></td>
                    <td><?= $row['descripcion']?></td>
                    <td>$<?= $row['total']?></td>
                    <td><?= $row['fecha']?></td>
                    <td><a href="editar_comanda.php?=<?=$row['id'] ?>" class="btn btn-warning">Editar</a>
                    <td><a href="eliminar_comanda.php?=<?=$row['id'] ?>" class="btn btn-danger" onclick="return corfirm('¿Seguro que deseas eliminar esta comanda?')">Eliminar</a></td>
                </tr>
                <?php endwhile; ?>
        </tbody>
    </table>
    </div>
</body>
</html>