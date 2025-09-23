<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
$num = 168;
print("Numero en decimal: ".$num. "<br>");
$binario = "";

while ($num > 0) 
    {
    $residuo = $num % 2;             
    $binario = $residuo . $binario;  
    $num = floor($num / 2);          
    }

echo "Binario: " . $binario;
?>  
</body>
</html>