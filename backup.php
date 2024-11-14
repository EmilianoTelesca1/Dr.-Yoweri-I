<?php

$include = include("conectar.php");
if ($include) {
  $consulta ="SELECT * FROM stock";
  $conectar = con();
  $resultado = mysqli_query($conectar, $consulta);
  if ($resultado) {
    while ($row = $resultado->fetch_array()) {
      $id = $row['id'];
      $nombre = $row['nombre'];
      $valor = $row['valor'];
      $cantidad = $row['cantidad'];
     
    
    }
  
  }

}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Stock Manager</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <link rel="icon" href="imagenes/iconostock.ico">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>

  <body>
    <main>
        <div class="container">
            <header>
                <nav>
                    <div class="nav-wrapper orange lighten-3">
                        <a href="index.html" class="brand-logo center">Dr. Yoweri I</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="empleados.html">Empleados</a></li>
                    <li><a href="stock.html">Registro</a></li>
                    <li><a href="inventario.php">Historial</a></li>
                    </ul>
                    </div>
                </nav>
            </header>
            <article>
              <table>
                <thead>
                  <tr>
                    <th>ID del producto</th>
                    <th>Descripción del producto</th>
                    <th>Valor del producto ($)</th>
                    <th>Cantidad en Stock</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $nombre ?></td>
                    <td><?php echo $valor ?></td>
                    <td><?php echo $cantidad ?></td>
                  </tr>
                </tbody>
              </table>
            </article>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </div>
    </main>
  </body>
</html>