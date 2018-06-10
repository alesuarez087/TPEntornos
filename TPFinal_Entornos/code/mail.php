<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
<?php
	$destino="luzbelito.discos@gmail.com"; /*"micorreo@dominio.com";*/
	$asunto="Contacto luzbelito";
	$desde='From:' .$_POST["mail"];
	$comentario= $_POST["tex"];
	$email = mail($destino,$asunto,$comentario,$desde);
	if ($email==true){
		echo "Su consulta ha sido enviada, en breve recibirá nuestra respuesta.";
	} else {
		echo("mensaje no enviado");
	}
	header("location:../pages/index.php")
?>

</body>
</html>