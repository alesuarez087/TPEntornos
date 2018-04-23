<html>
<head>
<title>Baja</title>
</head>
<body>
<?php

include ("conexion.inc");
$vID = $_POST ['id'];
$vSql = "SELECT count(id_ciudad) as contador FROM ciudades WHERE id_ciudad='$vID' ";

$vResultado = mysqli_query($link, $vSql) or die (mysqli_error($link));;
$vCantCiudades = mysqli_fetch_assoc($vResultado);
if ($vCantCiudades['contador'] == 0)
{
echo ("Ciudad Inexistente...!!! <br>");
echo ("<A href='FormBajaIni.html'>Continuar</A>");
}
else{
//Arma la instrucción SQL y luego la ejecuta
$vSql= "DELETE FROM ciudades  WHERE id_ciudad = '$vID' ";
mysqli_query($link, $vSql);
echo("La ciudad fue Borrada<br>");
echo("<A href='Menu.html'>Volver al Menu del ABM</A>");
}
// Liberar conjunto de resultados
mysqli_free_result($vResultado);
// Cerrar la conexion
mysqli_close($link);
?>
</body>
</html>