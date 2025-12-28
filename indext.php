<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control-Restaurante</title>
    <style>
        body{
            font-family: Arial; 
            background: #f9f9f9;
        }
        .container{
            max-width: 600px; margin:40px auto;
            background: white;
            padding: 30px;
            border-radius:10px;
            box-shadow: 0 0 10px #ccc;
        }
        h1{
            text-align: center;
            color: #333;
        }
        .menu{
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 30px;
        }
        a.button{
            text-align: center;
            background-color: #007bff;
            color: white;
            padding: 12px;
            text-decoration: none;
            border-radius: 6px;
            font-size: 16px;
        }
        a.whatsapp{
            background-color: #25d366;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Restaurante "DOÑA MARY"</h1>
        <div class="menu">
        <a class="button"href="registrar_cliente.html">Registrar Cliente</a>  
        <a class="button"href="registrar_mesa.html">Registrar Mesa</a>    
        <a class="button" href="registrar_productos.php">Registrar Productos del dia</a>
        <a class="button" href="mostrar_pedido.php">Ver pedido</a>
        </div>
    </div>
</body>
</html>