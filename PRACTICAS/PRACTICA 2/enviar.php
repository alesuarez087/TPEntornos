<?php
	$destino = "alepersa087@gmail.com";
	$nombre = $_Post["nombre"];
	$correo = $_Post["correo"];
	$telefono = $_Post["telefono"];
	$mensaje = $_Post["mensaje"];
	$contenido = "Nombre: " .$nombre ."\nCorreo: " . $correo . "\nTelefono: " . $telefono . "\nMensaje: " . $mensaje;
	
	mail($destino, "Aqui va el Asunto", $contenido);
	
?>