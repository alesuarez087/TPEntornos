<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>
<script>
function prueba(){
		anio = document.form.dni.value
		if (isNaN(anio)){
			alert(anio + " no es válido");
			return false; 
		} else if(anio>2018 || anio<1900){
			alert(anio + "  no es válido");
			return false; 
		} else{
			alert(anio + " es válido");
			return true; 
		}
	} 
</script>
<body>
<form method="post" name="form" id="form" onSubmit="return prueba()" >
	Año: <input name="dni" type="text" /><input type="submit" value="Probar" />
</form>
</body>

</html>
