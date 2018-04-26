<!-- CABECERA -->
<div class="row align-items-center">
	<div class="col-lg-10" style="background-color:white">
		<a href="../index.php"><img src="../Image/100.png" /></a>
	</div>
	<div class="col-lg-2 align-justify">
    	<button type="submit" class="btn btn-primary" onclick="../Home/login.php">Login</button>
	</div>
</div>
        
<br />

<!-- BARRA -->
<nav class="navbar navbar-expand-lg bg-primary justify-content-around" style="height:45px">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#opciones">
		<span class="navbar-toggler-icon"></span>
	</button>
	<a class="nav-link text-white" href="../index.php">Home</a>
	<a class="nav-link text-white" href="../Pages/Institucional/institucion.php">Institución</a>
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
	<a class="nav-link text-white" href="../Autogestion.php"></a>
</nav>


<!-- MODAL LOGIN -->
<div class="modal fade" id="login">
	<div class="modal-dialog modal-md modal-dialog-centered">
		<div class="modal-content">
			<!-- cabecera del diálogo -->
          <div class="modal-header">
            <h4 class="modal-title">Título del diálogo</h4>
            <button type="button" class="close" data-dismiss="modal">X</button>
          </div>
    
          <!-- cuerpo del diálogo -->
          <div class="modal-body">
            Contenido del diálogo.
          </div>
    
          <!-- pie del diálogo -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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