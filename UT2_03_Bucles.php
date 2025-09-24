<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
$num="48";
 $base=”16”;

  while ($num > 0)
    {
        $residuo = $num % $base;
        $resultado = $residuo.$resultado;
        $num = floor($num / $base);
    }

    echo "Resultado: ". $resultado;
?>
    
</body>
</html>