// Verificar los datos del formulario de un nuevo comentario.
// Si encuentra algún error muestra una ventana de alerta y devuelve false.
// Si todo ha ido bien, devuelve true.
function ValidarForm(f)
{
	// Leer valores del formulario
	var nombre = f.Nombre.value;
	var mail = f.mail.value;
	var equipo = f.Bando.value;
	var edad = f.Edad.value;
	var contrasena = f.Contrasena.value;
	var contrasena_rep = f.Contrasena_rep.value;
	
	
	var error = "";
	// Verificar que los campos obligatorios están rellenados
	if(nombre=="")
		error += "\tTu nombre es obligatorio!\n";
	if(equipo == "")
		error += "\tEl equipo es obligatorio!\n";
	if(isNaN(edad))
		error += "\tLa edad es obligatoria y numerica!\n";
	if(contrasena.length < 8 || contrasena.length > 30)
		error += "\tLa longitud de la contrseña tiene que ser entre 8 y 30 caracteres!\n";
	if(contrasena != contrasena_rep )
		error += "\tLas constraseñas deben ser iguales!\n";
	// Verificar el formato de la dirección de correo
	if(!VerificarFormatoCorreo(mail))
		error += "\tEl formato de la dirección de correo no es correcto o no has introducido mail!\n";
		
	// Si hay algún error, mostrar el mensaje
	if(error != "")
	{
		alert("Validación del formulario:\n" + error);
		return false;
	}
	else
		return true;
}

// Verificar el formato de una dirección de correo
// Devuelve true si el formato de la dirección de correo es correcto y false en caso contrario
function VerificarFormatoCorreo(direccion)
{
	// Asegurar que '@' aparece una única vez
	if(direccion.split("@").length != 2)
		return false;
	// Asegurar que '@' no es el primer caracter
	if(direccion.indexOf("@") == 0)
		return false;
	// Asegurar que después de '@' hay, al menos, un punto
	if(direccion.lastIndexOf(".") < direccion.lastIndexOf("@"))
		return false;
	// Asegurar que después del último punto hay, al menos, dos caracteres
	if(direccion.lastIndexOf(".") + 2 > direccion.length - 1)
		return false;
	return true;
}
