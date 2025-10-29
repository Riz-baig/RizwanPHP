<?php
include 'media7fun.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $jugadores = [
        test_input($_POST["nombre1"]),
        test_input($_POST["nombre2"]),
        test_input($_POST["nombre3"]),
        test_input($_POST["nombre4"])];

    $numcartas = test_input($_POST["numcartas"]);
    $apuesta   = test_input($_POST["apuesta"]);

    $baraja = [
        '1c','2c','3c','4c','5c','6c','7c','Jc','Qc','Kc',
        '1t','2t','3t','4t','5t','6t','7t','Jt','Qt','Kt',
        '1d','2d','3d','4d','5d','6d','7d','Jd','Qd','Kd',
        '1p','2p','3p','4p','5p','6p','7p','Jp','Qp','Kp'];

    // Repartir las cartas y obtener el array asociativo ===
    $reparto = repartircarta($jugadores, $numcartas, $baraja);

    // Calcular ganadores y premios ===
    $resultado = calcularGanador($reparto, $apuesta);

    // Crear el fichero con los resultados ===
    crearFicheroApuestas($reparto, $resultado);
}
?>
