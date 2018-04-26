<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
	<?php
				include("conexion.php");
				$query = "SELECT * from imagen";
				$resulado = $conexion->query($query);
				while($row = $resulado->fetch_assoc()){
			?>
            
            <center>
    	<form action="guardar.php" method="post" enctype="multipart/form-data"><br /><br />
        	<input type="text" name="nombre" placeholder="nombre" required="required" value="<?php echo $row['nombre']; ?>" /><br /><br />
			<img src="data:image/jpg;base64, <?php echo base64_encode($row['imagen']); ?>" />
            <input type="file" name="imagen" required="required"  /><br /><br />
            <input type="submit" value="aceptar" />
        </form>
    </center>
</body>
</html>