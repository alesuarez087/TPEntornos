<?php 
	session_start(); 
	$tipoUsuario = NULL;
	$vNRO = NULL;
	if(isset($_SESSION['usuario'])){
		$fila = $_SESSION['usuario'];
		$tipoUsuario = $fila['TipoUsuario'];
		if(isset($_SESSION["carro"])) $vNRO=count($_SESSION["carro"]); else $vNRO=0;
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Discos</title>
<link rel="stylesheet" href="../styles/css/bootstrap.css" crossorigin="anonymous">
<link href="../styles/css/dashboard.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
</head>
<?php  
		function error(){
			echo "<script type=\"text/javascript\">location.href='../pages/error.html';</script>";
		}
?>

<body>	
<?php include_once("cabecera.php"); ?>

	<h2 class="page-header">Novedades</h2>
	<div class="row placeholders">
			<?php 
				include("../code/conexion.inc");
				$vSql = 'CALL ItemsNovedades';
				$vResultado = mysqli_query($link, $vSql) or die (error());
				while ($vItem = mysqli_fetch_array($vResultado)){ 
			?>
          <div class="col-xs-6 col-sm-2 placeholder">
				<img src="<?php echo($vItem['url_portada']); ?>" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
				<h4><?php echo($vItem['titulo']);?></h4>
				<span class="text-muted"><?php echo($vItem['nombre_artista']);  ?></span>
				<h4>
					$<?php echo($vItem['monto']);?></h4>
				<form action="elegido.php" method="post" id="compra" name="compra">
					<input type="hidden" name="idSelect" id="idSelect" value="<?php echo $vItem['id_item']; ?>" /> 
					<input class="btn btn-success btn-sm" type="submit" value="Agregar"	id="eventSale" name="eventSale" />
				</form>
			</div>
		 <?php } ?>
	
	</div>
	<br />
	<h2 class="text-capitalize">Top Ventas</h2>
	<div class="row">
	<?php 
				include("../code/conexion.inc");
				$vSql = 'CALL ItemsGetTop8';
				$vResultado = mysqli_query($link, $vSql) or die (error());
				while ($fila = mysqli_fetch_array($vResultado)){ 
			?>
          <div class="col-lg-2" style="text-align:center">
            <img class="rounded-circle" src="<?php echo($fila['url_portada']); ?>" alt="Generic placeholder image" width="200" height="200">
            <h4><?php echo($fila['titulo']);?></h4>
			<h5 class="text-muted"><?php echo($fila['nombre_artista']);  ?></h5>
            <h4>$<?php echo($fila['monto']);?></h4>
            <form action="elegido.php" method="post" id="compra" name="compra">
					<input type="hidden" name="idSelect" id="idSelect" value="<?php echo $fila['id_item']; ?>" /> 
					<input class="btn btn-success btn-sm" type="submit" value="Agregar"	id="eventSale" name="eventSale" />
				</form>
          </div><!-- /.col-lg-4 --> 
		 <?php } ?>
	
	</div>
	<br />
	<h2 class="text-capitalize">Top Semanal</h2>
	<div class="row">
	<?php 
				include("../code/conexion.inc");
				$vSql = 'CALL ItemsGetTopSemana';
				$vResultado = mysqli_query($link, $vSql) or die (error());
				while ($fila = mysqli_fetch_array($vResultado)){ 
			?>
          <div class="col-lg-2" style="text-align:center">
            <img class="rounded-circle" src="<?php echo($fila['url_portada']); ?>" alt="Generic placeholder image" width="200" height="200">
            <h4><?php echo($fila['titulo']);?></h4>
			<h5 class="text-muted"><?php echo($fila['nombre_artista']);  ?></h5>
            <h4>$<?php echo($fila['monto']);?></h4>
            <form action="elegido.php" method="post" id="compra" name="compra">
					<input type="hidden" name="idSelect" id="idSelect" value="<?php echo $fila['id_item']; ?>" /> 
					<input class="btn btn-success btn-sm" type="submit" value="Agregar"	id="eventSale" name="eventSale" />
				</form>
          </div><!-- /.col-lg-4 --> 
		 <?php } ?>
	
	</div>
	<br />
	<h2 class="text-capitalize">Top Mensual</h2>
	<div class="row">
	<?php 
				include("../code/conexion.inc");
				$vSql = 'CALL ItemsGetTopMes';
				$vResultado = mysqli_query($link, $vSql) or die (error());
				while ($fila = mysqli_fetch_array($vResultado)){ 
			?>
          <div class="col-lg-2" style="text-align:center">
            <img class="rounded-circle" src="<?php echo($fila['url_portada']); ?>" alt="Generic placeholder image" width="200" height="200">
            <h4><?php echo($fila['titulo']);?></h4>
			<h5 class="text-muted"><?php echo($fila['nombre_artista']);  ?></h5>
            <h4>$<?php echo($fila['monto']);?></h4>
            <form action="elegido.php" method="post" id="compra" name="compra">
					<input type="hidden" name="idSelect" id="idSelect" value="<?php echo $fila['id_item']; ?>" /> 
					<input class="btn btn-success btn-sm" type="submit" value="Agregar"	id="eventSale" name="eventSale" />
				</form>
          </div><!-- /.col-lg-4 --> 
		 <?php } ?>
	
	</div>
		<br />
	<h2 class="text-capitalize">Mejores calificados</h2>
	<div class="row">
	<?php 
				include("../code/conexion.inc");
				$vSql = 'CALL ItemsGetMejorPromedio';
				$vResultado = mysqli_query($link, $vSql) or die (error());
				while ($fila = mysqli_fetch_array($vResultado)){ 
			?>
          <div class="col-lg-2" style="text-align:center">
            <img class="rounded-circle" src="<?php echo($fila['url_portada']); ?>" alt="Generic placeholder image" width="200" height="200">
            <h4><?php echo($fila['titulo']);?></h4>
			<h5 class="text-muted"><?php echo($fila['nombre_artista']);  ?></h5>
            <h4>$<?php echo($fila['monto']);?></h4>
            <form action="elegido.php" method="post" id="compra" name="compra">
					<input type="hidden" name="idSelect" id="idSelect" value="<?php echo $fila['id_item']; ?>" /> 
					<input class="btn btn-success btn-sm" type="submit" value="Agregar"	id="eventSale" name="eventSale" />
				</form>
          </div><!-- /.col-lg-4 --> 
		 <?php } ?>
	
	</div>
	
	<?php include_once("modal.php"); ?>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
</body>
</body>
</html>