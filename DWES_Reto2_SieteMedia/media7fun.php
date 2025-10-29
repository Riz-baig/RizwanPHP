<?php
//función que impide insercción de código
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//funcion para repartir cartas
function repartircarta($jugadores,$numcarta, $baraja){
    $reparto = [];
    foreach ($jugadores as $nombre) {
        $reparto[$nombre] = ['cartas' => [], 'puntos' => 0.0]; //crea un array de carta para cada jugador y variable puntos
    }
    foreach ($reparto as $nombre => &$datos) {
        while (count($datos['cartas']) < $numcarta) {
            $i = rand(0, count($baraja) - 1);
            if ($baraja[$i] === 0) continue; // ya usada
            $carta = $baraja[$i];
            $baraja[$i] = 0; // marcar como usada
            $datos['cartas'][] = $carta;
            $datos['puntos']  += valorCarta($carta); // llamada a la función externa
        }
    }
    return $reparto;
}

// funcion que calcula el valor de cada carta
function valorCarta($carta): float {
    $v = substr($carta, 0, -1); // quita la letra del palo (c, t, d, p)
    return is_numeric($v) ? (float)$v : 0.5;
}

//Funcion que busca el ganador y reparte el premio.
function calcularGanador($reparto, $apuesta) {
    $ganadores = [];
    $total = 0.0; 
    foreach ($reparto as $nombre => $datos) {//Buscar jugadores con 7.5 puntos exactos
        if ($datos['puntos'] == 7.5) {
            $ganadores[] = $nombre;
        }
    }
    //Si hay 7.5 -> ganan esos, 80% de la apuesta
    if (!empty($ganadores)) {
        $total = $apuesta * 0.80;
        $premio = $total / count($ganadores);
    } else {
        //Si nadie tiene 7.5 -> ganan los que tienen menos de 7.5
        foreach ($reparto as $nombre => $datos) {
            if ($datos['puntos'] < 7.5) {
                $ganadores[] = $nombre;
            }
        }
        if (!empty($ganadores)) {
            $total = $apuesta * 0.50;
            $premio = $total / count($ganadores);
        } else {
            //Nadie gana
            $total = 0;
            $premio = 0;
        }
    }
    return ['ganadores' => $ganadores,
            'premio_total' => $total,
            'premio_por_jugador' => $premio];
}

function crearFicheroApuestas($reparto, $resultado) {

    // Crear nombre del fichero con fecha y hora actuales
    $nombreFichero = 'apuestas_' . date('dmyHis') . '.txt';

    // Abrir el fichero en modo escritura
    $f = fopen($nombreFichero, 'a+');

    // Recorrer los jugadores y escribir cada línea
    foreach ($reparto as $nombre => $datos) {
        $partes = explode(' ', trim($nombre));// Obtener iniciales del jugador (primera letra de nombre y primer apellido si hay)
        $ini = strtoupper(substr($partes[0], 0, 1));
        if (count($partes) > 1) {
            $ini .= strtoupper(substr($partes[1], 0, 1));
        }

        // Puntos del jugador
        $puntos = $datos['puntos'];

        // Importe ganado (si está en la lista de ganadores)
        $importe = 0;
        if (!empty($resultado['ganadores']) && in_array($nombre, $resultado['ganadores'])) {
            $importe = $resultado['premio_por_jugador'];
        }

        // Escribir línea: Iniciales#Puntos#Importe
        fwrite($f, "$ini#$puntos#$importe" . PHP_EOL);
    }

    // Línea final con totales
    $numGanadores = !empty($resultado['ganadores']) ? count($resultado['ganadores']) : 0;
    $totalPremios = $resultado['premio_total'] ?? 0;

    fwrite($f, "TOTALPREMIOS#$numGanadores#$totalPremios" . PHP_EOL);

    // Cerrar el fichero
    fclose($f);

}
?>

