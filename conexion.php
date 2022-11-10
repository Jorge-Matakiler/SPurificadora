<?php
	$servidor="localhost";
	$usuario="root";
	$password="";
	$base="purificadora-bd";
/*Este es para hacer como un inicio de sesion, con esto lo unico que necesitamos hacer eso solamente mandarlo llamar en donde lo queramos utilizar en vez de cada vez estar repitiendo estas lineas de codigo*/
	$conexion=mysqli_connect("$servidor","$usuario","$password") or die();
	mysqli_select_db($conexion, $base);
?>