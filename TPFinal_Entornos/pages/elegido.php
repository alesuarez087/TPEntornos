<?php 
	session_start(); 
	$tipoUsuario = NULL;
	$vNRO = NULL;
	if(isset($_SESSION['usuario'])){
		$fila = $_SESSION['usuario'];
		$tipoUsuario = $fila['TipoUsuario'];
		if(isset($_SESSION["carro"])) $vNRO=count($_SESSION["carro"]); else $vNRO=0;
	}
	$idItem = $_POST['idSelect'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Disco</title>
<link href="../styles/css/bootstrap.min.css" rel="stylesheet">
<link href="../styles/css/dashboard.css" rel="stylesheet">
<link href="../styles/css/propio.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<script type="text/javascript">
	function validar(){
		indiceCantidad = document.compra.cmbCantidad.selectedIndex
		if(indiceCantidad == null || indiceCantidad == 0) {
			alert("Seleccione Cantidad"); return false;
		} else return true
	}
</script>
<body>


	<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand">Luzbelito</a>
			<ul class="nav navbar-nav">
				<li class="active"><a href="index.php">Discos</a></li>
				<li><a href="listCompras.jsp">Compras</a></li>
			</ul>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<?php 
					if (isset($tipoUsuario)){
						if ($tipoUsuario==3){ 
				?>
				<li><a href="carrito.jsp"> <img alt="Brand" src="../styles/img/carrito25.png"> Carrito de compras <span clase="badge">(<?php  echo ($vNRO); ?>)</span></a></li>

				<?php 
							} }
				?>
				<li><a href="../code/login.php">Cerrar Sesión</a></li>
			</ul>
			<form action="../pages/busqueda.php" method="post" class="navbar-form navbar-right" >
				<input type="text" class="form-control" id="buscar" name="buscar" placeholder="Que estás buscando?">
			</form>
		</div>
	</div>
	</nav>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 col-md-2 sidebar">
				<ul class="nav nav-sidebar">
					<li><a>Seleccione Búsqueda<span class="sr-only">(current)</span></a></li>
					<li><a href="index.php">Inicio</a></li>
					<li><a href="itemForGenero.jsp">Géneros</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<form role="form" action="../code/itemVENTA.php" method="post" id="compra" name="compra" onSubmit="return validar()">
			<h2 class="page-header">Disco</h2>
			<div class="row placeholders">
				<div class="placeholder">
					<table>
						<?php 
							include("../code/conexion.inc");
							$vSql = "CALL ItemsGetOne('$idItem')"; 
							$vResultado = mysqli_query($link, $vSql) or die(error());
							while ($fila = mysqli_fetch_array($vResultado)){
						?>
						
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
									<tr style="vertical-align:text-bottom">
										<td colspan="2">
											<h2>Promedio: <?php if(!isset($fila['prom'])) echo "No fue calificado"; else {?></h2>
											<p class="clasificacion">
									<input id="radio1" name="estrellas" disabled="disabled" value="5" type="radio" <?php if(round($fila['prom'])==5){ ?> checked <?php } ?>><label for="radio1">&#9733;</label> 
									<input id="radio2" name="estrellas" disabled="disabled" value="4" type="radio" <?php if(round($fila['prom'])==4){ ?> checked <?php } ?>><label for="radio2">&#9733;</label> 
									<input id="radio3" name="estrellas" disabled="disabled" value="3" type="radio" <?php if(round($fila['prom'])==3){ ?> checked <?php } ?>><label for="radio3">&#9733;</label>
									<input id="radio4" name="estrellas" disabled="disabled" value="2" type="radio" <?php if(round($fila['prom'])==2){ ?> checked <?php } ?>><label for="radio4">&#9733;</label> 
									<input id="radio5" name="estrellas" disabled="disabled" value="1" type="radio" <?php if(round($fila['prom'])==1){ ?> checked <?php } ?>><label for="radio5">&#9733;</label>
								</p> <?php } ?>
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
							<?php } ?>	
						</table>
					

				
			</div>
		</div>
		</form>
		
		
					<h3 class="page-subheader">Comentarios</h3>
			
				<?php
					unset($link, $vResultado);
					include("../code/conexion.inc");
					$vSql = "CALL ClasificacionesGetAll('$idItem')";
					$vResultado = mysqli_query($link, $vSql) or die (error());
					if(mysqli_num_rows($vResultado)!=0){
						while ($fila = mysqli_fetch_array($vResultado)){
							if($fila['mensaje_adjunto']!=NULL){
								unset($link);
								$idUser = $fila['id_usuario'];
								include("../code/conexion.inc");
								$vSql = "CALL UsuariosGetOneForId('$idUser')";
								$vRes = mysqli_query($link, $vSql) or die (error());
								$vUsuario = mysqli_fetch_row($vRes);
				?>
					
								<div class="panel panel-default">
									<div class="panel-heading">
										Usuario:<?php echo $vUsuario[7]; ?>
									</div>
									<div class="panel-body">
										<?php echo $fila['mensaje_adjunto']; ?>
									</div>
								</div>
				<?php
							} else
				?>
				<h4>Sin Comentarios</h4>
				<?php
						} 
					} else {  
				?>
							<h4>Sin Comentarios</h4>
				<?php 
					}
				?>
			</tr>
		</table>
	</div>
</body>
</html>