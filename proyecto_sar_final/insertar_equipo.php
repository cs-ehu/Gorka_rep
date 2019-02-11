<?php
session_start();
$mail = $_SESSION['mail'];
$xml = simplexml_load_file('usuarios.xml');

foreach($xml->children() as $usuario) {
	if (($mail == $usuario->mail)) {
		$equipos = $usuario->equipos;
	}
}
/*primero se recibe el vector que contiene los 6 elegidos y se extraen 1 a 1*/
$vector = $_POST['check_list'];
$pokemon1 = $vector['0'];
$pokemon2 = $vector['1'];
$pokemon3 = $vector['2'];
$pokemon4 = $vector['3'];
$pokemon5 = $vector['4'];
$pokemon6 = $vector['5'];
/*se almacena en el xml creando un nuevo equipo*/
$equipo = $equipos->addChild('equipo');
$equipo->addChild('pokemon1', $pokemon1);
$equipo->addChild('pokemon2', $pokemon2);
$equipo->addChild('pokemon3', $pokemon3);
$equipo->addChild('pokemon4', $pokemon4);
$equipo->addChild('pokemon5', $pokemon5);
$equipo->addChild('pokemon6', $pokemon6);
/*se guarda dandole formato*/
$domxml = new DOMDocument('1.0');
$domxml->preserveWhiteSpace = false;
$domxml->formatOutput = true;
$domxml->loadXML($xml->asXML());
$domxml->save('usuarios.xml');
?>