<!DOCTYPE html>
<html lang="esp" dir="ltr">
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="mmenu.css">  
    <meta charset="utf-8">
    <title>Stock</title>
  </head>
  <body>
    <h2></h2>
<h1><br>Stock</h1>
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
<br><table border="1" class="table table-striped" id= "table_id">
  <!--esto es para darle el grosor a la tabla y para poner una imagen de fondo en la tabla.-->
  <thead>
    <tr><th>Marca</th>
      <th>Color</th>
      <th>Tipo</th>
      <th>Inventario Inicial</th>
      <th>Restantes</th>

    </tr>
</thead>
<tr>
  <td> Tapas De Ciel</td>
  <td>Rojo</td>
  <td>52Mm</td>
  <td><?php  
require("conexion.php");
//esto es para sumar las tapas Inventario Inicial---------------------------------------------
      $consulta = ("SELECT SUM(Tamaño) as 'ctotal' FROM tablaarticulos WHERE Tipo='Ciel de 52Mm' AND Articulo = 'Tapas De Ciel'");  
      $ctotal=0;
      $resultado = mysqli_query($conexion,$consulta);
      $data= mysqli_fetch_array($resultado);
      $ctotal = $data['ctotal'];
      if ($ctotal<1) {
      echo "No existen registros";
      }else{
      echo $ctotal," Tapas", "<br>";   
      }
      
      
//Ciel 52Mm
  ?></td>
  <td>
    <?php //esto es para hacer la resta----------------------------------------------
    $cant=("SELECT SUM(Cantidad) as 'alltap' FROM ventas where Marca='Tapas De Ciel' AND Tipo='Ciel De 52Mm'");
    $tot=mysqli_query($conexion,$cant);
    $tot=mysqli_fetch_array($tot);
    $alltap=$tot['alltap'];
      /*echo "$alltap","<br>";*/
      if ($alltap<=0) {
        echo "No existen registros";
      }elseif ($alltap>=-1) {
      $resta = ("SELECT $ctotal-($alltap) as 'Totapas' FROM ventas");
      $Totapas=0;
      $mostrar= mysqli_query($conexion,$resta);
      $datos=mysqli_fetch_array($mostrar);
      $Totapas=$datos['Totapas'];
      echo "$Totapas"," Tapas";
      }
      
    ?>
  </td>
</tr>
<tr>
  <tr>
  <td> Tapas De Ciel Grande</td>
  <td>Rojo</td>
  <td>58Mm</td>
  <td>
    <?php
    //esto es para sumar las tapas ----------------------------------------------
    $consulta2 = ("SELECT SUM(Tamaño) as 'ctotal2' FROM tablaarticulos WHERE Tipo='Ciel de 58Mm' AND Articulo = 'Tapas De Ciel'"); 
      $ctotal2=0; 
      $resultado2 = mysqli_query($conexion,$consulta2);
      $data= mysqli_fetch_array($resultado2);
      $ctotal2 = $data['ctotal2'];
       if ($ctotal2<1) {
      echo "No existen registros";
      }else{
      echo $ctotal2," Tapas", "<br>"; 
      }
      
//Ciel 58Mm  ?>
  </td>
  <td>
    <?php //esto es para hacer la resta----------------------------------------------
    $cant2=("SELECT SUM(Cantidad) as 'alltap2' FROM ventas where Marca='Tapas De Ciel' AND Tipo='Ciel De 58Mm'");
    $tot=mysqli_query($conexion,$cant2);
    $tot=mysqli_fetch_array($tot);
    $alltap2=$tot['alltap2'];
      /*echo "$alltap","<br>";*/      
      if ($alltap2<=0) {
        echo "No existen registros";
      }elseif ($cant2>=-1) {
      $resta = ("SELECT $ctotal2-($alltap2) as 'Totapas2' FROM ventas");
      $mostrar2= mysqli_query($conexion,$resta);
      $datos2=mysqli_fetch_array($mostrar2);
      $Totapas2=$datos2['Totapas2'];
      echo "$Totapas2"," Tapas";
      }
      
    ?>
  </td>
</tr>
<tr>
  <tr>
  <td> Tapas De Santorini</td>
  <td>Rojo</td>
  <td>49Mm</td>
  <td>
    <?php     //esto es para sumar las tapas ----------------------------------------------   
      $consulta3 = ("SELECT SUM(Tamaño) as 'ctotal3' FROM tablaarticulos WHERE Tipo='Santorini de 49Mm' AND Articulo = 'Tapas De Santorini'");  
      $ctotal3=0;
      $resultado3 = mysqli_query($conexion,$consulta3);
      $data= mysqli_fetch_array($resultado3);
      $ctotal3 = $data['ctotal3'];
        if ($ctotal3<1) {
      echo "No existen registros";
      }else{
      echo $ctotal3," Tapas", "<br>"; 
      }
      
//Santorini 49Mm ?>
  </td>
  <td>
   <?php //esto es para hacer la resta----------------------------------------------
    $cant3=("SELECT SUM(Cantidad) as 'alltap3' FROM ventas where Marca='Tapas De Santorini' AND Tipo='Santorini de 49Mm'");
    $tot=mysqli_query($conexion,$cant3);
    $tot=mysqli_fetch_array($tot);
    $alltap3=$tot['alltap3'];
      /*echo "$alltap","<br>";*/
      if ($alltap3<=0) {
        echo "No existen registros";
      }elseif ($alltap3>=-1) {
      $resta = ("SELECT $ctotal3-($alltap3) as 'Totapas3' FROM ventas");
      $mostrar3= mysqli_query($conexion,$resta);
      $datos=mysqli_fetch_array($mostrar3);
      $Totapas3=$datos['Totapas3'];
      echo "$Totapas3"," Tapas";
      }
      
    ?>
  </td>
</tr>
<tr>
  <tr>
  <td>Tapas De Santorini Grande</td>
  <td>Rojo</td>
  <td>55Mm</td>
  <td>
    <?php   //esto es para sumar las tapas----------------------------------------------
      $consulta4 = ("SELECT SUM(Tamaño) as 'ctotal4' FROM tablaarticulos WHERE Tipo='Santorini de 55Mm' AND Articulo = 'Tapas De Santorini'");  
      $ctotal=0;
      $resultado4 = mysqli_query($conexion,$consulta4);
      $data= mysqli_fetch_array($resultado4);
      $ctotal4 = $data['ctotal4'];
         if ($ctotal4<1) {
      echo "No existen registros";
      }else{
      echo $ctotal4," Tapas", "<br>"; 
      }
      
      //Santorini 55Mm ?>
  </td>
  <td>
  <?php  //esto es para hacer la resta----------------------------------------------
    $cant4=("SELECT SUM(Cantidad) as 'alltap4' FROM ventas where Marca='Tapas De Santorini' AND Tipo='Santorini de 55Mm'");
    $tot=mysqli_query($conexion,$cant4);
    $tot=mysqli_fetch_array($tot);
    $alltap4=$tot['alltap4'];
    //echo "$alltap4","<br>";
if ($alltap4<=0) {
        echo "No existen registros";
      }elseif ($alltap4>=-1) {
  $resta = ("SELECT $ctotal4-($alltap4) as 'Totapas' FROM ventas");
      $mostrar= mysqli_query($conexion,$resta);
      $datos=mysqli_fetch_array($mostrar);
      $Totapas=$datos['Totapas'];
      echo "$Totapas"," Tapas";
}
      
    ?>
  </td>
</tr>
  <td >  
  </td>
<tbody> 
  </body>
</html>