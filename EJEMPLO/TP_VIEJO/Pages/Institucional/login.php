<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Club Atlético Libertad</title>
<link rel="stylesheet" href="../CSS/bootstrap.min.css" />
</head>
<body>
	<div class="container">
        
        <?php include('Home/cabecera.php'); ?>
        
		<br />
    	<div class="modal fade" id="login">
			<div class="modal-dialog modal-md modal-dialog-centered">
				<div class="modal-content">
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

        
        <br />
        <?php include('Home/footer.php'); ?>
        
        <br />        <br />        <br />
        
	</div>

</body>
</html>