<?php 
	if(!isset($_SESSION["usuario"])){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Login</title>
<link rel="stylesheet" href="../styles/css/bootstrap.css" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<script>
	function validar(){
		usuario = document.formReg.userCreate.value
		contrasenia = document.formReg.passCreate.value
		confirmar = document.formReg.passConfirm.value
		nombre = document.formReg.nombre.value
		apellido = document.formReg.apellido.value
		dni = document.formReg.dni.value
		email = document.formReg.email.value
			
		if (isNaN(dni)){
			alert("El DNI no es un número"); return false;
		} else if (!isNaN(nombre)){
			alert("El Nombre no puede ser un número"); return false;
		} else if (!isNaN(apellido)){
			alert("El Apellido no puede ser un número"); return false;
		} else if(contrasenia != confirmar){
			alert("Las contraseñas son distintas"); return false;
		} else if(!(/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)/.test(email))){
			alert("El mail no posee el formadto adecuado"); return false;
		} else return true;
	}
</script>
	<?php include_once("cabecera.php"); 
	
			if(isset($_COOKIE['elegido'])){
	?>
	
	<div class="card-group mt-3">

	<div class="card">
       	<div class="card-body">
			<h4 class="card-title text-center">Iniciar Sesión</h4>
				<form role="form" action="../code/login.php" method="post" id="login" name="login">
					<div class="form-group">
						<label for="userregister">Usuario:</label> 
						<input type="text" class="form-control" id="userLogin" name="userLogin" >
					</div>
					<div class="form-group">
						<label for="password">Contraseña:</label>
						<input type="password" class="form-control" id="passLogin" name="passLogin">
					</div>
					<div class="form-group">
						<input class="btn btn-success btn-block" type="submit" value="Ingresar" id="event" name="event" />
					</div>
				</form>
		</div>
	</div>          

	<div class="card">
    	<div class="card-body">
        	<h4 class="card-title text-center">Registrarse</h4>
			<form role="form" action="../code/login.php" method="post" id="formReg" name="formReg" onClick="return validar()">
				<div class="form-group">
					<label for="user">Usuario</label>
					<input type="text" class="form-control" id="userCreate" name="userCreate">
				</div>
				<div class="form-group">
					<label for="password">Contraseña:</label> 
					<input type="password" class="form-control" id="passCreate" name="passCreate">
				</div>
				<div class="form-group">
					<label for="password">Confirmar Contraseña:</label> 
					<input type="password" class="form-control" id="passConfirm" name="passConfirm">
				</div>
				<div class="form-group">
					<label for="nombre">Nombre:</label>
					<input type="text" class="form-control" id="nombre" name="nombre" <?php if(isset($_COOKIE["nombre"])) { ?> value="<?php echo $_COOKIE["nombre"]; ?>" <?php } ?> >
				</div>
				<div class="form-group">
					<label for="apellido">Apellido:</label> <input type="text" class="form-control" id="apellido" name="apellido"<?php if(isset($_COOKIE["apellido"])) { ?> value="<?php echo $_COOKIE["apellido"]; ?>" <?php } ?> >
				</div>
				<div class="form-group">
					<label for="dni">DNI:</label> 
					<input type="text" class="form-control" id="dni" name="dni" <?php if(isset($_COOKIE["dni"])) { ?> value="<?php echo $_COOKIE["dni"]; ?>" <?php } ?> >
				</div>
				<div class="form-group">
					<label for="dni">Email:</label>
					<input type="text" class="form-control" id="email" name="email" <?php if(isset($_COOKIE["email"])) { ?> value="<?php echo $_COOKIE["email"]; ?>" <?php } ?> >
				</div>
				<div class="form-group">
					<input class="btn btn-success btn-block" type="submit" value="Registrar" id="event" name="event" />
				</div>
			</form>
		</div>
	</div>
	
	</div>
	
	<?php } else { ?>
	
	<div class="container">
		<div class="panel panel-primary">
			<h3 class="panel-heading">Registrarse</h3>
			<div class="panel-body">
				<form role="form" action="../code/login.php" method="post" id="formReg" name="formReg" onClick="return validar()">
					<div class="form-group">
						<label for="user">Usuario</label>
						<input type="text" class="form-control" id="userCreate" name="userCreate">
					</div>
					<div class="form-group">
						<label for="password">Contraseña:</label> 
						<input type="password" class="form-control" id="passCreate" name="passCreate">
					</div>
					<div class="form-group">
						<label for="password">Confirmar Contraseña:</label> 
						<input type="password" class="form-control" id="passConfirm" name="passConfirm">
					</div>
					<div class="form-group">
						<label for="nombre">Nombre:</label>
						<input type="text" class="form-control" id="nombre" name="nombre" <?php if(isset($_COOKIE["nombre"])) { ?> value="<?php echo $_COOKIE["nombre"]; ?>" <?php } ?> >
					</div>
					<div class="form-group">
						<label for="apellido">Apellido:</label> <input type="text" class="form-control" id="apellido" name="apellido"<?php if(isset($_COOKIE["apellido"])) { ?> value="<?php echo $_COOKIE["apellido"]; ?>" <?php } ?> >
					</div>
					<div class="form-group">
						<label for="dni">DNI:</label> 
						<input type="text" class="form-control" id="dni" name="dni" <?php if(isset($_COOKIE["dni"])) { ?> value="<?php echo $_COOKIE["dni"]; ?>" <?php } ?> >
					</div>
					<div class="form-group">
						<label for="dni">Email:</label>
						<input type="text" class="form-control" id="email" name="email" <?php if(isset($_COOKIE["email"])) { ?> value="<?php echo $_COOKIE["email"]; ?>" <?php } ?> >
					</div>
					<div class="form-group">
						<input class="btn btn-success btn-block" type="submit" value="Registrar" id="event" name="event" />
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php } 
		if (isset($_COOKIE["email"]))setcookie("email", '', time()-3600, "/");
		if (isset($_COOKIE["dni"]))setcookie("dni", '', time()-3600, "/");
		if (isset($_COOKIE["apellido"]))setcookie("apellido", '', time()-3600, "/");
		if (isset($_COOKIE["nombre"]))setcookie("nombre", '', time()-3600, "/");
		
		include("pie.php");
	?>
</body>
</html>
<?php
	} else header('Location: ../pages/index.php');
?>