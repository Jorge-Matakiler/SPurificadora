<!DOCTYPE html>
<html lang="esp" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Venta</title>
    <link rel="stylesheet" type="text/css" href="DiseñoPuri.css">
  </head>
  <body>
    <h2></h2>
<h1> Venta</h1>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="Calculadora.php">Calculadora de venta</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Inventario
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="Purificadora.php">Registro de compra</a></li>
            <li><a class="dropdown-item" href="stock.php">Articulos(Stock)</a></li>
            <li><a class="dropdown-item" href="venta.php">Ventas</a></li>
          </ul>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Reportes
          </a>
          <ul class="dropdown-menu">
         <li><a class="dropdown-item" href="repganancias.php">Ganancias</a></li>
            <li><a class="dropdown-item" href="repmaxmin.php">Venta Maxima y Minima</a></li>
            <li><a class="dropdown-item" href="repventatotal.php">Venta Total</a></li>         
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br>
<a class="btnB"  href="ventaBus.php" >Buscador</a>
<br>
  <br><table border="1" class="table table-striped" id= "table_id">
  <!--esto es para darle el grosor a la tabla y para poner una imagen de fondo en la tabla.-->
  <thead>
      <tr>
      <th>Fecha</th>
      <th>Cantidad</th>
      <th>Marca</th>
      <th>Tipo</th>
      <th>Total</th>
      <th>Acciones</th>
      </tr>
</thead>
<tbody>
      <?php
          require("conexion.php");
        /*el require sirve para añadir otros ficheros a nuestros scripts en PHP,
        esto da a entender que se "requiere" tal archivo para que funcione*/
          $consulta=mysqli_query($conexion, "SELECT * FROM ventas");
          while ($fila=mysqli_fetch_array($consulta)) {
        /*while, esta sentencia es creada para adquirir la cadena de caracteres (el array)
        y los muestre hasta que se terminen las iteraciones de esta cadena de datos*/
            printf('
              <tr>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                <td>$%s.00</td>
                <td>
                <a class="btndel" href="eliminarVenta.php?Ventas_Id=%d" onclick="return confirmacion()">Eliminar</a>
                </td>
              </tr>
              ', $fila["Fecha"], $fila["Cantidad"],$fila["Marca"],$fila["Tipo"],$fila["Total"], $fila["Ventas_Id"], $fila["Ventas_Id"],);
          }
//esto es para sumar la cantidad de dinero que existe
    /*  $consulta = ("SELECT SUM(Total) as 'ventotal' FROM ventas");
      $resultado = mysqli_query($conexion,$consulta);
      $data= mysqli_fetch_array($resultado);
      $ventotal=$data['ventotal'];
      echo $ventotal; */?>
  </body>
  <tfoot>
      <tr>
        <td  colspan="6"><a href="Calculadora.php" class="btnA">Agregar</a></td>
        <!--El colspan sirve como su nombre lo dice "col" de column o columna hace que las celdas se junten en una sola-->
      </tr>
    </tfoot>
</html>