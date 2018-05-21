<?php 
	session_start(); 
	$tipoUsuario = NULL;
	$vNRO = NULL;
	if(isset($_SESSION['usuario'])){
		$fila = $_SESSION['usuario'];
		$tipoUsuario = $fila['TipoUsuario'];
		if(isset($_SESSION["carro"])) $vNRO=count($_SESSION["carro"]); else $vNRO=0;
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="stylesheet" href="../styles/css/bootstrap.css" crossorigin="anonymous">
<link href="../styles/css/dashboard.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Carrito de Compras</title>
</head>
<script type="text/javascript">
function valida(){
	if(confirmar.cmbProvincia.value == ''){alert('Ingrese Provincia'); return false;}
	else if(confirmar.localidad.value == ''){alert('Ingrese Localidad'); return false;}
	else if(confirmar.calle.value == ''){alert('Ingrese calle'); return false;}
	else if(confirmar.nroCalle.value == ''){alert('Ingrese n�mero de calle'); return false;}
	else if(confirmar.nroTarjeta.value == ''){alert('Ingrese n�mero de Tarjeta'); return false;}
	else if(confirmar.titTarjeta.value == ''){alert('Ingrese titular de Tarjeta'); return false;}

	else return true
}
</script>
<body>

	<?php include_once("../pages/cabecera.php"); ?>

	<div class="container">
		<h2 class="page-header">Carrito de Compras</h2>
		<?php if(isset($_SESSION["carro"]) && count($_SESSION["carro"]) != 0){  ?>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>T�tulo</th>
					<th>Autor</th>
					<th>A�o Lanzamiento</th>
					<th>G�nero</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Quitar del carro</th>
				</tr>
			</thead>
			<tbody>
			<?php  
				$carro = $_SESSION["carro"]; 
				$contador=0;
				$suma=0;
				foreach($carro as $item){
					$id = $item['Id']; 
					
					include("../code/conexion.inc");
					$vSql = "CALL ItemsGetOne('$id')"; 
					$vResultado = mysqli_query($link, $vSql) or die(error());
					while ($fila = mysqli_fetch_array($vResultado)){
						$suma=$suma+$item['Cantidad']*$fila['monto'];
			?>
				<tr>
					<td style="vertical-align: middle"><?php echo $fila['titulo']; ?></td>
					<td style="vertical-align: middle"><?php echo $fila['nombre_artista']; ?></td>
					<td style="vertical-align: middle"><?php echo $fila['anio_lanzamiento']; ?></td>
					<td style="vertical-align: middle"><?php echo $fila['desc_genero']; ?></td>
					<td style="vertical-align: middle"><?php echo $fila['monto']; ?></td>
					<td style="vertical-align: middle"><?php echo $item['Cantidad']; ?></td>
					<td style="vertical-align: middle">
						<form role="form" action="../code/itemVENTA.php" method="post" id="eliminar" name="eliminar">
							<input type="hidden" name="idSelected" id="idSelected" value="<?php echo $fila['id_item'] ?>" /> 
							<input class="btn btn-danger btn-sm" type="submit" value="Eliminar" id="event" name="event" />
						</form>
					</td>
				</tr>
				<?php } unset($link, $vResultado); } ?>
			</tbody>
		</table>

	
	

	<div style="background-color: #ccc">
		<div class="container">
			<h3>
				Total: <?php echo "$".$suma ?></h3>
		</div>
		<form role="form" action="../code/itemVENTA.php" method="post" id="confirmar" name="confirmar" onSubmit="return valida()">
			<table align="center">
				<tr>
					<td><b>Provincia</b></td>
					<td colspan=5>
						<select class="form-control" id="cmbProvincia" name="cmbProvincia">
							<option value="0"></option>
							<%
          	 			for(Provincia provincia : ctrl.getAllProvincia()){
		           			%>
							<?php 
								include("../code/conexion.inc");
								$vSql = "CALL ProvinciasGetAll"; 
								$vResultado = mysqli_query($link, $vSql) or die(error());
								while ($fila = mysqli_fetch_array($vResultado)){
							?>
							<option value="<?php echo $fila['id_provincia']; ?>">
								<?php echo $fila['desc_provincia']; ?>
							</option>
							<?php } unset($link, $vResultado); ?>
					</select>
					</td>
				</tr>
				<tr>
					<td><b>Localidad</b></td>
					<td colspan=5>
						<input type="text" class="form-control" id="localidad" name="localidad" size="43">
					</td>
				</tr>
				<tr>
					<td><b>Calle</b></td>
					<td colspan=5>
						<input type="text" class="form-control" id="calle" name="calle" size="43">
					</td>
				</tr>
				<tr>
					<td><b>N�mero</b></td>
					<td>
						<input type="text" class="form-control" id="nroCalle" name="nroCalle">
					</td>
					<td><b>Piso</b></td>
					<td>
						<input type="text" class="form-control" id="piso" name="piso">
					</td>
					<td><b>Departamento</b></td>
					<td>
						<input type="text" class="form-control" id="nroDpto" name="nroDpto">
					</td>
				</tr>
				<tr style="height: 30px;"></tr>
				<tr>
					<td><b>N�mero de Tarjeta</b></td>
					<td colspan=5>
						<input type="text" class="form-control" id="nroTarjeta" name="nroTarjeta" size="43" placeholder="XXXXXXXXXXXXXXXX">
					</td>
				</tr>
				<tr>
					<td><b>Titular Tarjeta</b></td>
					<td colspan=5>
						<input type="text" class="form-control" id="titTarjeta" name="titTarjeta">
					</td>
				</tr>
				<tr>
					<td>
						<input class="btn btn-success" type="submit" value="Confirmar" id="event" name="event" />
					</td>
				</tr>
			</table>
		</form>
		</div>
		<?php } else {
		?>
			<div style="text-align:center">		
			<img alt="Brand" src="../styles/img/img_001.png"> <br />
			<h2>Tu carrito est� vac�o </h2>
			</div>
		<?php }?>
	</div>

</body>
</html>
<?php 
	}  else header("Location: ../pages/login.php");
?>