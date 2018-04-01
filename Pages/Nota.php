<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>Nota</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <!-- CABECERA -->
        <div class="row align-items-center">
            <div class="col-lg-10" style="background-color:white">
                <a href="Boostrap.html"><img src="../Image/100.png" /></a>
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
            <a class="nav-link text-white" href="../Pages/Home.php">Home</a>
            <a class="nav-link text-white" href="../Pages/Institucion.php">Institución</a>
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

        <!-- NOTA -->

        <h2>Soccer</h2>
        <h4> <!-- la nota va a ser recuperada de la BD -->
            Entrevista realizada al entrenador de la Primera de Futsal del club, Tomas Muñoz.
        </h4>
        <p>
            ⚽ Estuvimos conversando con Tomas, el entrenador más joven de la Asociación Rosarina de Futsal, acerca de cómo arrancaron este nuevo año, con respecto a cómo se siente él siendo entrenador con apenas 20 años, también nos contó los grandes cambios que hay en los torneos de la Asociación Rosarina de Futsal y cómo les costó adaptarse en el primer año. Además, hablamos de los objetivos que tienen para este 2018, sobre las libertades que tiene a la hora de trabajar y manejarse en el club, ya que según sus propias palabras: “El club Libertad es como mi segunda casa”.
            No te pierdas la entrevista realizada a nuestro querido entrenador de Futsal del Club!!!
        </p>
        <div class="embed-responsive embed-responsive-16by9">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/kI8_x6Jiql8?list=PLE4YrDCbrAPThNtmj5hpcpriJWI4wUhPK" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
