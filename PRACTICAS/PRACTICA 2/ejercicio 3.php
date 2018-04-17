<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<body>

	<form action="<?php enviar(); ?>" method="post">
    	<h2>Contacto</h2>
        <input type="text" name="nombre" placeholder="Nombre" required="required" />
        <input type="text" name="correo" placeholder="Correo" required="required" />
        <input type="text" name="destino" placeholder="Destino" required="required" />
        <input type="text" name="telefono" placeholder="Telefono" required="required" />
        <textarea name="mensaje" placeholder="Escriba aquí" required="required"></textarea>
        <input type="submit" id="boton" value="ENVIAR" />
    </form>

<?php
	function enviar(){
		$destino = $_Post["destino"];
		$nombre = $_Post["nombre"];
		$correo = $_Post["correo"];
		$telefono = $_Post["telefono"];
		$mensaje = $_Post["mensaje"];
		$contenido = "Nombre: " .$nombre ."\nCorreo: " . $correo . "\nTelefono: " . $telefono . "\nMensaje: " . $mensaje;
	
		mail($destino, "Aqui va el Asunto", $contenido);
	}
?>
</body>
</html>