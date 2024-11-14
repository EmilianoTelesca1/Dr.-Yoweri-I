<?php
$include = include("conectar.php");
if ($include) { 
  $conectar = con();

  $consulta = "SELECT * FROM items";
  $resStock = $conectar->query($consulta);
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
              <section>
              <form method="post">
                <table class="highlight">

                  <tr>
                    <th>ID del empleado</th>
                    <th>Nombre del empleado</th>
                    <th>Hora del registro</th>
                    <th>Fecha de registro</th>
                    <th>SELECCIONAR</th>
                  </tr>
                  <a href="#actualizar1" class="waves-effect waves-light btn-large light-blue lighten-4"><i class="material-icons right">keyboard_arrow_down</i>BAJAR</a>

<?php
//ciclo que pickea los valores escritos y los guarda en una variable
                  while ($registroStock = $resStock->fetch_array(MYSQLI_BOTH)) 
                  
                  {
                    
                    echo'<tr>
                        <td><input name="idstock['.$registroStock['id'].']" value="' .$registroStock['id'] . '" /></td>
                        <td><input name="nombrestock['.$registroStock['id'].']" value="' .$registroStock['nombre'] . '" /></td>
                        <td><input name="valorstock['.$registroStock['id'].']" value="' .$registroStock['hora'] . '" /></td>
                        <td><input name="cantidadstock['.$registroStock['id'].']" value="' .$registroStock['fecha'] . '" /></td>
                        <td><label><input type="checkbox" name="eliminar[]" value="'.$registroStock['id'].'"/><span></span></label> </td>
                        </tr>';     
                    }
?>

                </table>
                <input type="submit" id="actualizar1" name="actualizar" value="Actualizar" class="waves-effect waves-light btn orange darken-3" onclick="document.location.reload()" />

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
                      $borrarId = $conectar->query("DELETE from stock where id='$id_borrar'");
                      //si da error constante bajar header a 'actualizar' para que deje de devolver booleano a la conexion pedazo de nasiiii  
                    }
                    }
                }
?>
                <i class="small material-icons right">delete_forever</i>
                <input type="submit" class="waves-effect waves-light btn right red" name="borrar1" onclick="document.location.reload()" value="Eliminar Item" id="eliminar">
              
              </form>

<?php
//boton que guarda los registros escritos en el input anterior para consultar en la base de datos, comparar valores, y si hay alguno distinto reemplazarlo siempre y cuando el id del producto sea el mismo   
                if(isset($_POST['actualizar']))
                
                {
                  foreach ($_POST['idstock'] as $idact) {
                    //Si hay que cambiar algo importante revisar nombre variables para no confundir la vuelta del string
                    $actId = mysqli_real_escape_string($conectar, $_POST['idstock'][$idact]);
                    $actNombre = mysqli_real_escape_string($conectar, $_POST['nombrestock'][$idact]);
                    $actValor = mysqli_real_escape_string($conectar, $_POST['horastock'][$idact]);
                    $actCantidad = mysqli_escape_string($conectar, $_POST['fechastock'][$idact]);

                    $actualizar = $conectar->query("UPDATE items SET id='$actId', nombre='$actNombre', hora='$actValor', fecha='$actCantidad' WHERE id=$idact");
                  }
                }
?>
              </section>
            </article>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </div>
    </main>
  </body>
</html>