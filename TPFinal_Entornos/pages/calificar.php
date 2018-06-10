<?php 
	session_start(); 
	$tipoUsuario = NULL;
	$vNRO = NULL;
	if(isset($_SESSION['usuario'])){
		$fila = $_SESSION['usuario'];
		$tipoUsuario = $fila['TipoUsuario'];
		if($tipoUsuario != 3) header("location:../pages/index.php");
		else{
			$nombreUsuario = $fila['Usuario'];
			$idUsuario = $fila['Id'];
			if(isset($_SESSION["carro"])) $vNRO=count($_SESSION["carro"]); else $vNRO=0;
			if(isset($_POST['idSelect'])) $idItem = $_POST['idSelect'];
			else header("location:../pages/error.html");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Calificar</title>
<link rel="stylesheet" href="../styles/css/bootstrap.css" crossorigin="anonymous">
<link href="../styles/css/dashboard.css" rel="stylesheet">
<link href="../styles/css/propio.css" rel="stylesheet">
</head>

<body>
	<?php include_once("../pages/cabecera.php"); ?>
	
	<div class="col-sm-4 col-md-4">
		<h3 class="page-header">Clasificar</h3>
	</div>
	<div class="container">
		<div class="row placeholders">
			<div class="col-xs-7 col-sm-10 placeholder">
			<?php
				include ("conexion.inc");
				$vSql = "CALL ItemsGetOne('$idItem')";
				$vResultado = mysqli_query($link, $vSql);
				unset($link); 
				while($fila = mysqli_fetch_array($vResultado)){
			?>
				<form action="../code/clasificacion.php" method="post" id="califica" name="califica">
					<table>
						<tr>
							<td>
							<img src="<?php echo($fila['url_portada']); ?>" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
							</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td>
								<table>
									<tr style="vertical-align:text-bottom">
										<td colspan="2">
											<h2><?php echo($fila['titulo'])." - ".($fila['nombre_artista']);?></h3>
										</td>
									</tr>
									<tr>
										<h4>Lanzamiento:<?php echo $fila['anio_lanzamiento']; ?></h4>
									</tr>
									<tr style="vertical-align:text-bottom">
										<td colspan="2">
											<h2>Promedio: <?php if(!isset($fila['prom'])) echo "No fue calificado"; else $fila['prom'];?></h2>
										</td>
									</tr>
									<tr>
										<td>
											<p class="clasificacion">
												<input id="radio1" name="estrellas" disabled="disabled" value="5" type="radio" <?php if(round($fila['prom'])==5){ ?> checked <?php } ?>><label for="radio1">&#9733;</label> 
												<input id="radio2" name="estrellas" disabled="disabled" value="4" type="radio" <?php if(round($fila['prom'])==4){ ?> checked <?php } ?>><label for="radio2">&#9733;</label> 
												<input id="radio3" name="estrellas" disabled="disabled" value="3" type="radio" <?php if(round($fila['prom'])==3){ ?> checked <?php } ?>><label for="radio3">&#9733;</label>
												<input id="radio4" name="estrellas" disabled="disabled" value="2" type="radio" <?php if(round($fila['prom'])==2){ ?> checked <?php } ?>><label for="radio4">&#9733;</label> 
												<input id="radio5" name="estrellas" disabled="disabled" value="1" type="radio" <?php if(round($fila['prom'])==1){ ?> checked <?php } ?>><label for="radio5">&#9733;</label>
											</p>
										</td>
									</tr>
									<tr>
										<td colspan=3 style="text-align: center">
											<input type="text" class="form-control" id="messageAdd" name="messageAdd" <?php if(isset($fila['mensaje_adjunto'])) { ?> value="<?php echo $fila['mensaje_adjunto']; ?>" <?php } else { ?> placeholder="Comentario" <?php } ?>>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<br />
											<input type="hidden" name="idSelect" id="idSelect" value="<?php echo $fila['id_item'] ?>" /> 
											<input class="btn btn-success" type="submit" value="Calificar" id="event" name="event" /> 
											<input class="btn btn-default" type="submit" value="Cancelar" id="event" name="event" />
										</td>
									</tr>									
								</table>
							</td>		
						</tr>
						</table>
				</form>
				<?php } ?>
			</div>
		</div>
	</div>

	<div class="col-sm-4 col-md-4">
		<h3 class="page-header">Comentarios</h3>
		<?php
			include("conexion.inc");
			$vSql = "CALL ClasificacionesGetAll('$idItem')";
			$vRes = mysqli_query($link, $vSql);
			unset($link);
			if(mysqli_num_rows($vRes) != 0){
			while($fila = mysqli_fetch_array($vRes)){ if(isset($fila['mensaje_adjunto'])){
		?>
		<div class="col-md">        
          <div class="card">
            <div class="card-header">
            	<?php echo "Usuario: ".$fila['nombre_usuario']; ?></div>
            </div>
            <div class="card-body">
              <p class="card-text"><?php echo $fila['mensaje_adjunto']; ?> </p>
            </div>
          </div>          
      </div>
	  <br />
		<?php } } } else{ ?>
		<h4>Sin Comentarios</h4>
		<?php } ?>
	</div>

	<?php include("pie.php"); ?>
</body>
</html>
<?php } } else header("location:../pages/resumenCompras.php"); ?>