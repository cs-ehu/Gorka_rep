<?php
include "includes/menu.php";
session_start();
$mail = $_SESSION['mail'];
$xml = simplexml_load_file('usuarios.xml') or die("Error al abrir el xml");
$pokedex = simplexml_load_file('pokedex.xml') or die("Error al abrir el xml");
foreach ($xml->children() as $usuario) {
    if (($mail == $usuario->mail)) {
        $equipos = $usuario->equipos;
    }
}
$contador = 0;//contador para poder numerar los equipos

/*por cada equipo se coge el n?mero del pokemon y se busca su nombre*/
foreach ($equipos->children() as $equipo) {
    $contador = $contador + 1;
    $pokemon1 = $equipo->pokemon1;
    $pokemon2 = $equipo->pokemon2;
    $pokemon3 = $equipo->pokemon3;
    $pokemon4 = $equipo->pokemon4;
    $pokemon5 = $equipo->pokemon5;
    $pokemon6 = $equipo->pokemon6;
    $nombre_pokemon1;
    $nombre_pokemon2;
    $nombre_pokemon3;
    $nombre_pokemon4;
    $nombre_pokemon5;
    $nombre_pokemon6;
    foreach ($pokedex->children() as $pokemon) {
        if (intval($pokemon1) == $pokemon->dex) {;
            $nombre_pokemon1 = $pokemon->species;
        }
        if (intval($pokemon2) == $pokemon->dex) {
            $nombre_pokemon2 = $pokemon->species;
        }
        if (intval($pokemon3) == $pokemon->dex) {
            $nombre_pokemon3 = $pokemon->species;
        }
        if (intval($pokemon4) == $pokemon->dex) {
            $nombre_pokemon4 = $pokemon->species;
        }
        if (intval($pokemon5) == $pokemon->dex) {
            $nombre_pokemon5 = $pokemon->species;
        }
        if (intval($pokemon6) == $pokemon->dex) {
            $nombre_pokemon6 = $pokemon->species;
        }
    }
?>
	<!--se gener? una tabla para cada equipo -->
    <table border="2" style="width: 100%">
        <tr>
            <th>Nº</th>
            <th>Pokemon 1</th>
            <th>Pokemon 2</th>
            <th>Pokemon 3</th>
            <th>Pokemon 4</th>
            <th>Pokemon 5</th>
            <th>Pokemon 6</th>
        </tr>
        <tr>
            <td>
                <?php echo $contador ?>
            </td>
            <td>
                <?php echo $nombre_pokemon1 ?>
            </td>
            <td>
                <?php echo $nombre_pokemon2 ?>
            </td>
            <td>
                <?php echo $nombre_pokemon3 ?>
            </td>
            <td>
                <?php echo $nombre_pokemon4 ?>
            </td>
            <td>
                <?php echo $nombre_pokemon5 ?>
            </td>
            <td>
                <?php echo $nombre_pokemon6 ?>
            </td>
        </tr>
        </br>
        <?php
}
?>

    </table>

    <?php
include "includes/footer.php";
?>