<?php
//conexion a la base de datos y consulta para mostrar en tabla y formulario los datos registrados en la base de datos
$include = include("conectar.php");
if ($include) { 
  $conectar = con();

  $consulta2 = "SELECT * FROM empleados";
  $resEmp = $conectar->query($consulta2);
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Dr. Yoweri I</title>
    <link rel="stylesheet" type="text/css" href="estilos/estilo.css">
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
                    <div class="nav-wrapper light-blue lighten-4">
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
              <form method="post">
                <table class="highlight">

                  <tr>
                    <th>ID del empleado</th>
                    <th>Nombre del empleado</th>
                    <th>Email del empleado</th>
                    <th>Hora de entrada</th>
                    <th>Hora de salida</th>
                    <th>Dias laborales</th>
                    <th>SELECCIONAR</th>
                  </tr>
                  <a href="#actualizar" class="waves-effect waves-light btn-large light-blue lighten-4"><i class="material-icons right">keyboard_arrow_down</i>BAJAR</a>

<?php
//muestra los registros enviados por el formulario en "stock.html"
                  while ($registroEmpleados = $resEmp->fetch_array(MYSQLI_BOTH)) 
                  {
                    echo '<tr>
                        <td>' . $registroEmpleados['id'] . '</td>
                        <td>' . $registroEmpleados['nombre_completo'] . '</td>
                        <td>' . $registroEmpleados['email'] . '</td>
                        <td>' . $registroEmpleados['horario_ingreso'] . '</td>
                        <td>' . $registroEmpleados['horario_salida'] . '</td>
                        <td>' . $registroEmpleados['dias_trabajo'] . '</td>
                        <td><label><input type="checkbox" name="eliminar[]" value="'.$registroEmpleados['id'].'"/><span></span></label> </td>
                        </tr>';     
                    }
?>
                </table>

<?php
//boton que registra los campos seleccionados y realiza la consulta necesaria para eliminar la primary key que los contiene
                if (isset($_POST['borrar1'])) 
                
                {
                if(empty($_POST['eliminar']))
                {
                    echo '<h3> No se ha seleccionado ningun item!</h3>';
                }                
                    else
                  {
                      foreach ($_POST['eliminar'] as $id_borrar) 
                      {
                      $borrarId = $conectar->query("DELETE from items where id='$id_borrar'");
                    }
                  }
                }
?>
                <i class="small material-icons right">delete_forever</i>
               <input type="submit" class="waves-effect waves-light btn right red" name="borrar1" onclick="document.location.reload()" value="Eliminar Item" id="eliminar">
              
              </form>
            </article>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </div>
    </main>
  </body>
</html>