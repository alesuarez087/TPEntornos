<html>
<head>
<title>Subir Item</title>
</head>
<body>
<?php

	#VERAN QUE CIERRO LA CONEXION 2015464654132134 DE VECES Y MISMAS VECES LA ABRO, ES LA UNICA SOLUICION QUE ENCONTRE PARA PODER EJECUTAR TODAS LAS SENTENCIAS 
	if($_POST['event'] == 'Guardar'){
		//Captura datos desde el Form anterior
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
		$vSql = "CALL ItemsGetAllForArtista('$vIdArtista')";
		$vResultado = mysqli_query($link, $vSql); 
		$validar = TRUE;
		while($fila = mysqli_fetch_array($vResultado)){		
			if($fila['titulo']==$vTitulo) $validar = FALSE;
		}
		unset($vResultado, $link);
		
		include("../code/conexion.inc");
		if(!$validar){
				echo "ERROR EN LA RECUPERACION DE DATOS DE ARTISTAS DISCOS"; 						#MANEJAR MEJOR LA SALIDA DEL ERROR
		} else {
			$vSql = "CALL ItemsInsert('$vAnioLanzamiento', '$vHabilitado', '$vIdArtista', '$vIdGenero', '$vStock', '$vTitulo', '$vIdTipoDisco', '$vImagen')";	
			mysqli_query($link, $vSql) or die (mysqli_error($link));
			unset($link);
	
			include("../code/conexion.inc");
			$vID= mysqli_fetch_array(mysqli_query($link, "SELECT MAX(id_item) as id_item FROM items"));						 #OBTENGO EL ID DEL ULTIMO ITEM INSERTADO
			unset($link);
			
			include("../code/conexion.inc");
			$id = $vID['id_item'];
			$vSql = "CALL PrecioInsert('$id','$vPrecioItem')";																#INSTERTO EL VALOR DEL ITEM
			mysqli_query($link, $vSql) or die (mysqli_error($link));

			echo ("<script>alert('Item agregado correctamente')</script>");
			header("location:../pages/item.php");
			// Liberar conjunto de resultados
			}

			// Cerrar la conexion
			mysqli_close($link);
	} else if($_POST['event'] == 'Cancelar'){
		header("location:../pages/item.php");
	}
	
	?>
</body>
</html>