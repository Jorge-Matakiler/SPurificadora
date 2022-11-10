<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
	<title></title>
	<link rel="stylesheet" type="text/css" href="modificarS.css">
	<!--Esto es para que se le pueda agregar una hoja de estilo css-->
</head>
<body>
	<h2></h2>
<h1>Actualización del registro</h1>
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
<a href="Purificadora.php" class="btn btn-secondary">Registro</a> &raquo; Modificar
<?php
		$Productos_Id=$_GET["Productos_Id"];
		require("conexion.php");
/*el require sirve para añadir otros ficheros a nuestros scripts en PHP,
			esto da a entender que se "requiere" tal archivo para que funcione*/	
		$consulta=mysqli_query($conexion, "SELECT * FROM tablaarticulos WHERE Productos_Id='$Productos_Id'");		
		$fila=mysqli_fetch_array($consulta);
		$Productos_Id=$fila["Productos_Id"];
		$Fecha=$fila["Fecha"];
		$Articulo=$fila["Articulo"];
		$Color=$fila["Color"];
		$Tipo=$fila["Tipo"];
		$Tamaño=$fila["Tamaño"];

		if ($Articulo="Tapas De Ciel") {
			$Articulos='<option value="Tapas De Ciel" selected>Tapas De Ciel</option>
						<option value="Tapas De Santorini">Tapas De Santorini</option>			
			';	
		}elseif ($Articulo="Tapas De Santorini") {
			$Articulos='<option value="Tapas De Santorini"selected>Tapas De Santorini</option>
						<option value="Tapas De Ciel">Tapas De Ciel</option>
									
			'; 
		}
		if ($Color=="Rojas") {
			$Colors='<option value="Rojas" selected>Rojas</option>';			
		
		}
if ($Tipo=="Ciel de 52Mm") {
	$Tipos='
	<option value="Ciel de 52Mm" selected>Ciel de 52Mm</option>
	<option value="Ciel de 58Mm">Ciel de 58Mm</option>
				<option value="Santorini de 49Mm">Santorini de 49Mm</option>
				<option value="Santorini de 55Mm">Santorini de 55Mm</option>				
				';
}elseif ($Tipo=="Santorini de 49Mm") {
	$Tipos='
	<option value="Santorini de 49Mm" selected>Santorini de 49Mm</option>
	<option value="Santorini de 55Mm">Santorini de 55Mm</option>
	<option value="Ciel de 52Mm">Ciel de 52Mm</option>
	<option value="Ciel de 58Mm">Ciel de 58Mm</option>				
				
				';
}elseif ($Tipo=="Santorini de 55Mm") {
	$Tipos='
	<option value="Santorini de 49Mm">Santorini de 49Mm</option>
	<option value="Santorini de 55Mm" selected>Santorini de 55Mm</option>
	<option value="Ciel de 52Mm">Ciel de 52Mm</option>
	<option value="Ciel de 58Mm">Ciel de 58Mm</option>
				
				
				';
}elseif ($Tipo=="Ciel de 58Mm") {
	$Tipos='
	<option value="Ciel de 58Mm">Ciel de 58Mm</option>
	<option value="Ciel de 52Mm">Ciel de 52Mm</option>
	<option value="Santorini de 49 Mm">Santorini de 49Mm</option>
	<option value="Santorini de 55Mm">Santorini de 55Mm</option>
				';
}
if ($Tamaño="1000 Tapas") {
		$Tamaños='
		<option value="1000 Tapas" selected>1000 Tapas</option>
		<option value="500 Tapas">500 Tapas</option>
		';	
}elseif ($Tamaño="500 Tapas") {
		$Tamaños='
		<option value="1000 Tapas">1000 Tapas</option>
		<option value="500 Tapas" selected>500 Tapas</option>
		';
}
/*
con todas estas sentencias lo que hacemos es comparar las respuestas originales con las nuevas respuestas y si las respuestas originales quieren ser modificadas con esto se hace una comparacion y asi mismo se hace el cambio de la respuesta antigua con la respuesta nueva.
*/
if (isset($_POST["enviar"])) {
			$Productos_Id=$_POST["Productos_Id"];	
			$Fecha=$fila["Fecha"];
			$Articulo=$_POST["Articulo"];
			$Color=$_POST["Color"];
			$Tipo=$_POST["Tipo"];
			$Tamaño=$_POST["Tamaño"];
	$actualizar=mysqli_query($conexion, "
				UPDATE 
				/*y con el update se actualiza y/o se muestran las actualizaciones realizadas con la opcion de modificar*/
					tablaarticulos
				SET 				
					Articulo='$Articulo',
					Color='$Color',
					Tipo='$Tipo',
					Tamaño='$Tamaño'			
				WHERE 
					Productos_Id='$Productos_Id'
				");
			echo "<h2 style='background:#390; color:#fff; padding:5px'>Actualizacion exitosa </h2>";
		}
	print('			
	<br><br><br>	
			<form action="#" method="post">
						<table>												
				<tr>
					<td><br><label>Marca</label></td>
					<td><br>
						<select name="Articulo">
						'.$Articulos.'				
						</select>
					</td>
				</tr>
				<tr>
					<td><label>Color</label></td>
					<td>
						<select name="Color">
						'.$Colors.'
						</select>
					</td>
				</tr>			
				<tr>
					<td><label>Tipo</label></td>
					<td>
						<select name="Tipo">				 
						'.$Tipos.'
						</select>
					</td>
				</tr>
				<tr>
					<td><label>Cantidad</label></td>
					<td>
						<select name="Tamaño">
						'.$Tamaños.'
						</select>
					</td>
				</tr>						
						<tr>
							<td><input type="hidden" name="Productos_Id" value="'.$Productos_Id.'"></td>
							<td><input type="submit" class="btnAct" value="Actualizar"class="boton" name="enviar"><br><br></td>

						</tr>
					</table>
			
			</form>
			');
?>
<!--con estas lineas de codigo desde la linea 141 donde esta nuestro print es para actualizar la tabla principal y mostrar los nuevos valores que fueron actualizados.-->
</body>
</html>