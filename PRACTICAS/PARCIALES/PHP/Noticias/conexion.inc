<?php
	$link = mysqli_connect("localhost", "root") or die ("Error al conectar la Base de Datos");
	mysqli_select_db($link, "diario");
?>