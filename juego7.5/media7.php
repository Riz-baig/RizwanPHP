<?php
include 'media7fun.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $jugadores = [
        test_input($_POST["nombre1"]) => [],
        test_input($_POST["nombre2"]) => [],
        test_input($_POST["nombre3"]) => [],
        test_input($_POST["nombre4"]) => []];

    $numcartas = test_input($_POST["numcartas"]);
    $apuesta   = test_input($_POST["apuesta"]);

    $baraja = ['1C','2C','3C','4C','5C','6C','7C','JC','QC','KC',
                '1T','2T','3T','4T','5T','6T','7T','JT','QT','KT',
                '1D','2D','3D','4D','5D','6D','7D','JD','QD','KD',
                '1P','2P','3P','4P','5P','6P','7P','JP','QP','KP'];

    repartirCartas($baraja, $jugadores, $numcartas);//reparte las cartas de la baraja segun la cantidad

    calcularPuntuacion($jugadores); //calcula la puntuación de cada jugador

    repartirPremio($jugadores, $apuesta); //reparte el premio

    mostrarCartas($jugadores);//muestra la tabla de cartas obtenidas por cada jugador

    crearFichero($jugadores);
}

?>
