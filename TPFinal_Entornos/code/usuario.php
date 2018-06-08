<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
</head>
<body>
<script>
	function correcto($texto){
		echo "<script type=\"text/javascript\">alert('$texto');</script>";
		echo "<script type=\"text/javascript\">location.href='../pages/index.php';</script>";
	}
	function error($texto){
		echo "<script type=\"text/javascript\">alert('$texto');</script>";
		echo "<script type=\"text/javascript\">window.history.back();;</script>";
	}
</script>
<?php
	if($_POST['event']=='Guardar'){
		$Apellido = $_POST['apellido'];
		$IdUsuario = $_POST['idUsuario'];
		$Email = $_POST['email'];
		$Nombre = $_POST['nombre'];
		$Clave = $_POST['clave'];
	
		include("conexion.inc");
		$vSql = "CALL UsuariosUpdateData('$IdUsuario', '$Apellido', '$Nombre', '$Email', '$Clave')";
		mysqli_query($link, $vSql) or die (error(mysqli_error($link));
		mysqli_close($link);
		correcto("Datos modificados Correctamente");
	} 
	header("location:index.php");
?>
</body>
</html>
