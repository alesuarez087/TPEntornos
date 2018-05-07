<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Guardar Item</title>
</head>
<body>
<?php
 	
	if($_POST['event'] == 'Cancelar'){
		setcookie("id_item", '', time()-3600, "/");
		header("location:../pages/item.php");	
	}
	if($_POST['event'] == 'Eliminar'){
		$vID = $_POST['idItem'];
	
		echo($vID);
		include("../code/conexion.inc");
		$vSql = "CALL ItemsDelete('$vID')";	
		mysqli_query($link, $vSql) or die (mysqli_error($link));
		mysqli_close($link);
		setcookie("id_item", '', time()-3600, "/");
		header("location:../pages/item.php");	
	}	
	
	if($_POST['event'] == 'Modificar'){
		$vID = $_POST['idItem'];
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
#				echo $vTitulo;
#				echo $vID;
		include("../code/conexion.inc");
		$vSql = "CALL ItemsUpdate('$vAnioLanzamiento', '$vHabilitado', '$vIdArtista', '$vIdGenero', '$vStock', '$vTitulo', '$vIdTipoDisco', '$vID', '$vImagen')";	
		mysqli_query($link, $vSql) or die (mysqli_error($link));
		mysqli_close($link);
		unset($link);
			
		include("../code/conexion.inc");
		$vSql = "CALL ItemsGetOne('$vID')";	
		$vResultado = mysqli_query($link, $vSql) or die (mysqli_error($link));
		$fila = mysqli_fetch_row($vResultado);
		mysqli_close($link);
		unset($link);
		if($fila[9] != $vPrecioItem){
			include("../code/conexion.inc");
			$vSql = "CALL PrecioInsert('$vID','$vPrecioItem')";																#INSTERTO EL VALOR DEL ITEM
			mysqli_query($link, $vSql) or die (mysqli_error($link));
				
			// Cerrar la conexion
			mysqli_close($link);		
			unset($link);
		}
		setcookie("id_item", '', time()-3600, "/");
		header("location:../pages/item.php");
	}
	
	if($_POST['event'] == 'Guardar'){
		$vIdArtista = $_POST['cmbArtista']; 

		include("../code/conexion.inc"); //Arma la instrucción SQL y luego la ejecuta
		$vSql = "CALL ItemsGetAllForArtista('$vIdArtista')";
		$vResultado = mysqli_query($link, $vSql) or die (mysqli_error($link));
		$validar = TRUE;
		while($fila = mysqli_fetch_array($vResultado)){		
			if($fila['titulo']==$vTitulo) $validar = FALSE;
		}
		unset($vResultado, $link);
		
		if(!$validar){
			echo "ERROR EN LA RECUPERACION DE DATOS DE ARTISTAS DISCOS"; 						#MANEJAR MEJOR LA SALIDA DEL ERROR
		} else {
			$vTitulo = $_POST['tituloItem'];
			$vIdGenero = $_POST['cmbGenero'];
			$vIdTipoDisco = $_POST['cmbTipoDisco'];
			$vAnioLanzamiento = $_POST['anioLanzamiento'];
			$vPrecioItem = $_POST['precioItem'];
			$vStock = $_POST['stock'];
			$vImagen = $_POST['urlPortada'];
			if(isset($_POST['habilitado'])) $vHabilitado = TRUE;
			else $vHabilitado = FALSE;
			include("../code/conexion.inc");
			$vSql = "CALL ItemsInsert('$vAnioLanzamiento', '$vHabilitado', '$vIdArtista', '$vIdGenero', '$vStock', '$vTitulo', '$vIdTipoDisco', '$vImagen')";	
			mysqli_query($link, $vSql) or die (mysqli_error($link));
			unset($link);
				
			include("../code/conexion.inc");
			$vID= mysqli_fetch_array(mysqli_query($link, "SELECT MAX(id_item) as id_item FROM items"));						 #OBTENGO EL ID DEL ULTIMO ITEM INSERTADO
			unset($link);
		
			$id = $vID['id_item'];
			include("../code/conexion.inc");
			$vSql = "CALL PrecioInsert('$id','$vPrecioItem')";																#INSTERTO EL VALOR DEL ITEM
			mysqli_query($link, $vSql) or die (mysqli_error($link));	
			mysqli_close($link);
				
#					echo("window.confirm('Item agregado correctamente')");	
		}
		setcookie("id_item", '', time()-3600, "/");
		header("location:../pages/item.php");
	}
		
#		header("location:../pages/item.php");	
#		setcookie("id_item", '', time()-3600, "/");

	?>
</body>
</html>