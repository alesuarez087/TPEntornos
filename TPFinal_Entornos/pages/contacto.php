<?php 
	session_start(); 
	$tipoUsuario = NULL;
	$vNRO = NULL;
	if(isset($_SESSION['usuario'])){
		$fila = $_SESSION['usuario'];
		$tipoUsuario = $fila['TipoUsuario'];
		if($tipoUsuario != 3) header("location:../pages/index.php");
		else {
			$nombreUsuario = $fila['Usuario'];
			if(isset($_SESSION["carro"])) $vNRO=count($_SESSION["carro"]); else $vNRO=0;
		}
	}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Contacto</title>
<link rel="stylesheet" href="../styles/css/bootstrap.css" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php include("cabecera.php"); ?>

	<div class="col-sm-6 col-md-6">
	<h2>Contacto</h2>
	<form name="form" action="../code/mail.php" method="post">
		<div>
			<b>Mail de Contacto: </b>
			<input type="text" name="mail" id="mail" width="350px" value="<?php if(isset($_SESSION["usuario"]["Email"])) echo($_SESSION["usuario"]["Email"]) ?> "/>
		</div>
		<div>
			<b>Texto:</b><br />
			<textarea style="height: 200px; width: 100%; overflow: auto;" name="tex" id="tex"></textarea>
		</div><br />
		<div style="text-align:center">
			<input type="submit" name="event" id="event" value="Enviar" class="btn btn-success" />
			<input type="reset" name="event" id="event" value="Borrar" class="btn btn-default" />
		</div>
	</form>
	</div>
	
	<?php include("pie.php");?>
</body>
</html>
