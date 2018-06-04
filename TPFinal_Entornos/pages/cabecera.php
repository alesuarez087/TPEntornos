
	<div style="text-align:center">
		<div>
			<a href="../pages/index.php"><img src="../styles/img/top700.png" /></a>
		</div>
	</div>
	
	<br />
	
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cabecera" aria-controls="cabecera" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="cabecera">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Productos</a>
            		<div class="dropdown-menu" aria-labelledby="dropdown01">
						<a class="dropdown-item" href="index.php">Top de Ventas</a>
						<a class="dropdown-item" href="itemGeneros.php">G�neros</a>
        		    </div>
				</li>
	<?php 	if(isset($tipoUsuario)){	
				if ($tipoUsuario == 3){ ?>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Compras</a>
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
					<a class="dropdown-item" href="artistas.php">Artistas</a>
					<a class="dropdown-item" href="generos.php">G�neros</a>
					<a class="dropdown-item"href="item.php">Productos</a>
					<a class="dropdown-item" href="usuarios.php">Usuarios</a>
				<?php } ?>																		 
					<a class="dropdown-item" href="remarcar.php">Remarcar</a>
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
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo ("Hola ".$nombreUsuario); ?></a>
    					<div class="dropdown-menu" aria-labelledby="dropdown04">
							<a class="dropdown-item" href="adminArtista.jsp">Configuraci�n</a>
							<a class="dropdown-item" href="../code/login.php">Cerrar Sesi�n</a>
				    	</div>
				     </li>
					<?php  } else { ?>
					<li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#dialogo">Iniciar Sesi�n</a></li>
					<?php } ?>
				</ul>
			</div>
	</nav>
	
	<br />