<html>
<head>
<title>Modificacion</title>
</head>
<body>
	<?php
		include ("conexion.inc");

		//Captura datos desde el Form anterior
		$vID = $_POST['id'];
		//Arma la instrucci�n SQL y luego la ejecuta
		
		
		$vSql = "SELECT *, count(id_ciudad) as contador FROM ciudades where id_ciudad = '$vID'";
		$vResultado = mysqli_query($link, $vSql) or die (mysqli_error($link));
		$vCantCiudades = mysqli_fetch_assoc($vResultado);
		$fila = mysqli_fetch_array($vResultado);
		if ($vCantCiudades['contador'] == 0) {
			echo ("Ciudad Inexistente...!!! <br>");
			echo ("<a href='FormModiIni.html'>Continuar</a>");
		}
		else{ 
	?>
				<FORM action="Modi.php" method="POST" name="FormModi">
					<table width="356">
						<tr>
							<td width="103"> ID: </td>
							<td width="243"> 
								<input type="text" name="id" readonly="true" value="<?php echo($vCantCiudades['id_ciudad']); ?>">
							</td>
						</tr>
						<tr>
							<td width="103"> Nombre: </td>
							<td width="243"> 
								<input type="text" name="nombre" value="<?php echo($vCantCiudades['nombre']); ?>">
							</td>
						</tr>
						<tr>
							<td width="103"> Pa�s: </td>
							<td width="243"> 
								<input type="TEXT" name="pais" size="20" maxlength="20" value="<?php echo($vCantCiudades['pais']); ?>">
							</td>
						</tr>
						<tr>
							<td width="103"> Habitantes: </td>
							<td width="243"> 
								<input type="TEXT" name="habitantes" size="20" maxlength="20" value="<?php echo($vCantCiudades['habitantes']); ?>">
							</td>
						</tr>
						<tr>
							<td width="103"> Superficie (en m�) </td>
							<td width="243"> 
								<input type="TEXT" name="superficie" size="20" maxlength="40" value="<?php echo($vCantCiudades['superficie']); ?>">
							</td>
						</tr>
						<tr>
							<td width="103"> Metro </td>
							<td width="243"> 
								<input type="TEXT" name="metro" size="20" maxlength="40" value="<?php echo($vCantCiudades['metro']); ?>">
							</td>
						</tr>
						<tr>
							<td colspan="2" align="center"> 
								<input type="SUBMIT" name="Submit" value="Modificar">
							</td>
						</tr>
					</table>
				</FORM>
	<?php
			}
			// Liberar conjunto de resultados
			mysqli_free_result($vResultado);
			// Cerrar la conexion
			mysqli_close($link);
	?>
</body>
</html>