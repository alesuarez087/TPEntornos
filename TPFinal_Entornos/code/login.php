<html>
<head>
<title>Subir Item</title>
</head>
<body>
	<?php
	
		function error($texto){
			echo "<script type=\"text/javascript\">alert('$texto');</script>";
		}
		
		if($_POST['event']=='Ingresar'){
			session_start();
			$vUser = $_POST['userLogin'];
			$vPass = $_POST['passLogin'];
			
			include("../code/conexion.inc");
			$vSql = "CALL UsuariosLogin('$vUser', '$vPass')";
			$vResultado = mysqli_query($link, $vSql) or die (mysqli_error($link));
			
			if($fila = mysqli_fetch_array($vResultado)){
					$_SESSION['usuario'] = $fila['id_usuario'];
					header('Location: ../pages/index.php');
			} else { 
				error("Usuario o Contraseña incorrecto");
			}
		} else {
			if($_POST['event']=='Registrar'){
				$vUser= $_POST['userCreate'];
				$vPass = $_POST['passCreate'];
				$vNombre = $_POST['nombre'];
				$vApellido = $_POST['apellido'];
				$vDNI= $_POST['dni'];
				$vEmail = $_POST['email'];
			} else {
				session_start();
				session_destroy();
				header('Location: ../pages/index.php');
			}
		}
	?>
</body>
</html>