<style>
		.footer {

		  bottom: 0;
		  width: 100%;

		  line-height: 60px; /* Vertically center the text there */
		  background-color: #f5f5f5;
		}
	</style>
	<br /><br />
	
	<?php if(!isset($tipoUsuario)) $tipoUsuario = 0; ?>
	
	<div class="footer">
		<div class="row">
			<div class="col-md-4" style="margin-left:20px;">
			<a href="../pages/index.php">Home</a><br />
			<a href="../pages/contacto.php">Contacto</a><br />
			<?php if(!isset($_SESSION["usuario"])){ ?>
			<a href="../pages/login.php">Login</a><br />
			<?php } else { ?> 
			<a href="../pages/editarDatos.php">Configuracion de usuario</a><br />
			<?php } ?>
			</div>
			<div class="col-md-4">
			<?php if ($tipoUsuario==1) { ?>
			<a href="../pages/artistas.php">Artistas</a><br />
			<a href="../pages/generos.php">Generos</a><br />
			<a href="../pages/item.php">Productos</a><br />
			<a href="../pages/usuarios.php">Usuarios</a><br />
			<?php } if ($tipoUsuario==1 || $tipoUsuario==2) { ?>
			<a href="../pages/remarcar.php">Remarcar Precios y/o Stock</a><br />
			<?php } if ($tipoUsuario==3) { ?>
			<a href="../pages/carrito.php">Carrito de Compras</a><br />
			<a href="../pages/itemsComprados.php">Listados de Compras</a><br />
			<a href="../pages/resumenCompras.php">Resumen de Compras</a><br />
			<?php }?>
			</div>
		</div>
	</div>