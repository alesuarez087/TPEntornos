<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
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

        <!-- CARROUSEL FOTOS-->
        <div id="carousel1" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousell" data-slide-to="0" class="active"></li>
                <li data-target="#carousell" data-slide-to="1"></li>
                <li data-target="#carousell" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="../Image/2.jpg" alt="" />
                    <div class="carousel-caption">
                        <h3>TITULO 1</h3>
                        <p>Descripcion de lo qeu tiene el contenido</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../Image/2.jpg" alt="" />
                    <div class="carousel-caption">
                        <h3>TITULO 1</h3>
                        <p>Descripcion de lo qeu tiene el contenido</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../Image/2.jpg" alt="" />
                    <div class="carousel-caption">
                        <h3>TITULO 1</h3>
                        <p>Descripcion de lo qeu tiene el contenido</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel1" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel1" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <br />

        <!-- NOTAS-->
        <div class="row">
            <div class="col-lg-4">
                <div class="card text-center">
                    <div class="card-header"> BASQUET </div>
                    <img class="card-img-top" src="../Image/1.jpg" />
                    <div class="card-body">
                        
                        <a class="card-title h4" href="../PagesNota.php">Arrancó el Minibasquet</a><br /><br />
                        <a class="card-text" href="Nota.php" style="color:black">
                            En el día de la fecha arrancaron los entrenamientos de la categorías Mini y Premini
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card text-center">
                    <div class="card-header"> BASQUET </div>
                     <img class="card-img-top" src="../Image/1.jpg" />
                     <div class="card-body">
                        <h4 class="card-title">Arrancó el Minibasquet</h4>
                        <p class="card-text">
                            En el día de la fecha arrancaron los entrenamientos de la categorías Mini y Premini
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card text-center">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Básquet</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Futsal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Voley</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Primera B</h4>
                        <p class="card-text">
                            <table class="table table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th>POS</th>
                                        <th>EQUIPO</th>
                                        <th>PG</th>
                                        <th>PP</th>
                                        <th>PTS</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>A</td>
                                    <td>A</td>
                                    <td>A</td>
                                    <td>A</td>
                                    <td>A</td>
                                </tr>
                                <tr>
                                    <td>A</td>
                                    <td>A</td>
                                    <td>A</td>
                                    <td>A</td>
                                    <td>A</td>
                                </tr>
                                <tr>
                                    <td>A</td>
                                    <td>A</td>
                                    <td>A</td>
                                    <td>A</td>
                                    <td>A</td>
                                </tr>
                                <tr>
                                    <td>A</td>
                                    <td>A</td>
                                    <td>A</td>
                                    <td>A</td>
                                    <td>A</td>
                                </tr>
                                <tr>
                                    <td>A</td>
                                    <td>A</td>
                                    <td>A</td>
                                    <td>A</td>
                                    <td>A</td>
                                </tr>
                            </table>
                        </p>
                    </div>
                </div>
                <br />
                <img src="https://www.hindustantimes.com/Images/Popup/2012/6/Banner-President-FNL.gif" class="img-fluid">
            </div>
            
        </div>

        <br />

        <div class="row">
            <div class="col-lg-4">
                <div class="card text-center">
                    <div class="card-header"> BASQUET </div>
                    <img class="card-img-top" src="../Image/1.jpg" />
                    <div class="card-body">
                        <h4 class="card-title">Arrancó el Minibasquet</h4>
                        <p class="card-text">
                            En el día de la fecha arrancaron los entrenamientos de la categorías Mini y Premini
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card text-center">
                    <div class="card-header"> BASQUET </div>
                    <img class="card-img-top" src="../Image/1.jpg" />
                    <div class="card-body">
                        <h4 class="card-title">Arrancó el Minibasquet</h4>
                        <p class="card-text">
                            En el día de la fecha arrancaron los entrenamientos de la categorías Mini y Premini
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card text-center">
                    <div class="card-header"> BASQUET </div>
                    <img class="card-img-top" src="../Image/1.jpg" />
                    <div class="card-body">
                        <h4 class="card-title">Arrancó el Minibasquet</h4>
                        <p class="card-text">
                            En el día de la fecha arrancaron los entrenamientos de la categorías Mini y Premini
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <br />

        <img src="http://www.basquetrosario.com.ar//UserFiles/newsletter/banners/BR_FB_TRANSMISION.jpg" class="img-fluid">
        
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
        <!-- PIE DE WEB-->
        <div class="jumbotron">
            <p class="text-center">
                Club Atlético Libertad Asociación Civil - Felipe Moré 1150 - Teléfono: 456 - 4751 - Rosario, Santa Fe, Argentina
            </p>
        </div>
    </div>
    
    


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
