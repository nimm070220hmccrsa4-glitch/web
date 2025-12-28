<?php
include ("conexion.php");
$id=$_GET['id'];
$comanda=mysqli_fetch_assoc(mysqli_query($conexion,"SELECT * FROM comandas WHERE id =$id"));
if($_SERVER['REQUEST_METHOD']=='POST'){
    $descripcion=$_POST['descripcion'];
    $total=$_POST['total'];
    $sql="UPDATE comandas SET descripcion='$descripcion, total='$total' WHERE id=$id";
    mysqli_query($conexion,$sql);
    header("location: mostrar_comandas.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Comanda</title>
<style>
        body{
            font-family:Arial,sans-serif;
            background: #f2f2f2;
        }
        .container{
            max-width: 600px;
            margin:auto;
            background: #fff;
            padding:20px;
            border-radius:10px;
        }
        h3{
            text-align:center;
            color: #333;
        }
        label{
            display:block;
            margin-top:10px;
            font-weight:bold;
        }
        input, textarea, button, a{
            width:100%;
            padding:10px;
            margin-top:5px;
            border-radius:5px;
            border:1px solid #ccc;
            display: block;
        }
        button{
            background: #007bff;
            color:white;
            border:none;
            margin-top:15px;
            cursor:pointer;
        }
        button:hover{
            background: #0056b3;
        }
        a{
            text-align:center;
            margin-top:10px;
            text-decoration:none;
            background: #6c757d;
            color:white;
        }
        a:hover{
            background: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Editar Comanda</h3>
        <form method="POST">
            <label>Descripcion</label>
            <textarea name="descripcion" required><?=$comanda['descripcion']?></textarea>

            <label>Total</label>
            <input type="text" name="total"value="<?=$comanda['total']?>"required></input>

            <button type="submit">Actualizar</button>
            <a href="mostrar_comandas">Cancelar</a>
        </form>
    </div>
</body>
</html>