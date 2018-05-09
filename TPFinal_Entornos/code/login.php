<html>
<head>
<title>Subir Item</title>
</head>
<body>
	<?php
		if($_POST['event']=='Ingresar'){
			$vUser = $_POST['userLogin'];
			$vPass = $_POST['passLogin'];
			
			echo $vUser;
			
			include("../code/conexion.inc");
			$vSql = "CALL UsuariosLogin('$vUser', '$vPass')";
			$vResultado = mysqli_query($link, $vSql) or die (mysqli_error($link));
			
			while($fila = mysqli_fetch_array($vResultado)){
					setcookie("usuario", $fila['id_usuario'], time()+3600, "/");
					setcookie("tipo_usuario", $fila['id_tipo_usuario'], time()+3600, "/");
					header('Location: ../pages/home.php');
			}
		}else if($_POST['event']=='Registrar'){
			$vUser= $_POST['userCreate']
			$vPass = $_POST['passCreate']
			$vNombre = $_POST['nombre']
			$vApellido = $_POST['apellido']
			$vDNI= $_POST['dni']
			$vEmail = $_POST['email']
			}else {
				setcookie("usuario", '', time()-3600, "/");
				setcookie("tipo_usuario", '', time()-3600, "/");
			
				header('Location: ../pages/home.php');
			}
	?>
</body>
</html>