<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Editar</title>
</head>
<body>

<?php 

	if(isset($_POST['idSelect'])){
		setcookie("modificar", "", time()-3600, "/"); 
		setcookie("eliminar", "", time()-3600, "/"); 
		include("../code/conexion.inc");
		$fila = "NO ME ANDA";
		$vID = $_POST['idSelect']; //Captura datos desde el Form anterior
		$vSql = "CALL ItemsGetOne('$vID')"; //Arma la instrucción SQL y luego la ejecuta

		$vResultado = mysqli_query($link, $vSql) or die (mysqli_error());
		$fila = mysqli_fetch_row($vResultado);
	
		$vHab = FALSE;
		setcookie("id_item", $fila[0], time()+3600, "/");
		setcookie("titulo", $fila[1], time()+3600, "/");
		setcookie("anio", $fila[2], time()+3600, "/");
		setcookie("stock", $fila[3], time()+3600, "/");
		if($fila[4]==1) $vHab = TRUE; 
		setcookie("habilitado", $vHab, time()+3600, "/");
		setcookie("id_artista", $fila[5], time()+3600, "/");
		setcookie("id_genero", $fila[6], time()+3600, "/");
		setcookie("id_tipo_item", $fila[7], time()+3600, "/");
		setcookie("url", $fila[8], time()+3600, "/");
		setcookie("precio", $fila[10], time()+3600, "/");
																			
		if($_POST['event'] != 'Eliminar') setcookie("modificar", "Modificar", time()+3600, "/");
		else setcookie("eliminar", "Eliminar", time()+3600, "/"); 
		
	}
	
	if($_POST['event'] == 'Buscar'){
		setcookie("busqueda", '%'.$_POST['buscar'].'%', time()+3600, "/");
	}
	header("location:../pages/item.php");

?>

</body>
</html>
