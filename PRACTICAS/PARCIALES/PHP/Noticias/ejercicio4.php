<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ejercicio 4</title>
</head>

<body>
<table>
	<tr><td>Conversion Pesos a dolar</td></tr>
<?php 
	$peso = 5.31;
	for($i=1;$i<11;$i++){
		echo "<tr><td>".$i." Dolar = ".$i*$peso." Pesos</td></tr>";
	}
?>
</table>
</body>
</html>
