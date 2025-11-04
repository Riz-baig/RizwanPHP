<?php
//función que impide insercción de código
function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//funcio que reparte las cartas

function repartirCartas($baraja, &$jugadores, $numcartas)
{
    foreach($jugadores as $nombre => &$dato){//en cada jugador escoge la variable dato
        $cantidad = 0;//la cantidad de las cartas inicialmente 0
        $cartas = []; //array de cartas, iniciamete vacio
        while($cantidad < $numcartas)//mientras que la cantidad de las cartas repartidas es menor que la cantidad pasada
        {
            $num = rand(0, 39); //gebera un numero aleatiorio de 0 39(la posicion de baraja)
            if($baraja[$num] != '0'){ //comprueba que exista esta carta y no este repartida
                $cartas[$cantidad] = $baraja[$num]; //pasa esa carta al array de cartas
                $baraja[$num] = '0';// y vacia esta posicion para que no vuelva salir
                $cantidad++;//aumenta la cantidad
            }           
        }
            $dato['cartas'] = $cartas;//pasa este arrray de cartas a cada jugador
    }
}

//mostrar cartas
function mostrarCartas($jugadores)
{
    echo "<table border='1'>";
    echo "<tr>
            <th>Jugador</th>    <th>Cartas</th> 
         </tr>"; //defino dos columnas, jugador y cartas
    foreach($jugadores as $nombre => $datos) {
        echo "<tr>";
        echo "<td>" .$nombre."</td>"; //paso nombre del jugador
        echo "<td>";
            echo "<ul>";
            foreach ($datos['cartas'] as $carta) { // y va imprimiendo cartas
            echo "<img src='images/{$carta}.PNG' width='60' style='margin:2px;'>";
            }
            echo "</ul>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

function calcularPuntuacion(&$jugadores)
{
    foreach($jugadores as $nombre => &$dato)
    {
        $puntos = 0;
        var_dump($jugadores);
        foreach($dato['cartas'] as $carta)
        {
            $valor = substr($carta, 0, 1); // primer carácter de la carta

            if (ctype_digit($valor)){
                $puntos += (int)$valor; // suma el valor numérico
            } else {
                $puntos += 0.5; // J, Q, K
            }
        }
        $dato['puntos'] = $puntos; // guardamos la puntuación
    }
}

function repartirPremio(&$jugadores, $apuesta)
{
    $ganadores = [];//inicializo el array vacio de ganadores
    $ganador = false;
    // Buscamos si alguien tiene 7.5
    foreach($jugadores as $nombre => &$dato) 
    {
        $puntos = $dato['puntos'];
        if($puntos == 7.5) {
            $dato['premio'] = $apuesta * 0.8;
            echo "el jugador ".$nombre." gana la aprtida con 7.5 puntos";
            $ganador = true;
        } else {
            $dato['premio'] = 0; // inicializamos premio
        }
    }

    if(!$ganador) //si no hay ganador, cuenta los que tienen menos de 7.5
    {
        foreach($jugadores as $nombre => &$dato) 
        {
            if($dato['puntos'] < 7.5) {
                $ganadores[] = $nombre;
            echo "el jugador ".$nombre." ha gandao con ".$dato['puntos'];      
            } else {
                $dato['premio'] = 0; // los que superan 7.5 pierden
            }
        }

        $conta = count($ganadores);
        if($conta > 0) 
            {
            $premio = ($apuesta * 0.5) / $conta;
            foreach($ganadores as $nombre) {
                $jugadores[$nombre]['premio'] = $premio;
            }
        }
    }
}

function crearFichero($jugadores)
{
        // Crear nombre del fichero con fecha y hora actuales
    $nombreFichero = 'apuestas_' . date('dmyHis') . '.txt';

    $f = fopen($nombreFichero, 'a+');
    foreach ($jugadores as $nombre => $dato) 
    {
        $partes = explode(' ', trim($nombre));// Obtener iniciales del jugador (primera letra de nombre y primer apellido si hay)
        $ini = strtoupper(substr($partes[0], 0, 1));
        if (count($partes) > 1) {
            $ini .= strtoupper(substr($partes[1], 0, 1));
        }
         $texto = $ini."#".$dato['puntos']."#".$dato['premio'];
         fwrite($f, $texto. PHP_EOL);
    }
    fclose($f);

}
?>

