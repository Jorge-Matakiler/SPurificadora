<?php  
		define("precio", 12);
		$cantidad = $_POST['cantidad'];//almacenamos en la variable lo que el usuario ingrese
		$total = precio*$cantidad;
		print "El total es " . $total ."\n";
?>