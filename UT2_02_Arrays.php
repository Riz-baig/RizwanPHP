<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
  table { border-collapse: collapse; }
  th, td { border: 1px solid #000; padding: 4px 8px; text-align: center; }
</style>
<body>

<table>
    <table>
  <tr>
    <th>Índice</th>
    <th>Valor</th>
    <th>Suma</th>
  </tr>
<?php


$Valor = array(); //array de numeros impares
$sumas = array(); //array donde gurado las sumas
$indice = 1;
$contadorPar = 0;
$contadorImp = 0;
$sumaPar = 0;
$sumaImpar = 0;

for ($i=0; $i < 20 ; $i++) //bucle que rellena primer array
{ 
    $Valor[$i] = $indice;
    $indice +=2;
    if($i % 2 == 0)
        {
            $sumaPar = $sumaPar + $Valor[$i]; //suma los valores pares
            $contadorPar++;//contador de pares
        } else {
            $sumaImpar = $sumaImpar + $Valor[$i]; //suma los valores impares
            $contadorImp++; //contadores de impares
        }
}

for ($i=0; $i < 20 ; $i++) 
{ 
    if ($i == 0) { //la posicion 0 rellena con 1
       $sumas[$i] = $Valor[$i]; 
    } else { //el resto de posiciones van sumando la posición anterior
        $sumas[$i] = $sumas[$i-1] + $Valor[$i];
    }
}

for ($i = 0; $i < 20; $i++) 
    { 
    echo "<tr>". "<td>" . $i . "</td>". "<td>" . $Valor[$i] . "</td>". "<td>" . $sumas[$i] . "</td>". "</tr>";
    }
?>
</table>
<?php
echo "La Media de las posiciones Impares es ". $sumaImpar/$contadorImp. "<br>";
echo "La Media de las posiciones Pares es ". $sumaPar/$contadorPar;

?>
    
</body>
</html>