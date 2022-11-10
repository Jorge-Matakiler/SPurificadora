<!DOCTYPE html>
<html>
<head>
	  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="DiseñoPuri.css">
	<title></title>
	<script>
		/*Este script funciona para realizar una pregunta en nuestro documento
		y el usuario tiene que dar clic en aceptar o cancelar y al momento de hacer
		esto lo que pasa es que regresara "verdadero" o "falso" todo depende de la respuesta*/
		function confirmacion() {
			if (confirm("Desea eliminar el registro?")) {
				return true;
			}; return false;
		}
	</script>
</head>
<body>
	<h2></h2>
	<h1><br> Compras De Purificadora El Rocio</h1>
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
	<!--Esto se utiliza para crear una tabla en la cual el "th" significa table head o cabeza de la tabla, lo cual es nombre que tendra la celda y lo que se mostrara-->
	<br><table border="1" class="table table-striped" id= "table_id">
		<!--esto es para darle el grosor a la tabla y para poner una imagen de fondo en la tabla.-->
		<thead>
				<tr>
				<th>Fecha</th>
				<th>Marca</th>
				<th>Color</th>
				<th>Tipo</th>
				<th>Cantidad</th>
				<th>Acciones</th>
				</tr>
				</thead>
<tbody>
		<?php
				require("conexion.php");
			/*el require sirve para añadir otros ficheros a nuestros scripts en PHP,
			esto da a entender que se "requiere" tal archivo para que funcione*/
				$consulta=mysqli_query($conexion, "SELECT * FROM tablaarticulos");
				while ($fila=mysqli_fetch_array($consulta)) {			
					printf('
						<tr>
							<td>%s</td>
							<td>%s</td>
							<td>%s</td>
							<td>%s</td>
							<td>%d Tapas</td>
							<td>
								<a class="btnmod" href="modificar.php?Productos_Id=%d">Modificar</a>
								<a class="btndel" href="eliminar.php?Productos_Id=%d" onclick="return confirmacion()">Eliminar</a>
							</td>
						</tr>
						',$fila["Fecha"], $fila["Articulo"], $fila["Color"], $fila["Tipo"],$fila["Tamaño"], $fila["Productos_Id"], $fila["Productos_Id"]);
				}?>
<!-- el %s es para obtener todos los caracteres que esten en el array y mostrarlo -->
<!--Estas dos sentencias son utilizadas para crear dos botones y estas mismas estan referenciadas hacia otros documentos php los cuales tienen sus propias instrucciones.
-->
		</tbody>
		<tfoot>
			<tr>
				<td  colspan="6"><a href="agregar.php" class="btnA">Agregar</a></td>
				<!--El colspan sirve como su nombre lo dice "col" de column o columna hace que las celdas se junten en una sola-->
			</tr>
		</tfoot>
	</table>
</body>
</html>