<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>multiplos de 2 en array multidimensional</title>
</head>
<style>
  table { border-collapse: collapse; }
  th, td { border: 1px solid #000; padding: 4px 8px; text-align: center; }
</style>
<body>

<?php

$num = array();
$par = 0;
$suma = 0;
$sumaColumnas = 0;
$sumaF = array();
$sumaC = array();

for ($i=0; $i < 3 ; $i++) { 
    for ($o=0; $o < 3 ; $o++) 
        {
        $num[$i][$o] = $par+=2;
        $suma = $suma + $num[$i][$o]; //guarda en la suma cada elemento de la fila      
    }   
    $sumaF[$i] = $suma;//guarda en array la suma de la fila
    $suma = 0;//la variable suma se inicializa
}

for ($i=0; $i < 3 ; $i++) { 
    for ($o=0; $o < 3 ; $o++) 
        {
        $suma = $suma + $num[$o][$i]; //guarda en la suma cada elemento de la fila     
    }   
    $sumaC[$i] = $suma;//guarda en array la suma de la fila
    $suma = 0;//la variable suma se inicializa
}

foreach ($sumaF as $s){
    echo $s;
    echo "<br>";

}
echo "La suma de las columnas";
foreach ($sumaC as $s){
    echo $s;
    echo "<br>";

}

?>
    
</body>
</html>