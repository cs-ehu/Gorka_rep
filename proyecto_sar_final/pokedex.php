<?php
include "includes/menu.php";
$xml = simplexml_load_file("pokedex.xml") or die("Error al abrir el xml");
?>
<form id='filtro' name='filtro' action='pokedex.php' method="POST" enctype="multipart/form-data">
	<div>
		<select id="seleccion" name="seleccion">
			<option value="Todos"> Todos </option>
			<option value="Planta">Planta</option>
			<option value="Fuego">Fuego</option>
			<option value="Agua">Agua</option>
			<option value="Bicho">Bicho</option>
			<option value="Normal">Normal</option>
			<option value="Volador">Volador</option>
			<option value="Veneno">Veneno</option>
			<option value="Electrico">Electrico</option>
			<option value="Tierra">Tierra</option>
			<option value="Hada">Hada</option>
			<option value="Lucha">Lucha</option>
			<option value="Psiquico">Psiquico</option>
			<option value="Roca">Roca</option>
			<option value="Fantasma">Fantasma</option>
			<option value="Hielo">Hielo</option>
			<option value="Dragon">Dragon</option>
		</select>
		<input type="submit" id="Ver" name="submit" value="Filtrar" >
	</div>
	</br>
</form>
<?php
if (isset($_POST['submit']))	{
?>
	<div>
		Mostrando de tipo: 
		<input type="text" class="form-control" id="texto" name="texto" value="<?php echo($_POST['seleccion']);?>" disabled/>
	
	</div>
	<table id="tabla" border="2" bgcolor="#ffe6e6" align="center">
		<thead>
			<tr>
				<th>Num</th>
				<th>Nombre</th>
				<th>Tipo</th>
				<th>Habilidad</th>
				<th>Habilidad Oculta</th>
				<th>Salud</th>
				<th>Ataque</th>
				<th>Defensa</th>
				<th>Velocidad</th>
				<th>Ataque especial</th>
				<th>Defensa especial</th>
				<th>Experiencia</th>
			</tr>
		</thead>
<?php
foreach ($xml->children() as $pokemon) {
	if($_POST['seleccion']=="Todos" || $pokemon->type==$_POST['seleccion']){
?>
		<tr>
		<td> <?php
		echo $pokemon->dex;
?> 		</td> 
		<td> <?php
		echo $pokemon->species;
?> 		</td>
<!--Depende del tipo que sea el pokemon el color del tipo será distinto en cada caso, para hacerlo visualmente agradable -->
<?php
		if ($pokemon->type == "Fuego") {
?>
			<td bgcolor="#F08030"> <?php
			echo $pokemon->type;
?> 			</td>
<?php
		} else if ($pokemon->type == "Agua") {
?>
			<td bgcolor="#6890F0"> <?php
			echo $pokemon->type;
?> 			</td>

<?php
		} else if ($pokemon->type == "Planta") {
?>
			<td bgcolor="#78C850"> <?php
			echo $pokemon->type;
?> 			</td>

<?php
		} else if ($pokemon->type == "Bicho") {
?>
			<td bgcolor="#A8B820"> <?php
			echo $pokemon->type;
?> 			</td>

<?php
		} else if ($pokemon->type == "Normal") {
?>
			<td bgcolor="#A8A878"> <?php
			echo $pokemon->type;
?> 			</td>

<?php
		} else if ($pokemon->type == "Volador") {
?>
			<td bgcolor="#A890F0"> <?php
			echo $pokemon->type;
?> 			</td>

<?php
		} else if ($pokemon->type == "Veneno") {
?>
			<td bgcolor="#A040A0"> <?php
			echo $pokemon->type;
?> 			</td>

<?php
		} else if ($pokemon->type == "Electrico") {
?>
			<td bgcolor="#F8D030"> <?php
			echo $pokemon->type;
?> 			</td>

<?php
		} else if ($pokemon->type == "Hada") {
?>
			<td bgcolor="#EE99AC"> <?php
			echo $pokemon->type;
?> 			</td>

<?php
		} else if ($pokemon->type == "Tierra") {
?>
			<td bgcolor="#E0C068"> <?php
			echo $pokemon->type;
?> 			</td>

<?php
		} else if ($pokemon->type == "Lucha") {
?>
			<td bgcolor="#C03028"> <?php
			echo $pokemon->type;
?> 			</td>

<?php
		} else if ($pokemon->type == "Psiquico") {
?>
			<td bgcolor="#F85888"> <?php
			echo $pokemon->type;
?> 			</td>

<?php
		} else if ($pokemon->type == "Roca") {
?>
			<td bgcolor="#B8A038"> <?php
			echo $pokemon->type;
?> 			</td>

<?php
		} else if ($pokemon->type == "Fantasma") {
?>
			<td bgcolor="#705898"> <?php
			echo $pokemon->type;
?> 			</td>

<?php
		} else if ($pokemon->type == "Dragon") {
?>
			<td bgcolor="#7038F8"> <?php
			echo $pokemon->type;
?> 		</td>

<?php
		} else if ($pokemon->type == "Hielo") {
?>
			<td bgcolor="#98D8D8"> <?php
			echo $pokemon->type;
?> 			</td>

<?php
		} else {
?>
			<td> <?php
			echo $pokemon->type;
?> 			</td>
<?php
		};
?>

		<td> <?php
		echo $pokemon->abilities->ability;
?> 		</td>
		<td> <?php
		echo $pokemon->abilities->dream;
?> 		</td>
		<td> <?php
		echo $pokemon->baseStats->HP;
?> 		</td>
		<td> <?php
		echo $pokemon->baseStats->ATK;
?> 		</td>
		<td> <?php
		echo $pokemon->baseStats->DEF;
?> 		</td>
		<td> <?php
		echo $pokemon->baseStats->SPD;
?> 		</td>
		<td> <?php
		echo $pokemon->baseStats->SATK;
?> 		</td>
		<td> <?php
		echo $pokemon->baseStats->SDEF;
?> 		</td>
		<td> <?php
		echo $pokemon->experience;
?> 		</td>
 
		</tr>
<?php
	};
}
?>
</table>
<?php
}
?>

<?php
include "includes/footer.php";
?>