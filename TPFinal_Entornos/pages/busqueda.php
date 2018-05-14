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
	<?php  
		function error(){
			echo "<script type=\"text/javascript\">location.href='../pages/error.html';</script>";
		}
		if(isset($_POST['buscar'])){
			$vBuscar = '%'.$_POST['buscar'].'%'; 
	?>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand">Luzbelito</a>
			<ul class="nav navbar-nav">
				<li class="active"><a href="index.php">Discos</a></li>
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
					<li><a href="#">Géneros</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<h2 class="page-header">Resultados de la búsqueda</h2>
		
		<!-- CARGAS DE RESULTADOS  --->
		<?php 
			include("../code/conexion.inc");
#			$vSql = "select * from items where titulo like '%".$vBuscar."%'";
			$vSql = "CALL ItemsBusqueda('$vBuscar')";
			$vResultado = mysqli_query($link, $vSql) or die (error());
			if(mysqli_num_rows($vResultado) == 0){
		?>
				<h3>No se encontraron resultados</h3>
		<?php
			} else{
		?>
				<div class="row placeholders">
		<?php
					while($vItem = mysqli_fetch_array($vResultado)){					
		?>	
					<div class="col-xs-6 col-sm-3 placeholder">
				<img src="<?php echo($vItem['url_portada']); ?>" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
				<h4><?php echo($vItem['titulo']);?></h4>
				<span class="text-muted"><?php echo($vItem['nombre_artista']);  ?></span>
				<h4>
					$<?php echo($vItem['monto']);?></h4>
				<form action="srvCompra" method="post" id="compra" name="compra">
					<input type="hidden" name="idSelect" id="idSelect" value="<?php echo $vItem['id_item']; ?>" /> 
					<input class="btn btn-success btn-sm" type="submit" value="Agregar"	id="eventSale" name="eventSale" />
				</form>
			</div>
		<?php	
					}
		?>
				</div>
		<?php
			}
		?>

	</div>
</body>
<?php } else error(); ?>
</html>