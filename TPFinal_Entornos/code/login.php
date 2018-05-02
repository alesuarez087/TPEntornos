<html>
<head>
<title>Subir Item</title>
</head>
<body>
	<?php
		if($_POST['event']=='Ingresar'){
			$vUser = $_POST['userLogin'];
			$vPass = $_POST['passLogin'];
			
			include("../code/conexion.inc");
			$vSql = "CALL UsuariosLogin('$vUser', '$vPass')";
			$vResultado = mysqli_query($link, $vSql) or die (mysqli_error($link));
			
			while($fila = mysqli_fetch_row($vResultado)){
					setcookie('usuario', $fila['id_usuario'], time()+60*60);
					setcookie('tipo_usuario', $fila['id_tipo_usuario'], time()+60*60);
					header('Location: ../pages/home.php');
			}
		}
	?>
</body>
</html>