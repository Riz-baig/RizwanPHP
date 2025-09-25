<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ6B – Factorial</title>
</head>
<body>
    <?php

    $num = "5";
    $conta = $num;
    $resultado = 1;
    $iti = $num;

    while($conta > 1)
    {        
        $resultado = $resultado * $conta;
        $conta--;
            $iti =$iti."x".$conta;
    }

    echo "Factorial de !".$num. " = ".$iti." = ". $resultado;
    ?>  
</body>
</html>