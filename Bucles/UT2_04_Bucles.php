<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor decimal a base 6</title>
</head>
<body>

<?php
    $num = 8;
    $conta = 1;
    $resultado = "";

    while ($conta <= 10) 
    {
        $resultado = $num * $conta;
        print( $num. " x " . $conta. " = ". $resultado. "<br>");
        $conta++;
    }
    
?>    
</body>
</html>