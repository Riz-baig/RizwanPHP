<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php

    $Alumno = array();
    $Alumno["Elia"] = 28;
    $Alumno["David"] = 20;
    $Alumno["Wen"] = 21;
    $Alumno["Samuel"] = 35;
    $Alumno["Penyu"] = 20;

    foreach ($Alumno as $nombre => $edad)
    {
        echo "el Alumno con el nombre ". $nombre. " tiene ". $edad. " años.<br>";
    }

    $nombre = array_keys($Alumno);//convierte el arry asociativo en indice.
    echo "<br>";
    echo "<br>";

    echo "En la segunda posición esta el alumno ". $nombre[1]. "con ". $Alumno[$nombre[1]]. " años.";
    echo "<br>";
    echo "<br>";

    echo "Avanzo una posición y está ". $nombre[2]. "con ". $Alumno[$nombre[2]]. " años.";
    echo "<br>";
    echo "<br>";
    echo "Coloco el puntero en la última posición y muestro su valor";
    $ultima = end($Alumno);//coloca el puntero en ultima posición y devulve el valor que es la edad.
    $nom = key($Alumno);//devulve la clave donde está el puntero actualmente.
    echo "el ultimo alumno es ".$nom. " y tiene ". $ultima;

    echo "<br>";
    echo "<br>";
    echo "<h3>Ordeno el Array por la edad y muestro el peimero y el último.<h3>";
    asort($Alumno);
    reset($Alumno);
    $nombreP = key($Alumno);
    $edadP = current($Alumno);
    echo "La primera posición del array Ordenado, Nombre ".$nombreP. " y tiene ". $edadP;
    echo "<br>";
    $ultima1 = end($Alumno);
    $edadU = key($Alumno);
    echo "La Ultima posición del array Ordenado, Nombre ".$edadU. " y tiene ". $ultima1;
   ?> 

</body>
</html>