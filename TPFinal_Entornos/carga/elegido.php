<?php 
	session_start(); 
	$tipoUsuario = NULL;
	$vNRO = NULL;
	if(isset($_SESSION['usuario'])){
		$fila = $_SESSION['usuario'];
		$tipoUsuario = $fila['TipoUsuario'];
		if($tipoUsuario != 3) header("location:index.php");
		else {
			$nombreUsuario = $fila['Usuario'];
			if(isset($_SESSION["carro"])) $vNRO=count($_SESSION["carro"]); else $vNRO=0;
			if(isset($_POST['idSelect'])) $idItem = $_POST['idSelect'];
			else if(isset($_COOKIE["elegido"])) $idItem = $_COOKIE["elegido"]; else header("location:error.html");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Disco</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"  type="text/css" />
<link href="dashboard.css" rel="stylesheet" type="text/css" />
<link href="propio.css" rel="stylesheet" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<script type="text/javascript">
	function validar(stock){
		
		indiceCantidad = document.compra.cmbCantidad.selectedIndex
		
		if(indiceCantidad == null || indiceCantidad == 0) {	
			alert("Seleccione Cantidad"); return false;
		} 
		else if(indiceCantidad>stock){alert("Supera el stock"); return false;}
		else return true;
	}
</script>
<?php
	function error($texto){
		echo "<script type=\"text/javascript\">alert('$texto');</script>";
		echo "<script type=\"text/javascript\">window.history.back();</script>";
	}
?>
</head>

<body>

	<?php 
							include("conexion.inc");
							$vSql = "CALL ItemsGetOne('$idItem')"; 
							$vResultado = mysqli_query($link, $vSql) or die(error(mysqli_error()));
							$fila = mysqli_fetch_array($vResultado)
						?>
	<?php include_once("cabecera.php") ?>

	<div class="col-sm-4 col-md-4">
		<h2 class="page-header">Disco</h2>
	</div>
	<div class="container">
		<form action="itemVENTA.php" method="post" id="compra" name="compra" onsubmit="return validar(<?php echo($fila['stock']) ?>)">
			<div class="row placeholders">
				<div class="placeholder">
					<table>
						
						
						<tr>
							<td>
							<img src="<?php echo($fila['url_portada']); ?>" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail" />
							</td>
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							<td>
								<table>
									<tr style="vertical-align:text-bottom">
										<td colspan="2">
											<h2><?php echo($fila['titulo'])." - ".($fila['nombre_artista']);?></h2>
										</td>
									</tr>
									<tr style="vertical-align:text-bottom">
										<td colspan="2">
											<h2>Promedio: <?php if(!isset($fila['prom'])) echo "No fue calificado"; else {?>
											<p class="clasificacion">
									<input id="radio1" name="estrellas" disabled="disabled" value="5" type="radio" <?php if(round($fila['prom'])==5){ ?> checked <?php } ?>><label for="radio1">&#9733;</label> 
									<input id="radio2" name="estrellas" disabled="disabled" value="4" type="radio" <?php if(round($fila['prom'])==4){ ?> checked <?php } ?>><label for="radio2">&#9733;</label> 
									<input id="radio3" name="estrellas" disabled="disabled" value="3" type="radio" <?php if(round($fila['prom'])==3){ ?> checked <?php } ?>><label for="radio3">&#9733;</label>
									<input id="radio4" name="estrellas" disabled="disabled" value="2" type="radio" <?php if(round($fila['prom'])==2){ ?> checked <?php } ?>><label for="radio4">&#9733;</label> 
									<input id="radio5" name="estrellas" disabled="disabled" value="1" type="radio" <?php if(round($fila['prom'])==1){ ?> checked <?php } ?>><label for="radio5">&#9733;</label>
								</p> <?php } ?></h2>
										</td>
									</tr>
									<tr style="vertical-align:text-bottom">
										<td>
											<h3>Cantidad</h3></td><td>
											<select class="form-control" id="cmbCantidad" name="cmbCantidad">
												<option value="0"></option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
											</select>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<input type="hidden" name="idSelect" id="idSelect" value="<?php echo($fila['id_item']); ?>" />
											<input type="hidden" name="stock" id="stock" value="<?php echo($fila['stock']); ?>" />
											<input class="btn btn-success btn-sm" type="submit" value="Agregar" id="event" name="event" />
										</td>
									</tr>									
								</table>
							</td>		
						</tr>
							<?php 
								if(isset($_COOKIE["elegido"])) setcookie("elegido", "", time()-3600, "/");
							?>	
						</table>
					

				
			</div>
		</div>
		</form>
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
	
	<?php include("pie.php"); ?>	
</body>
</html>

<?php } } else {
			setcookie("elegido", $_POST['idSelect'], time()+3600, "/");
			header("location:login.php");
		}
?>