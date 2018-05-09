<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Actividad 3 - Ejercicio 2</title>
</head>
<body>

<script type="text/javascript">
	function enviar(){
		nombre = document.form1.nombre.value
		apellido = document.form1.apellido.value
		email = document.form1.email.value
		nro = document.form1.nro.value
		indice = document.form1.opciones.selectedIndex
		alert(email)
		if(nombre == null || nombre.length == 0 || /^\s+$/.test(nombre)){
			alert("Ingrese nombre"); return false;
		} else if(apellido == null || apellido.length == 0 || /^\s+$/.test(apellido)){
			alert("Ingrese Apellido"); return false;
		} else if(email == null || email.length == 0 || /^\s+$/.test(email)){
			alert("Ingrese Email"); return false;
		} else if(!(/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)/.test(email))){
			alert("Ingrese un Email correctamente"); return false;
		} else if(nro == null || nro.length == 0 || /^\s+$/.test(nro)){
			alert("Ingrese Nro"); return false;
		} else if(isNaN(nro)){
			alert("Ingrese un nro"); return false;
		} else if(indice == null || indice == 0) {
			alert("Seleccione una opcion correcta"); return false;
		} else{
			alert("OK"); return true;
		}
	}
</script>

<form action="" name="form1" onsubmit="return enviar()">
	Nombre: <input type="text" id="nombre" name="nombre" /><br />
	Apellido:  <input type="text" id="apellido" name="apellido" /><br />
	E-mail: <input type="text" id="email" name="email" /> <br />
	NRO: <input type="text" id="nro" name="nro" /> <br />	
	SELECTOR: <select id="opciones" name="opciones">
				<option>- Selecciona un valor -</option>
				<option value="1">Primer valor</option>
				<option value="2">Segundo valor</option>
				<option value="3">Tercer valor</option>
			</select> <br />
	<input value="Aceptar" type="submit" />
	<input type="button" value="Reset" />
</form>

</body>
</html>
