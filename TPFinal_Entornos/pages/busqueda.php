<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Discos</title>
<link href="../styles/css/bootstrap.min.css" rel="stylesheet">
<link href="../styles/css/dashboard.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
</head>
<body>	
	<?php $vBuscar = $_POST['buscar']; ?>

	<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand">Luzbelito</a>
			<ul class="nav navbar-nav">
				<li class="active"><a href="home.php">Discos</a></li>
				<?php 	if(isset($_COOKIE["usuario"])) { 
					if ($_COOKIE["tipo_usuario"]==1){ ?>
				<li><a href="adminInicio.jsp">Editar</a></li>
				<?php } else { ?>
				<li><a href="listCompras.jsp">Compras</a></li>
				<?php } }?>
			</ul>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<?php 
						if (isset($_COOKIE["usuario"])){
							if ($_COOKIE["tipo_usuario"]==3){ 
							  if (isset($_COOKIE["carrito"])) $vNRO=$_COOKIE["carrito"];
							  else $vNRO=0;
				?>
				<li><a href="carrito.jsp"> <img alt="Brand" src="../styles/img/carrito25.png"> Carrito de compras <span clase="badge">(<?php echo ($vNRO); ?>)</span></a></li>

				<?php 
							} 
				?>
				<li><a href="valid.jsp">Cerrar Sesión</a></li>
				<?php } else { ?>
				<li><a href="login.php">Iniciar Sesión</a></li>
				<?php } ?>
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
					<li class="active"><a href="../pages/home.php">Inicio<span class="sr-only">(current)</span></a></li>
					<li><a href="itemForGenero.jsp">Géneros</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		
		<!-- CARGAS DE RESULTADOS  --->
		<?php
			echo $vBuscar;
			include("../code/conexion.inc");
			$vSql = "CALL ItemsBusqueda('$vBuscar')";
			$vResultado = mysqli_query($link, $vSql) or die (mysqli_error($link));
			if($vResultado != NULL){ 
				while($fila = mysqli_fetch_array($vResultado)){
		?>
				<div class="row placeholders">
					<h3>Resultados de la busqueda</h3>
					<div class="col-xs-6 col-sm-3 placeholder">
						<img src="<?php echo $fila['url_portada']; ?>" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
						<h4><?php echo $fila['titulo'] ;?></h4>
						<span class="text-muted"><?php echo $fila['nombre_artista'];  ?></span>
						<h4>$<?php echo $fila['monto'];?></h4>
						<form action="srvCompra" method="post" id="compra" name="compra">
							<input type="hidden" name="idSelect" id="idSelect" value="<?php echo $fila['id_item']; ?>" /> 
							<input class="btn btn-success btn-sm" type="submit" value="Agregar"	id="eventSale" name="eventSale" />
						</form>
					</div>
				</div>
				
		<?php
				} 
			} else{
		?>	
			<h3>No se encontraron resultados</h3>
		<?php	
			}
		?>

	</div>
</body>
</html>