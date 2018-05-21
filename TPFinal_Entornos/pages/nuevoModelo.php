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
	<div class="container" style="text-align:center">
		<!-- CABECERA -->
		<div>
			<a href="../index.php"><img src="../styles/img/top700.png" /></a>
		</div>
	<br />
</div>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
	        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
    		    <span class="navbar-toggler-icon"></span>
	        </button>

    	    <div class="collapse navbar-collapse" id="navbarsExample09">
        		<ul class="navbar-nav mr-auto">
		            <li class="nav-item active">
						
		            </li>
					<li class="nav-item dropdown">
						<a class="nav-link" href="#" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Discos</a>
            			<div class="dropdown-menu" aria-labelledby="dropdown09">
							<a class="dropdown-item" href="itemTop.jsp">Top de Ventas<span class="sr-only">(current)</span></a>
							<a class="dropdown-item" href="itemForGenero.jsp">G�neros</a>
        		      	</div>
		            </li>
					<?php 	if(isset($tipoUsuario)){	
								if ($tipoUsuario == 3){ ?>
									<li class="nav-item"><a class="nav-link" href="listCompras.jsp">Compras</a></li>
									<li class="nav-item"><a class="nav-link" href="carrito.php"> <img alt="Brand" src="../styles/img/carrito25.png"> Carrito de compras <span clase="badge">(<?php  echo ($vNRO); ?>)</span></a></li>
								<?php } ?>
			        		    <?php if ($tipoUsuario != 3){ ?>
        						    <li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="adminInicio.jsp" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Editar</a>
            							<div class="dropdown-menu" aria-labelledby="dropdown09">
										<?php if($tipoUsuario == 1) { ?>
											<a class="dropdown-item" href="adminArtista.jsp">Artistas</a>
											<a class="dropdown-item" href="adminGenero.jsp">G�neros</a>
											<a class="dropdown-item"href="adminItem.jsp">Discos</a>
											<a class="dropdown-item" href="adminUsuario.jsp">Usuarios</a>
										<?php } ?>																		 
											<a class="dropdown-item" href="adminStockPrecio.jsp">Remarcar</a>
        								</div>
					        	    </li>
								<?php } 
				} ?>
    		    </ul>
	    	    <form action="../pages/busqueda.php" method="post" class="form-inline my-2 my-md-0" >
					<input type="text" class="form-control" id="buscar" name="buscar" placeholder="Que est�s buscando?">
				</form>
				<ul class="navbar-nav my-2 my-md-0">
					<?php if (isset($tipoUsuario)){ ?>
					<li class="nav-item"><a class="nav-link" href="../code/login.php">Cerrar Sesi�n</a></li>
					<?php  } else { ?>
					<li class="nav-item"><a class="nav-link" href="../pages/login.php">Iniciar Sesi�n</a></li>
					<?php } ?>
				</ul>
			</div>
		</nav>
<br />

	<h2 class="text-capitalize">Novedades</h2>
	<div class="row">
	<?php 
				include("../code/conexion.inc");
				$vSql = 'CALL ItemsNovedades';
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
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
</body>
</body>
</html>