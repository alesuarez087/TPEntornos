<html>
<head>
<title>Alta Ciudades</title>
</head>
<body>
<?php
include("conexion.inc");
//Captura datos desde el Form anterior
$vNombre = $_POST['nombre'];
$vPais = $_POST['pais'];
$vHabitantes = $_POST['habitantes'];
$vSuperficie = $_POST['superficie'];
$vMetro = $_POST['metro'];

//Arma la instrucción SQL y luego la ejecuta
$vSql = "SELECT count(id_ciudad) as contador FROM ciudades where nombre = '$vNombre' and pais = '$vPais'";
$vResultado = mysqli_query($link, $vSql) or die (mysqli_error($link));;
$vCantCiudades = mysqli_fetch_assoc($vResultado);
if ($vCantCiudades['contador'] != 0){
echo ("La ciuadad ya Existe<br>");
echo ("<A href='Menu.html'>VOLVER AL ABM</A>");
}
else {

$vSql = "INSERT INTO ciudades (nombre, pais, habitantes, superficie, metro) values ('$vNombre','$vPais', '$vHabitantes', '$vSuperficie', '$vMetro')";
mysqli_query($link, $vSql) or die (mysqli_error($link));
echo("Ciudad Registrada<br>");
echo ("<A href='Menu.html'>VOLVER AL MENU</A>");
// Liberar conjunto de resultados
mysqli_free_result($vResultado);
}

// Cerrar la conexion
mysqli_close($link);
?>
</body>
</html>