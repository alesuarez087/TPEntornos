<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>
<?php
		$estilo = $_POST["estilo"]; 			//es que estoy recibiendo un estilo nuevo, lo tengo que meter en las cookies
		setcookie("estilo", $estilo, time() + (60 * 60 * 24 * 90));			 //meto el estilo en una cookie
		header("location:ejemplo_cookies.php");
	?>
<body>
</body>
</html>
