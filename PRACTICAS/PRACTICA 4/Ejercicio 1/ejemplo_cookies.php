<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
	if(isset($_POST["estilo"])){				//Veo si recibo datos del formulario
		$estilo = $_POST["estilo"]; 			//es que estoy recibiendo un estilo nuevo, lo tengo que meter en las cookies
		setcookie("estilo", $estilo, time() + (60 * 60 * 24 * 90));			 //meto el estilo en una cookie
	}else{
		if (isset($_COOKIE["estilo"])){ 		 //si no he recibido el estilo que desea el usuario en la p�gina, miro si hay una cookie creada
			$estilo = $_COOKIE["estilo"];			//es que tengo la cookie
		}
	}
?>
<html>

Pr�ctica N�4 continuaci�n Ejemplos Cookies

Ing. Daniela D�az Entornos Gr�ficos
<head>
<title>Cookies en PHP</title>
<?php
	if (isset($estilo)){				//miro si he tengo un estilo definido, porque entonces tengo que cargar la correspondiente hoja de estilos
		echo '<link rel="STYLESHEET" type="text/css" href="' . $estilo . '.css">';
	}
?>
</head>
<body>
	<p>
		<form action="taller-cookies-php.php" method="post">
			Aqu� puedes seleccionar el estilo que prefieres en la p�gina:
			<br>
			<select name="estilo">
				<option value="verde">Verde</option>
				<option value="rosa">Rosa</option>
				<option value="negro">Negro</option>
			</select>
			<input type="submit" value="Actualizar el estilo">
		</form>
	</p>
</body>
</html>