<?php include 'restaurante_conexion.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurate-Productos</title>
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
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color:rgb(255, 255, 255);
        }

        th, td {
           border: 1px solid #ddd;
           padding: 8px;
           text-align: left;
        }
        h3{
          text-align:center;
        }
</style>
</head>
<body>
    <div class="container">
        <h2>Registro de Productos</h2>
<form method="POST">
  <input type="text" name="nombre" placeholder="Nombre" required><br>
  <textarea name="descripcion" placeholder="Descripción"></textarea><br>
  <input type="number" step="0.01" name="precio" placeholder="Precio" required><br>
  <input type="number" name="existencia" placeholder="Existencia" required><br>
  <input type="text" name="imagen" placeholder="URL de la imagen"><br>
  <input type="text" name="ficha" placeholder="URL ficha técnica"><br>
  <button type="submit">Guardar producto</button>
</form>
    </div>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $desc = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $existencia = $_POST['existencia'];
    $imagen = $_POST['imagen'];
    $ficha = $_POST['ficha'];

    $sql = "INSERT INTO productos (nombre, descripcion, precio, existencia, imagen, ficha_tecnica)
            VALUES ('$nombre', '$desc', $precio, $existencia, '$imagen', '$ficha')";
    $conexion->query($sql);
}

// Mostrar productos
$resultado = $conexion->query("SELECT * FROM productos");
echo "<h3>Inventario</h3><table border='1'><tr><th>Nombre</th><th>Precio</th><th>Existencia</th><th>Imagen</th><th>Ficha</th></tr>";
while ($p = $resultado->fetch_assoc()) {
    $color = ($p['existencia'] < 5) ? ' style="background-color:red;color:white;"' : '';
    echo "<tr$color><td>{$p['nombre']}</td><td>{$p['precio']}</td><td>{$p['existencia']}</td>
          <td><img src='{$p['imagen']}' width='50'></td><td><a href='{$p['ficha_tecnica']}'>Ver ficha</a></td></tr>";
}
echo "</table>";
?>
