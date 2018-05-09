<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
	<script>
		function logueo(){
			$vUser = document.form.user.value
			<?php echo $vUser; setcookie("log", $vUser, time()+60*60); ?>
			
		}
	</script>
	<?php
		if(isset($_COOKIE["log"])) echo "<b>Bienvenido ".$_COOKIE["log"]."</b>" ;
	?>
	<form action="" method="post" id="form" name="form" onsubmit="logueo()">
		Usuario: <input type="text" id="user" name="user" /><br />
		Contraseña: <input type="password" id="pass" name="pass" /><br />
		<input type="submit" name="boton"  />
	</form>

</body>
</html>
