<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Club Atlético Libertad</title>
<link rel="stylesheet" href="../CSS/bootstrap.min.css" />
</head>
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
        
		<br />
        
        <!-- ACA VA CONTENIDO -->
        <?php include('noticias.php'); ?>
        
        <br />
        <!-- PIE DE WEB-->
        <div class="container h-25">
	        <footer class="footer- text-center">
                Club Atlético Libertad Asociación Civil - Felipe Moré 1150 - Teléfono: 456 - 4751 - Rosario, Santa Fe, Argentina
            </footer>
	    </div>
        
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
        <br />        <br />        <br />
        
</div>
<body>
</body>
</html>