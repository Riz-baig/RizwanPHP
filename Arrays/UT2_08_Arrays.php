<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumno con sus notas</title>
</head>
<body>


<?php

$alumnos = array();
$alumnos["Samuel"] = 7;
$alumnos["Miguel"] = 9;
$alumnos["Cesar"] = 10;
$alumnos["Alvaro"] = 5;
$alumnos["Mario"] = 6;

foreach ($alumnos as $nom => $nota)
{
    echo "El alumno ". $nom . " tiene de nota un ".$nota;
    echo "<br>";
}
echo "<br>";
echo "<h3> El alumno con mayor nota.</h3>";
asort($alumnos);//ordeno el array segun su nota.
$nomU = end($alumnos);//coloco el puntero en la ultima posición
$notaU = key($alumnos); //valor (nota) de ultima posición.
echo "el alumnocon mayor nota es ". $notaU. " que ha sacado un ". $nomU;

echo "<br>";
echo "<h3> El alumno con menor nota.</h3>";
reset($alumnos);//coloco el puntero en la primera posición.
$primero = key($alumnos);
$notaP = current($alumnos);
echo "El alumno con la nota mas baja es <b>". $primero. "</b> que ha sacado un ". $notaP;

?>  


</body>
</html>