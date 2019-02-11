<?php
include "includes/menu.php";
session_start();
$mail = $_SESSION['mail'];
$xml = simplexml_load_file('usuarios.xml');
foreach ($xml->children() as $usuario) {
    if (($mail == $usuario->mail)) {
        $nombre = $usuario->nombre;
        $edad = $usuario->edad;
        $equipo = $usuario->bando;
    }
}
?>

    <header id='h1'> Area de entrenador: </header>
    <br>
    <h3> mail: <?php echo ($mail) ?></h3>
    <br>
    <input type="button" id="ver_mas" value="Ver más" onclick="ver_mas()">
    <div id="mas" display='none'>
        <h3> nombre: <?php echo ($nombre) ?></h3>
        <br>
        <h3> edad: <?php echo ($edad) ?></h3>
        <br>
        <h3> bando: <?php echo ($equipo) ?></h3>
        <br>
    </div>

    <script src="libreria/jquery-3.3.1.js"></script>
    <script>
        function ver_mas() {
            var x = document.getElementById("mas");
            x.style.display = "block";
            var b = document.getElementById("ver_mas");
            b.style.display = "none";

        }
    </script>
    <?php
include "includes/footer.php";
?>