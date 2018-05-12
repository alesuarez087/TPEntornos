<?php 
require 'conUser.php';

$udaimpl = new UsuarioDAOImpl();
$result = $udaimpl->getUsuarioById($id);

while ($res = mysql_fetch_array($result, MYSQL_NUM)){

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Edit Form - Usuarios</title>
<script type="text/javascript" src="js.js">
</script>
</head>
<body>

<div align="center" id="formAbmUsuario">
<form action="conUser.php" method="post" id="abmFormUsuario" name="abmFormUsuario" >
<input type="hidden" name="v3" value="3">
<input type="hidden" name="idu" value="<?php echo $res[0]; ?>">
	<table border="1" >
		<thead>
			<tr>
     			<th colspan="2">Update - Usuario</th>
  			</tr>
		</thead>
		
		<tr>
			<th>Nombre:</th><th><input type="text" id="nombre" name="nombre" tabindex="1" value="<?php echo $res[1]; ?>"></th>
		</tr>
		<tr>
			<th>Apellido:</th><th><input type="text" id="apellido" name="apellido" tabindex="2" value="<?php echo $res[2]; ?>"></th>
		</tr>
		<tr>
			<th>Usuario:</th><th><input type="text" id="usuario" name="usuario" tabindex="3" value="<?php echo $res[3]; ?> "></th>
		</tr>
		<tr>
			<th>Password:</th><th><input type="password" id="passw" name="passw" tabindex="4" value="<?php echo $res[4]; ?>"></th>
		</tr>
		<tr>
			<th colspan="2"><input type="submit" value="Update" ></th>
		</tr>
		<?php } ?>
	</table>
</form>
</div>

</div>
</body>
</html>