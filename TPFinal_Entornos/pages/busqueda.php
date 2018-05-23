<?php
	if(isset($_POST['buscar'])){
		$vBuscar = '%'.$_POST['buscar'].'%'; 
		session_start(); 
		$tipoUsuario = NULL;
		$vNRO = NULL;
		if(isset($_SESSION['usuario'])){
		$fila = $_SESSION['usuario'];
		$nombreUsuario = $fila['Usuario'];
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
		<div>
			<a href="../pages/index.php"><img src="../styles/img/top700.png" /></a>
		</div>
	</div>
	
	<br />
	
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item dropdown">
					<a class="nav-link" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Productos</a>
            		<div class="dropdown-menu" aria-labelledby="dropdown01">
						<a class="dropdown-item" href="itemTop.jsp">Top de Ventas</a>
						<a class="dropdown-item" href="itemForGenero.jsp">Géneros</a>
        		    </div>
				</li>
	<?php 	if(isset($tipoUsuario)){	
				if ($tipoUsuario == 3){ ?>
					<li class="nav-item dropdown">
						<a class="nav-link" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Compras</a>
            			<div class="dropdown-menu" aria-labelledby="dropdown02">
							<a class="dropdown-item" href="resumenCompras.php">Listado de Compras</a>
							<a class="dropdown-item" href="itemsComprados.php">Clasificar</a>
    	    		    </div>
					</li>
					<li class="nav-item"><a class="nav-link" href="carrito.php"> <img alt="Brand" src="../styles/img/carrito25.png"> Carrito de compras <span clase="badge">(<?php  echo ($vNRO); ?>)</span></a></li>
			<?php } ?>
	<?php if ($tipoUsuario != 3){ ?>
        <li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Editar</a>
    		<div class="dropdown-menu" aria-labelledby="dropdown03">
				<?php if($tipoUsuario == 1) { ?>
					<a class="dropdown-item" href="adminArtista.jsp">Artistas</a>
					<a class="dropdown-item" href="adminGenero.jsp">Géneros</a>
					<a class="dropdown-item"href="item.php">Productos</a>
					<a class="dropdown-item" href="adminUsuario.jsp">Usuarios</a>
				<?php } ?>																		 
					<a class="dropdown-item" href="adminStockPrecio.jsp">Remarcar</a>
	    	</div>
	     </li>
			<?php } 
				} ?>
    		    </ul>
	    	    <form action="../pages/busqueda.php" method="post" class="form-inline my-2 my-md-0" >
					<input type="text" class="form-control" id="buscar" name="buscar" placeholder="Que estás buscando?">
				</form>
				<ul class="navbar-nav my-2 my-md-0">
					<?php if (isset($tipoUsuario)){ ?>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo ("Hola ".$nombreUsuario); ?></a>
    					<div class="dropdown-menu" aria-labelledby="dropdown04">
							<a class="dropdown-item" href="adminArtista.jsp">Configuración</a>
							<a class="dropdown-item" href="../code/login.php">Cerrar Sesión</a>
				    	</div>
				     </li>
					<?php  } else { ?>
					<li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#dialogo">Iniciar Sesión</a></li>
					<?php } ?>
				</ul>
			</div>
	</nav>
	
	<br />
		<div class="col-sm-4 col-md-4">
			<h2 class="page-header">Resultados de la búsqueda</h2>
		</div>
		
		<!-- CARGAS DE RESULTADOS  --->
		<?php 
			include("../code/conexion.inc");
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
				<form action="elegido.php" method="post" id="compra" name="compra">
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
<div class="modal fade" id="dialogo">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Ingresar</h4>
				<button type="button" class="close" data-dismiss="modal">X</button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">   
                    <form role="form" action="../code/login.php" method="post" id="login" name="login">
						<div class="form-group">
							<label for="userregister">Usuario:</label> 
							<input type="text" class="form-control" id="userLogin" name="userLogin" >
						</div>
						<div class="form-group">
							<label for="password">Contraseña:</label>
							<input type="password" class="form-control" id="passLogin" name="passLogin">
						</div>
						<div class="form-group">
							<input class="btn btn-success btn-block" type="submit" value="Ingresar" id="event" name="event" />
							<input type="submit" class="btn btn-link" value="No poseo cuenta" id="event" name="event" />
 						</div>
					</form>                  
				</div>            
			</div>
		</div>
	</div>		
</div> 

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  

</body>
</html>
<?php } else header("Location:../pages/error()"); ?>