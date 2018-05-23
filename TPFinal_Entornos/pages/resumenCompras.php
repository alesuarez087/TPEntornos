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
<link href="bootstrap/css/dashboard.css" rel="stylesheet">
<link href="bootstrap/css/propio.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Compras</title>
</head>
<body>


	<?php include_once("cabecera.php"); ?>
<h3>Compras</h3>
		<div class="container">
			
			<div class="row">
				<table class="table table-hover" style="text-align: left">
					<thead>
						<tr>
							<th>C�digo</th>
							<th>Discos</th>
							<th>Fecha</th>
							<th>Precio Final</th>
						</tr>
					</thead>
					<?php 
						include("../code/conexion.inc");
						$vSql = "CALL VentaItemGetAllForUser('$idUsuario')";
						$vResV = mysqli_query($link, $vSql) or die (error());
						unset($link);
						while ($filaV = mysqli_fetch_array($vResV)){ 
							$suma = 0; $idVenta = $filaV['id_venta'];
					?>
					<tbody>
						<tr>
							<td style="vertical-align: middle">
								<?php echo $filaV['id_venta']; ?>
							</td>
							<td style="vertical-align: middle">
								<?php
									include("../code/conexion.inc");
									$vSql = "CALL VentaItemGetAllForVenta('$idVenta')"; 
									$vResVI = mysqli_query($link, $vSql) or die(error());
									unset($link); 
									while ($filaVI = mysqli_fetch_array($vResVI)){
										$idItem = $filaVI['id_item'];
										include("../code/conexion.inc");
										$vSql = "CALL ItemsGetOne('$idItem')"; 
										$vResI = mysqli_query($link, $vSql) or die(error());
										while ($filaI = mysqli_fetch_array($vResI)){
											$suma=$suma+$filaVI['cantidad']*$filaI['monto'];
											echo $filaI['titulo']." ";
										} 
									} 
								?>
							</td>
							<td style="vertical-align: middle">
								<?php echo $filaV['fecha']; ?>
							</td>
							<td style="vertical-align: middle">
								<?php echo "$ ".$suma; ?>
							</td>
						</tr>
					</tbody>
					<?php } ?>
				</table>
			</div>
		</div>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
<?php
	} else header("location:../pages/index.php"); 
	} else header("location:../pages/login.php");
		
?>
</html>