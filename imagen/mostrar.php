<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
	<center>
    	<table>
        	<thead>
            	<tr>
                	<td align="center" colspan="3"><a href=#>nuevo</a></td>
                </tr>
            	<tr>
                	<th>nombre</th>	
                	<th>imagen</th>
                    <th>operaciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
				include("conexion.php");
				$query = "SELECT * from imagen";
				$resulado = $conexion->query($query);
				while($row = $resulado->fetch_assoc()){
			?>
            <tr>	
            	<td><?php echo $row['nombre']; ?></td>
                <td><img src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>" /></td>
                <td>
                	<a href="#">MODIFICAR</a>
                    <a href="#">ELIMINAR</a>
                </td>
            </tr>
            <?php
				}
			?>
            </tbody>
        </table>
    </center>
<body>
</body>
</html>