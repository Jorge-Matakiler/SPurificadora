<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
	<title></title>
</head>
<body>
	<h1 style="text-align: center;">Eliminar Registro</h1>
<a class="btn btn-secondary" href="Purificadora.php">Registro</a> &raquo; Eliminar
<?php
			$Productos_Id=$_GET["Productos_Id"];
			require("conexion.php");
			$eliminar=mysqli_query($conexion, "DELETE FROM tablaarticulos WHERE Productos_Id='$Productos_Id'");	
			echo "<h2 style='background:#FC0000; color:#fff; padding:20px'>El Registro Se Ha Eliminado Con Exito</h2>";
		/*En este lo que se hace es mediante un ID obtenido se hace una peticion a la base de datos y las tablas para que se borre lo que se necesita.*/
	?>
</body>
</html>