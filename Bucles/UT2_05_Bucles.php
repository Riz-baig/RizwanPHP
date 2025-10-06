<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> EJ5B – Tabla multiplicar con TD</title>
</head>
<body>

    
    <?php

    $num = 8;
    $conta = 1;
    $resultado = "";

    echo "<table style border = '1'>"; //no pude conseguir el borde como en l afoto del ejercicio
    while ($conta <= 10) 
    {
        $resultado = $num * $conta;
        $multi = $num." x ".$conta;
        echo "<tr><td>$multi</td><td>$resultado</td></tr>";
        $conta++;
    }
    echo "</table>"
    ?>   
</body>
</html>