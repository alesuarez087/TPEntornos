
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

		<div class="collapse navbar-collapse" id="navbarsExample09">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item dropdown">
					<a class="nav-link" href="#" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Productos</a>
            		<div class="dropdown-menu" aria-labelledby="dropdown09">
						<a class="dropdown-item" href="itemTop.jsp">Top de Ventas<span class="sr-only">(current)</span></a>
						<a class="dropdown-item" href="itemForGenero.jsp">Géneros</a>
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
					<li class="nav-item"><a class="nav-link" href="../code/login.php">Cerrar Sesión</a></li>
					<?php  } else { ?>
					<li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#dialogo">Iniciar Sesión</a></li>
					<?php } ?>
				</ul>
			</div>
	</nav>
	
	<br />