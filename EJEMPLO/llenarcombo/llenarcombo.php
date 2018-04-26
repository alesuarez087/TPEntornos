<?php
$server     = 'localhost'; //servidor
$username   = 'root'; //usuario de la base de datos
$password   = ''; //password del usuario de la base de datos
$database   = 'estados_USA'; //nombre de la base de datos
 
$conexion = @new mysqli($server, $username, $password, $database);

if ($conexion->connect_error) //verificamos si hubo un error al conectar, recuerden que pusimos el @ para evitarlo
{
    die('Error de conexión: ' . $conexion->connect_error); //si hay un error termina la aplicación y mostramos el error
}

$sql="SELECT * from tbl_estados";
$result = $conexion->query($sql); //usamos la conexion para dar un resultado a la variable
 
if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $combobit="";
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
    {
        $combobit .=" <option value='".$row['abbr']."'>".$row['nombre']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
    }
}
else
{
    echo "No hubo resultados";
}
$conexion->close(); //cerramos la conexión
?>
<html>
<head>
<title>Llenar un Combobox/Select con registros de una tabla</title>
<link href="contactos.css" rel="stylesheet" type="text/css" />
</head>
<body>
   <select name="estado">
       <?php echo $combobit; ?>
   </select>
</body>
</html>