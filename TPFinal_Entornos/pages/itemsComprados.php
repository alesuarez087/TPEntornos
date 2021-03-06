<?php 
	session_start(); 
	$tipoUsuario = NULL;
	$vNRO = NULL;
	if(isset($_SESSION['usuario'])){
		$fila = $_SESSION['usuario'];
		$tipoUsuario = $fila['TipoUsuario'];
		if($tipoUsuario == 3){
			$idUsuario = $fila['Id'];
			$nombreUsuario = $fila['Usuario'];
			if(isset($_SESSION["carro"])) $vNRO=count($_SESSION["carro"]); else $vNRO=0;
		
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Compras</title>

<link rel="stylesheet" href="../styles/css/bootstrap.css" crossorigin="anonymous">
<link href="../styles/css/dashboard.css" rel="stylesheet">
<link href="../styles/css/propio.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

</head>
<body>

	<?php include_once("../pages/cabecera.php"); ?>

	<div class="container">
		<h3 class="page-header">Calificar</h3>		
		<table class="table table-hover">
			<tr>
				<th>Titulo</th>
				<th>Artista</th>
				<th>Clasificacion</th>
				<th></th>
			</tr>
			<?php 
				include("../code/conexion.inc");
				$vSql = "CALL VentaItemGetAllForUser('$idUsuario')";
				$vResV = mysqli_query($link, $vSql) or die (error());
				unset($link);
				while ($filaIV = mysqli_fetch_array($vResV)){ 
					include("../code/conexion.inc");
					$idItem = $filaIV['id_item'];
					$vSql = "CALL ItemsGetOne('$idItem')";
					$vResI = mysqli_query($link, $vSql) or die (error());
					while ($filaI = mysqli_fetch_array($vResI)){ 
			?>
			<tr>
				<td><?php echo $filaI['titulo']; ?></td>
				<td><?php echo $filaI['nombre_artista']; ?></td>
				<td><?php echo round($filaI['prom']); ?></td>
				<form role="form" action="calificar.php" method="post" id="botonera" name="botonera">
					<td style="vertical-align: middle">
						<input type="hidden" name="idSelect" id="idSelect" value="<?php echo $filaI['id_item'] ?>" /> 
						<input class="btn btn-success btn-sm" type="submit" value="Calificar" id="eventSelect" name="eventSelect" />
					</td>
				</form>
			</tr>
			<?php } } ?>
		</table>
	</div>
	<?php include("pie.php"); ?>
</body>
</html>
<?php
	} else header("location:../pages/index.php"); 
	} else header("location:../pages/login.php");	
?>