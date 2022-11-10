<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="menu2.css">
	<title>Calculadora De Garrafones</title>
</head>
<body>
	<h2></h2>
	<h1><br> Calculadora De Garrafones</h1>
<!--Esta es la pagina principal (MENU)-->
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
            
						<li><a class="dropdown-item" href="repventatotal.php">Venta Total</a></li>					
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>
<br><br><br>
<?php 
if (isset($_POST["enviar"])) {
	$Fecha=date('Y-m-d\TH:i:sP');
	$Cantidad=$_POST['Cantidad'];
	$Marca=$_POST['Marca'];
	$Tipo=$_POST['Tipo'];
	if (isset($_POST["Cantidad"])) {
			 		define("precio", 12);
			 		$Cantidad= $_POST['Cantidad'];	
			 		$Total=0;		
					$Total= $Cantidad*precio; 					 			
			 			if (isset($_POST["Total"])) {
			 				$Total=$_POST['Total'];
			 			}
			 			} 
require("conexion.php");
$insertar=mysqli_query($conexion,"
				INSERT INTO ventas
				VALUES(
					NULL,
					'$Fecha',
					'$Cantidad',
					'$Marca',
					'$Tipo',
					'$Total'
					)");

}
 ?>
<form  action="#" method="post" >
<br><table class="calcT" class="styleC">
	<tbody>
	<tr>
		<td>Cantidad De Garrafones</td>
		<td><input type="text" name="Cantidad"placeholder="Ingresa Garrafones"></td>
	</tr>
	<tr>
		<td>

		</td>
		<td><select name="Marca">			
			<option value="Tapas De Ciel">Tapas De Ciel</option>
			<option value="Tapas De Santorini">Tapas De Santorini</option>
		</select></td>	
	</tr>
	<tr>
		<td></td>
		<td><select name="Tipo">			
			<option value="Ciel de 52Mm">Ciel de 52Mm</option>
			<option value="Ciel de 58Mm">Ciel de 58Mm</option>
			<option value="Santorini de 49Mm">Santorini de 49Mm</option>
			<option value="Santorini de 55Mm">Santorini de 55Mm</option>			
		</select></td>	
	</tr>
	<tr>
		<td>
			<input type="submit" class="btn btn-primary mb-2" name="enviar"></td>
			<td class="stylePri">$<label>
			<?php 
			if (isset($_POST["Cantidad"])){			
			 		$Cantidad= $_POST['Cantidad'];	
			 		$Total=0;		
					$Total= $Cantidad*precio; 
			echo "$Total";}  ?>		 	
			.00</label></td>
	</tr>
	</tbody>
</table>	
</form>
</body>
</html>