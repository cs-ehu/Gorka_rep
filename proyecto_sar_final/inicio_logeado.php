<?php
session_start();
$mail = $_SESSION['mail'];
include "includes/menu.php";

?>
    <img id="imagen_inicio" src="imagenes/Oak.gif" alt="imagen de saludo" style="height: 200px; width: 150px;">
    <h3> Bienvenido entrenador, ¿ya estás preparado para la aventura? </h3>
    <br />
    <h3> Selecciona alguna de los lugares a los que quieres acceder del menú de la izquierda </h3>
    <br />

    <?php
include "includes/footer.php";

?>