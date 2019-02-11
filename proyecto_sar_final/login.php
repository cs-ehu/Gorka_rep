<?php

if (isset($_POST['submit'])) {
	$mail = $_POST['mail'];
	$password = $_POST['password'];
	$xml = simplexml_load_file("usuarios.xml") or die("Error al abrir el xml");
	foreach($xml->children() as $usuario) {
		if (($mail == $usuario->mail) && ($password == $usuario->contrasena)) {
			/* si es correcto se hace un session start y se guarda en la variable sesion,
			para así poder acceder a los datos del usuario en ciertas pestañas.			
			*/
			session_start();
			$_SESSION['mail'] = $mail;
			echo ("<script>alert('BIENVENIDO AL MUNDO POKEMON')</script>");
			echo ("<script>window.location = 'Inicio_logeado.php';</script>");
		}
	}

	echo ("<script>alert('ERROR, mail o contrasena incorrectos')</script>");
	echo ("<script>window.location = 'login.php';</script>");
}

include "includes/menu_sin_registro.php";

?>
    <h1>Login</h1>

    <br />
    <br />
    <form id='login' name='login' action='login.php' method="POST" enctype="multipart/form-data">

        <div>
            <label for="mail"><b>Mail</b></label>
            <input type="text" name="mail" id="mail">

            <br />
            <br />
            <label for="password"><b>Contrasena</b></label>
            <input type="password" name="password" id="password">
            <br />
            <br />
            <button type="submit" name="submit">Iniciar sesión</button>

        </div>

    </form>

    <?php
include "includes/footer.php";

?>
