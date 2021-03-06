<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gestion interna</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

	<div class="container">
        <!-- CABECERA -->
        <div class="row align-items-center">
            <div class="col-lg-10" style="background-color:white">
                <a href="Home.php"><img src="../Image/100.png" /></a>
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
            <a class="nav-link text-white" href="Home.php">Home</a>
            <a class="nav-link text-white" href="Institucion.php">Institución</a>
            <a class="nav-link text-white" href="#">Asociate</a>
            <div class="nav-item dropdown text-white">
                <a class="nav-link dropdown-toggle text-white" data-toggle="dropdown" href="#">Deportes</a>
                <div class="dropdown-menu bg-primary">
                    <a class="dropdown-item text-white" href="#">Basquet</a>
                    <a class="dropdown-item text-white" href="#">Futsal</a>
                    <a class="dropdown-item text-white" href="#">Voley</a>
                </div>
            </div>
            <a class="nav-link text-white" href="#">Fotos</a>
        </nav>

        <br />
        
        <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar flex-column bg-primary">
            <li><a class="nav-link text-white" href="#">Socios</a></li>
            <li><a class="nav-link text-white" href="#">Empleados</a></li>
            <li><a class="nav-link text-white" href="#">Actividades</a></li>
            <li><a class="nav-link text-white" href="#">Cuotas</a></li>
            <li><a class="nav-link text-white" href="#">Noticias</a></li>
            <li><a class="nav-link text-white" href="#">Publicidades</a></li>
          </ul>
        </div>
        
        
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <nav class="navbar navbar-expand-lg bg-primary justify-content-around" style="height:45px">
				<a class="nav-link text-white" href="#" active>Alta</a>
            	<a class="nav-link text-white" href="#">Baja</a>
	            <a class="nav-link text-white" href="#">Modificacion</a>
          </nav>
          <br />
			<?php include('Socios/Alta.php'); ?>
        </div>
      </div>
        
        
    </div>


</body>
</html>