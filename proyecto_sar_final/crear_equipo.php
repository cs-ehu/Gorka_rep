<?php
include "includes/menu.php";

$xml = simplexml_load_file("pokedex.xml") or die("Error al abrir el xml");
?>

    <h1>Crear equipo</h1>

    <form id='equipo' name='equipo' method="POST" enctype="multipart/form-data">
        <div class="casillas">

            <?php
$estilizador = 0;
/*muestra todos los pokemon con una casilla para poder seleccionar*/
foreach($xml->children() as $pokemon) {
?>

                <label for="<?php echo $pokemon->dex; ?>"> ( <?php echo $pokemon->dex; ?>
                </label>
                <input class="casilla" type="checkbox" name="check_list[]" id="<?php echo $pokemon->dex; ?>" value="<?php echo $pokemon->dex; ?>">
                <label for="<?php echo $pokemon->dex; ?>"> <?php echo $pokemon->species; ?>) 
				</label>

                <?php
}

?>

        </div>
        <br />
        <input type="button" id="crear" value="Crear">
        <div>
            <h3 class="ocultado"> Equipo insertado</h3>
            <a class="ocultado" href="ver_equipo.php">Ver equipos</a>
            <a class="ocultado" href="crear_equipo.php">Nuevo equipo</a>
        </div>
    </form>
    <script src="libreria/jquery-3.3.1.js"></script>
    <script>
	/*hecho con jquery*/
        $(document).ready(function() {
            var limit = 6;
			/*cada vez que se selecciona una casilla se verifica la siguiente función*/
			/*si intenta elegir más de 6 no se le permitirá y cancelará la selección*/
            $('input.casilla').on('change', function(evt) {
                if ($(this).siblings(':checked').length >= limit) {
                    this.checked = false;
                    alert("Un equipo pokemon tiene como máximo 6 pokemon no puedes elegir más");
                }
            });
			/*cuando pulsa el botón de crear verifica que ha elegido 6 para asó poder almacenar el equipo*/
            $('#crear').click(function(evt) {
                if (($('input.casilla').siblings(':checked').length != limit)) {
                    alert("Elige 6 pokemon");

                } else {
					//función ajax que envía a insertar_equipo.php los datos sin tener que recargar la página
                    $.ajax({
                        type: "POST",
                        url: "insertar_equipo.php",
                        data: $('.casilla:checked').serialize(),
                        dataType: "text",
                        success: function(mensaje) {
                            document.getElementById("equipo").reset();
                            $('#crear').css("display", "none");
                            $('.casillas').css("display", "none");
                            $('.ocultado').css("display", "block");

                        }
                    })
                }
            })

        })
    </script>

    <?php
include "includes/footer.php";

?>