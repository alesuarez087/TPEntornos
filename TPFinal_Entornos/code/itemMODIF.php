<html>
<head>
<title>Modificar Item</title>
</head>
<body>
<?php

	#VERAN QUE CIERRO LA CONEXION 2015464654132134 DE VECES Y MISMAS VECES LA ABRO, ES LA UNICA SOLUICION QUE ENCONTRE PARA PODER EJECUTAR TODAS LAS SENTENCIAS 
	
	//Captura datos desde el Form anterior
	$vID = $_POST['idItem'];
	$vOpcion = $_POST['submit'];
	
	if($_POST['event'] == 'Guardar'){
		$vTitulo = $_POST['tituloItem'];
		$vIdArtista = $_POST['cmbArtista']; 
		$vIdGenero = $_POST['cmbGenero'];
		$vIdTipoDisco = $_POST['cmbTipoDisco'];
		$vAnioLanzamiento = $_POST['anioLanzamiento'];
		$vPrecioItem = $_POST['precioItem'];
		$vStock = $_POST['stock'];
		$vImagen = $_POST['urlPortada'];
		if(isset($_POST['habilitado'])) $vHabilitado = TRUE;
		else $vHabilitado = FALSE;

		//Arma la instrucción SQL y luego la ejecuta
		include("../code/conexion.inc");
		$vSql = "CALL ItemsUpdate('$vAnioLanzamiento', '$vHabilitado', '$vIdArtista', '$vIdGenero', '$vStock', '$vTitulo', '$vIdTipoDisco', '$vID', '$vImagen')";	
		mysqli_query($link, $vSql) or die (mysqli_error($link));
		mysqli_close($link);
	
		include("../code/conexion.inc");
		$vSql = "CALL PrecioInsert('$vID','$vPrecioItem')";																#INSTERTO EL VALOR DEL ITEM
		mysqli_query($link, $vSql) or die (mysqli_error($link));

		// Cerrar la conexion
		mysqli_close($link);
	
		echo ("<script>alert('Item agregado correctamente')</script>");
		header("location:../pages/item.php");


	} else if($_POST['event'] == 'Cancelar'){
		header("location:../pages/item.php");
		}
	?>
</body>
</html>