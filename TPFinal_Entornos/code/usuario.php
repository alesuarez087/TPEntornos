<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
</head>
<body>
<?php
	function correcto($texto){
		echo "<script type=\"text/javascript\">alert('$texto');</script>";
		echo "<script type=\"text/javascript\">location.href='../pages/usuarios.php';</script>";
	}
	function edicion_correcta($texto){
		echo "<script type=\"text/javascript\">alert('$texto');</script>";
		echo "<script type=\"text/javascript\">location.href='../pages/index.php';</script>";
	}
	function error($texto){
		echo "<script type=\"text/javascript\">alert('$texto');</script>";
		echo "<script type=\"text/javascript\">window.history.back();</script>";
	}
	
	if($_POST['event']=='Editar'){
		$Usuario = $_POST['nombreUsuario'];
		$Apellido = $_POST['apellido'];
		$IdUsuario = $_POST['idUsuario'];
		$Email = $_POST['email'];
		$Nombre = $_POST['nombre'];
		$Clave = $_POST['clave'];
		$Dni = $_POST['dni'];
		
		include("conexion.inc");
		$vSql = "CALL UsuariosUpdateData('$IdUsuario', '$Apellido', '$Nombre', '$Email', '$Clave', '$Dni')";
		mysqli_query($link, $vSql) or die (error(mysqli_error($link)));
		mysqli_close($link);
		
		session_start();
		$_SESSION['usuario']['Apellido'] = $Apellido;
		$_SESSION['usuario']['Nombre'] = $Nombre;
		$_SESSION['usuario']['Email'] = $Email;
		$_SESSION['usuario']['DNI'] = $Dni;
		
		edicion_correcta("Sus datos fueron editados correctamente");
	}
	if(isset($_POST['idSelect'])){
		setcookie("modificar", "", time()-3600, "/"); 
		setcookie("eliminar", "", time()-3600, "/"); 
		include("../code/conexion.inc");
		$fila = "NO ME ANDA";
		$vID = $_POST['idSelect']; //Captura datos desde el Form anterior
		$vSql = "CALL UsuariosGetOneForId('$vID')"; //Arma la instrucción SQL y luego la ejecuta

		$vResultado = mysqli_query($link, $vSql) or die (error(mysqli_error($link)));
		$fila = mysqli_fetch_row($vResultado);
	
		setcookie("idUsuario", $fila[0], time()+3600, "/");
		setcookie("apellido", $fila[2], time()+3600, "/");
		setcookie("nombre", $fila[1], time()+3600, "/");
		setcookie("dni", $fila[6], time()+3600, "/");
		setcookie("email", $fila[8], time()+3600, "/");
		setcookie("nombreUsuario", $fila[7], time()+3600, "/");
		setcookie("cmbTipo", $fila[4], time()+3600, "/");
		$vHab = FALSE;
		if($fila[3]==1) $vHab = TRUE; 
		setcookie("habilitado", $vHab, time()+3600, "/");

																			
		if($_POST['event'] != 'Eliminar') setcookie("modificar", "Modificar", time()+3600, "/");
		else setcookie("eliminar", "Eliminar", time()+3600, "/"); 
		
		header("location:../pages/usuarios.php");
	}
	
	if($_POST['event'] == 'Buscar'){
		setcookie("busqueda", '%'.$_POST['buscar'].'%', time()+3600, "/");
	}
	
	if($_POST['event'] == 'Cancelar'){
		header("location:../pages/usuarios.php");	
	}
	
	if($_POST['event'] == 'Eliminar'){
		$vID = $_POST['idUsuario'];
		include("../code/conexion.inc");
		$vSql = "CALL UsuariosDelete('$vID')";	
		mysqli_query($link, $vSql) or die (error("Error al ejecutar la sentencia"));
		mysqli_close($link);
		correcto("Usuario eliminado correctamente");
	}
	
	if(isset($_POST['nombre'])) $vNombre = $_POST['nombre'];
	if(isset($_POST['apellido'])) $vApellido = $_POST['apellido'];
	if(isset($_POST['cmbTipo'])) $vTipo = $_POST['cmbTipo'];
	if(isset($_POST['email'])) $vEmail = $_POST['email'];
	if(isset($_POST['clave'])) $vClave = $_POST['clave'];
	if(isset($_POST['dni'])) $vDNI = $_POST['dni'];
	if(isset($_POST['habilitado'])) $vHabilitado = TRUE;
	else $vHabilitado = FALSE;
	
	if($_POST['event'] == 'Modificar'){
		$vID = $_POST['idUsuario'];
		include("../code/conexion.inc");
		$vSql = "CALL UsuariosUpdate('$vApellido', '$vClave', '$vEmail', '$vNombre', '$vTipo', '$vHabilitado', '$vDNI', '$vID')";	
		mysqli_query($link, $vSql) or die (error(mysqli_error($link)));
		mysqli_close($link);
		unset($link);
		correcto("Usuario modificado correctamente");
	}
	
	if($_POST['event'] == 'Guardar'){
		if(isset($_POST['nombreUsuario'])) $vNombreUsuario = $_POST['nombreUsuario'];
		include("../code/conexion.inc"); //Arma la instrucción SQL y luego la ejecuta
		$vSql = "CALL UsuariosGetAll()";
		$vResultado = mysqli_query($link, $vSql) or die (error("Error al recuperar los usuarios"));
		$validar = TRUE;
		while($fila = mysqli_fetch_array($vResultado)){		
			if($fila['nombre_usuario']==$vNombreUsuario){
				$validar = FALSE;
			}
		}
		unset($vResultado, $link);
	
		if(!$validar){
			error("Ese Nombre de Usuario ya fue agregado"); 						
		} else {
			include("../code/conexion.inc");
			$vSql = "CALL UsuariosInsert('$vApellido', '$vClave', '$vEmail', '$vNombre', '$vNombreUsuario', '$vTipo', '$vHabilitado', '$vDNI')";	
			mysqli_query($link, $vSql) or die (error("Error al agregar el usuario"));
			unset($link);
				
			correcto("Usuario agregado correctamente");	
		}
	}
?>
</body>
</html>
