<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo 5</title>
</head>
<body>


<?php

$Array_1 = array("Bases Datos", "Entornos Desarrollo", "Programación");
$Array_2 = array("Sistemas Informáticos","FOL","Mecanizado");
$Array_3 = array("Desarrollo Web ES","Desarrollo Web EC","Despliegue","Desarrollo Interfaces", "Inglés");

$ArrayUnido_1 = array();
$ArrayUnido_2 = array();
$ArrayUnido_3 = array();
$posiciones = count($Array_1) + count($Array_2) + count($Array_3);

for ($i=0; $i < $posiciones; $i++) //rellena con bucle el primer array unido
{ 
    if ($i < count($Array_1)) {
        $ArrayUnido_1[$i] = $Array_1[$i];
    } elseif ($i < count($Array_1) + count($Array_2)) {
        $ArrayUnido_1[$i] = $Array_2[$i - count($Array_1)];
    } else {
        $ArrayUnido_1[$i] = $Array_3[$i - count($Array_1) - count($Array_2)];
    }
}

//rellena el segundo arrayUnido con array_merge ()
$ArrayUnido_2 = array_merge($Array_1, $Array_2, $Array_3);

//rellena el tercer arrayUnido con array_push
$ArrayUnido_3 = $Array_1;
array_push($ArrayUnido_3, ...$Array_2);
array_push($ArrayUnido_3, ...$Array_3);

// imprimir
echo "<h3>Array Unido con bucle</h3>";
echo "<pre>";
print_r($ArrayUnido_1);
echo "</pre>";

echo "<h3>Array Unido con array_merge</h3>";
echo "<pre>";
print_r($ArrayUnido_2);
echo "</pre>";

echo "<h3>Array Unido con array_push</h3>";
echo "<pre>";
print_r($ArrayUnido_3);
echo "</pre>";


?>

</body>
</html>