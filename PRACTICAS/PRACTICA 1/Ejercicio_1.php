<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<?php if (!isset($_POST['submit'])) { ?>
	<form method="post" action="Ejercicio_1.php">
		<div>
			Nombre: <input name="texto" />  <input type="submit" name="submit" value="Ir"> 
		</div>
	</form>
<?php  } else { comprobar_nombre_usuario($_POST['texto']);  } ?>

<?php
	function comprobar_nombre_usuario($nombre_usuario){						//compruebo que el tamaño del string sea válido.     
	if (strlen($nombre_usuario)<3 || strlen($nombre_usuario)>20){        
		echo $nombre_usuario . " no es válido<br>";        
		return false;    
	}   
	
	//compruebo que los caracteres sean los permitidos     
	$permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_";     
	for ($i=0; $i<strlen($nombre_usuario); $i++){        
		if (strpos($permitidos, substr($nombre_usuario,$i,1))===false){           
			echo $nombre_usuario . " no es válido<br>";           
			return false;        
			}     
	}     
	echo $nombre_usuario . " es válido<br>";     
	return true;  
} ?>


<body>
</body>
</html>