<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Comanda</title>
    <style>
        body{
            font-family:Arial,sans-serif;
            background: #f2f2f2;
            padding: 20px;
        }
        .container{
            max-width:600px;
            margin:auto;
            background: #fff;
            padding: 20px;
            border-radius:10px;
        }
        h3{
            text-align:center;
            color:#333;
        }
        label{
            display:block;
            margin-top: 10px;
            font-weight: bold;
        }
        input, select, textarea, button{
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border:1px solid #ccc;
        }
        button{
            background: #d9534f ;
            color:white;
            border:none;
            margin-top:15px;
            cursor:pointer;
        }
        button:hover{
            background: #c9302c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Registrar Comanda</h3>
        <form action="procesar_comanda.php" method="POST">
            <label for="mesa">Seleccione una mesa</label>
            <select name="mesa" id="mesa">
                <option value="">Seleccione una mesa</option>
                <?php include("conexion.php");
                $consulta=mysqli_query($conexion,"SELECT * FROM mesas");
                if(!$consulta){
                    echo"<option disabled>Error al consultar mesas</option>";
                }else{
                    while($fila=mysqli_fetch_assoc($consulta)){
                        echo"<option value='".$fila['id']."'>Mesa".$fila['capacidad']."</option>";
                    }
                }
                ?>
            </select>
            
            <label for="descripcion">Descripcion de comanda</label>
            <textarea name="descripcion" id="descripcion"rows="3"required></textarea>
            <label for="total">Total($)</label>
            <input type="number" name="total" id="total"min="0"required>
            
            <button type="submit">Enviar Comanda</button>
        </form>
    </div>
</body>
</html>