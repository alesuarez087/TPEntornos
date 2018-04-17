<!-- CABECERA -->
<div class="row align-items-center">
	<div class="col-lg-10" style="background-color:white">
		<a href="index.php"><img src="../Image/100.png" /></a>
	</div>
	<div class="col-lg-2 align-justify">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#login">Login</button>
	</div>
</div>
        
<br />

<!-- BARRA -->
<nav class="navbar navbar-expand-lg bg-primary justify-content-around" style="height:45px">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#opciones">
		<span class="navbar-toggler-icon"></span>
	</button>
	<a class="nav-link text-white" href="index.php">Home</a>
	<a class="nav-link text-white" href="<?php AsignarPagina("insitucion") ?>">Institución</a>
	<a class="nav-link text-white" href="#">Asociate</a>
    <!-- ACA LAS ACTIVIDADES DE M,ETEM EN UN FOR CON LAS ACTIVIDADES -->
	<div class="nav-item dropdown text-white">
		<a class="nav-link dropdown-toggle text-white" data-toggle="dropdown" href="#" >Deportes</a>
		<div class="dropdown-menu bg-primary">
			<a class="dropdown-item text-white" href="#">Basquet</a>
			<a class="dropdown-item text-white" href="#">Futsal</a>
			<a class="dropdown-item text-white" href="#">Voley</a>
		</div>
	</div>
	<a class="nav-link text-white" href="#">Fotos</a>
	<a class="nav-link text-white" href="../Pages/Autogestion.php"></a>
</nav>


<!-- MODAL LOGIN -->
<div class="modal fade" id="login">
	<div class="modal-dialog modal-md modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="container-fluid">
					<form>
						<div class="form-group row">
                        <label for="usuario" class="col-md-5 col-form-label">Nombre de usuario:</label>
                        	<div class="col-md-7">
                            	<input type="text" class="form-control" id="usuario">
							</div>
						</div>
                        <div class="form-group row">
							<label for="clave" class="col-md-5 col-form-label">Ingrese clave:</label>
                            <div class="col-md-7">
                            	<input type="password" class="form-control" id="clave">
                            </div>
						</div>
                        <div class="form-group row  text-center">
                        	<div class="col-md-6">
                            	<a href="#" class="text-primary">¿Olvidaste la contraseña?</a>
                            </div>
                            <div class="col-md-6  text-center">
                                <a href="#" class="text-primary">Crear Usuario</a>
                            </div>
						</div>

						<div class="form-group row  text-center">
							<div class="col-lg-4 offset-lg-4" style="align-content:center">
                            	<button type="submit" class="btn btn-default">Entrar</button>
                            </div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<?php
function AsignarPagina($pagina)
{
    if($_COOKIE["pagina"] == "")
        echo "paginas/".$pagina.".php";
    else 
        echo $pagina.'.php';
}
?>