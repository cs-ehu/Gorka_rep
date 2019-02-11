<?php

if (isset($_POST['submit'])) {
	$xml = simplexml_load_file('usuarios.xml');
	$num = 0;
	foreach($xml->children() as $usuario) {
		if (($_POST['mail'] == $usuario->mail)) {
			$num = 1;
		}
	}
	/*solo se permite un mail, así que si ya estaba registrado no se permitirá registrarse de nuevo*/
	if ($num == 1) {
		echo ("<script>alert('Mail ya registrado')</script>");
		header("Refresh:0");
	}

	if ($num == 0) {
		$usuario = $xml->addChild('usuario');
		$usuario->addChild('mail', $_POST['mail']);
		$usuario->addChild('nombre', $_POST['Nombre']);
		$usuario->addChild('bando', $_POST['Bando']);
		$usuario->addChild('edad', $_POST['Edad']);
		$usuario->addChild('contrasena', $_POST['Contrasena']);
		$usuario->addChild('equipos');
		/* darle formato al xml, el código que aparece a continuación le dará formato al xml al guardarlo */
		$domxml = new DOMDocument('1.0');
		$domxml->preserveWhiteSpace = false;
		$domxml->formatOutput = true;
		$domxml->loadXML($xml->asXML());
		$domxml->save('usuarios.xml');
		echo ("<script>alert('Cuenta creada')</script>");
		header("Location: login.php");
	}
}

include "includes/menu_sin_registro.php";

?>
    <script type="text/javascript" src="verificar_registro.js"></script>
    <form id='registro' name='registro' action='registrarse.php' method="POST" enctype="multipart/form-data">
        <div>
            Dirección de Correo*: </br>
            <input type="text" class="form-control" id="mail" name="mail" />
            </br>
        </div>
        <div>
            Nombre*:</br>
            <input type="text" class="form-control" id="Nombre" name="Nombre" />
            </br>
        </div>
        <div>
            Edad*:</br>
            <input type="text" class="form-control" id="Edad" name="Edad" />
            </br>
        </div>
        <div>
            Bando*:</br>
            <select class="form-control" id="Bando" name="Bando">
                <option value="Azul">Azul</option>
                <option value="Rojo">Rojo</option>
                <option value="Amarillo">Amarillo</option>
            </select>
            </br>
        </div>

        <div>
            Contraseña*:</br>
            <input type="password" class="form-control" id="Contrasena" name="Contrasena" />
            </br>
        </div>
        <div>
            Repetir Contraseña*:</br>
            <input type="password" class="form-control" id="Contrasena_rep" name="Contrasena_rep" />
            </br>
        </div>
        <div class="button">
            <button type="submit" id="Boton" name="submit" onclick="return ValidarForm(this.form);">Registrarse</button>
            </br>
        </div>
    </form>

    <?php
include "includes/footer.php";
 ?>