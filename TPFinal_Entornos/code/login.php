<html>
<head>
<title>Subir Item</title>
</head>
<body>
	<?php
		function correcto($texto){
			echo "<script type=\"text/javascript\">alert('$texto');</script>";
			echo "<script type=\"text/javascript\">location.href='../pages/index.php';</script>";
		}
		function error($texto){
			echo "<script type=\"text/javascript\">alert('$texto');</script>";
			echo "<script type=\"text/javascript\">window.history.back();;</script>";
		}
		
		if($_POST['event']=='Ingresar'){
			session_start();
			$vUser = $_POST['userLogin'];
			$vPass = $_POST['passLogin'];
			
			include("../code/conexion.inc");
			$vSql = "CALL UsuariosLogin('$vUser', '$vPass')";
			$vResultado = mysqli_query($link, $vSql) or die (error($link));
			
			if($fila = mysqli_fetch_array($vResultado)){
					$user = array('Id'=>$fila['id_usuario'],'Usuario'=>$fila['nombre'],'Nombre'=>$fila['nombre'], 'Apellido'=>$fila['apellido'], 'TipoUsuario'=>$fila['id_tipo_usuario'], 'Email'=>$fila['email'], 'DNI'=>$fila['dni']);
					$_SESSION['usuario'] = $user;
					if(isset($_COOKIE["elegido"])) header('Location: ../pages/elegido.php');
					else header('Location: ../pages/index.php');
			} else { 
				error("Usuario o Contraseña incorrecto");
			}
		} else if($_POST['event']=='Registrar'){
				$vUser= $_POST['userCreate'];
				$vPass = $_POST['passCreate'];
				$vNombre = $_POST['nombre'];
				$vApellido = $_POST['apellido'];
				$vDNI= $_POST['dni'];
				$vEmail = $_POST['email'];
			
				include("../code/conexion.inc"); //Arma la instrucción SQL y luego la ejecuta
				$vSql = "CALL UsuariosGetAll";
				$vResultado = mysqli_query($link, $vSql) or die (error(mysqli_error($link)));
				$validar = TRUE;
				while($fila = mysqli_fetch_array($vResultado)){		
					if($fila['nombre_usuario']==$vUser){
						$validar = FALSE;
					}
				}
				unset($vResultado, $link);
	
				if(!$validar){
					setcookie("email", $vEmail, time()+3600, "/");
					setcookie("dni", $vDNI, time()+3600, "/");
					setcookie("apellido", $vApellido, time()+3600, "/");
					setcookie("nombre", $vNombre, time()+3600, "/");
					error("Ese Nombre de Usuario ya fue agregado"); 						
				} else {
					include("../code/conexion.inc");
					$vSql = "CALL UsuariosInsert('$vApellido', '$vPass', '$vEmail', '$vNombre', '$vUser', '3', 'TRUE', '$vDNI')";
					mysqli_query($link, $vSql) or die (error(mysqli_error($link)));	
					mysqli_close($link);				
					correcto("Usuario agregado correctamente");	
				}
			} else if($_POST['event'] == 'No poseo cuenta'){
				header('Location: ../pages/login.php');
			} else {
				session_start();
				session_destroy();
				if(isset($_COOKIE["buscar"])) setcookie("buscar", '', time()-3600, "/");
				header('Location: ../pages/index.php');
			}
		
	?>
</body>
</html>