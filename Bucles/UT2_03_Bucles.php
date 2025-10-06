<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor decimal a base 6</title>
</head>
<body>

<?php
    $num = 48;
    $resultado = "";

    while ($num > 0) {
        $residuo = $num % 16;

        if ($residuo < 10) {
            $resultado = $residuo . $resultado;
        } else {           
            $resultado = chr(55 + $residuo) . $resultado;
            //La función char devulve letras de 65=A, 66=B etc. por eso sumamos 55 con el residuo
            //que nos devuelve una letra y guardamos en $resultado.
            // 10 -> A, 11 -> B, ..., 15 -> F
        }

        $num = floor($num / 16);
    }
    echo "Resultado: " . $resultado;
?>    
</body>
</html>