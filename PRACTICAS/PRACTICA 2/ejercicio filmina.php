<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>PRUEBA</title>
</head>
<body>
	<form action="enviar.php" method="post">
    	<h2>Contacto</h2>
        <input type="text" name="nombre" placeholder="Nombre" required="required" />
        <input type="text" name="correo" placeholder="Correo" required="required" />
        <input type="text" name="telefono" placeholder="Telefono" required="required" />
        <textarea name="mensaje" placeholder="Escriba aquí" required="required"></textarea>
        <input type="submit" id="boton" value="ENVIAR" />
    </form>
</body>
</html>