<?php

	function correcto($texto){
		echo "<script type=\"text/javascript\">alert('$texto');</script>";
		echo "<script type=\"text/javascript\">location.href='../pages/itemsComprados.php';</script>";
	}
 	function error($texto){
		echo "<script type=\"text/javascript\">alert('$texto');</script>";

	}
	
	session_start();
	$usuario = $_SESSION['usuario'];	
	
	if($_POST['event'] == 'Cancelar') {
		header("Location:../pages/itemsComprados");
	} else
	if($_POST['event'] == 'Calificar'){

		if(isset($_POST['messageAdd'])) $mensaje = $_POST['messageAdd']; else $mensaje = "";
		if(isset($_POST['estrellas'])) $valor = $_POST['estrellas']; else $valor = 0;
		$idUsuario = $usuario['Id'];
		$idItem = $_POST['idSelect'];
		
		include("conexion.inc");
		$vSql = "CALL ClasificacionesInsert('$idItem', '$idUsuario', '$valor', '$mensaje')";
		mysqli_query($link, $vSql) or die (error(mysqli_error($link)));
		mysqli_close($link);
		
		correcto("Item calificado correctamente");
	}
	
?>