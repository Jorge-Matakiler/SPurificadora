<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

	<link rel="stylesheet" type="text/css" href="modificarS.css">
</head>
<body>
	<h2></h2>
<h1>Registro de compras de artículo con GENOVEVA</h1>
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
<a href="Purificadora.php" class="btn btn-secondary">Registro</a> &raquo; Añadir
			<?php
			if (isset($_POST["enviar"])) {
			$Fecha=date('Y-m-d');			
			$Articulo=$_POST["Articulo"];
			$Color=$_POST["Color"];
			$Tipo=$_POST["Tipo"];
			$Tamaño=$_POST["Tamaño"];
				require("conexion.php");
/*el require sirve para añadir otros ficheros a nuestros scripts en PHP,
			esto da a entender que se "requiere" tal archivo para que funcione*/
				$insertar=mysqli_query($conexion,"
				INSERT INTO
				/*con esto lo que se esta haciendo es para poder insertar los valores asignados en cada espacio, y tambien nos dice en que tabla la quisiera agregar*/
					tablaarticulos
					VALUES(
					NULL,
					'$Fecha',
					'$Articulo',
					'$Color',
					'$Tipo',
					'$Tamaño'
					)");
	echo "<h2 style='background:#390; color:#fff; padding:5px'>Se ha agregado con éxito</h2>";
	/*echo es para mostrar como una tipo alerta o descripcion de lo que acaba de suceder (en este contexto)*/
		}
?>
<form action="#" method="post">
<br><br>
			<table >
				<!--esto es para asignarle una imagen de fondo a nuetra tabla.-->
				<!---->
				<tr>
					<td><label>Fecha De Compra:</label></td>
					<td>
						<?php
						$Fecha=date('Y-m-d');
						echo $Fecha;
						?>
					</td>
				</tr>
				<tr>
					<td><label>Marca</label></td>
					<td>
						<select name="Articulo">
							<option value="Tapas De Ciel">Tapas De Ciel</option>
							<option value="Tapas De Santorini">Tapas De Santorini</option>
						</select>
					</td>
				</tr>
				<!---->
				<tr>
					<td><label>Color</label></td>
					<td>
						<select name="Color">
							<option value="Rojas">Rojas</option>							
						</select>
					</td>
				</tr>
				<!---->
				<tr>
					<td><label>Tipo</label></td>
					<td>
						<select name="Tipo">
							<option value="Ciel de 52Mm">Ciel de 52Mm</option>
							<option value="Ciel de 58Mm">Ciel de 58Mm</option>
							<option value="Santorini de 49Mm">Santorini de 49Mm</option>
							<option value="Santorini de 55Mm">Santorini de 55Mm</option>							
						</select>
					</td>
				</tr>
				<!---->
				<tr>
					<td><label>Cantidad</label></td>
					<td>
						<select name="Tamaño">
							<option value="1000">1000</option>
							<option value="500">500</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" name="enviar"></td>
				</tr>
			</table>
	</form>
<!--con este form lo que estamos haciendo es recolectar las respuestas que estamos llenando para posteriormente mostrarlos y agregarlos a nuestra base de datos-->
</body>
</html>
