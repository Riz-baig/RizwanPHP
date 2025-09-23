<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ2-Direccion Red – Broadcast y Rango</title>
</head>
<body>
    <p>a partir de la dirección <strong>IP</strong> y la máscara de red, obtener la dirección de red, la 
dirección de broadcast y el rango de IPs disponibles para los equipos </p><br>
    
<?php 
    $ip="192.168.16.100/16";
    print("IP inicial: ". $ip. "<br>");
    $inicial = 0;

    $b1 = strpos($ip, ".", $inicial);
    $byte1 = substr($ip, $inicial, $b1 - $inicial);

    $inicial = $b1 + 1;
    $b2 = strpos ($ip, ".", $inicial);
    $byte2 = substr($ip, $inicial, $b2 - $inicial);

    $inicial = $b2 + 1;
    $b3 = strpos ($ip, ".", $inicial);
    $byte3 = substr($ip, $inicial, $b3 - $inicial);

    $inicial = $b3 + 1;
    $b4 = strpos ($ip, "/", $inicial);
    $byte4 = substr($ip, $inicial, $b4 - $inicial);

    $inicial = 0;
    $masc = strpos($ip, "/", $inicial);
    $mascara = (int) substr($ip, $masc + 1);

    print("Mascara " . $mascara. "<br>");
    $ipBinario = ("%08b.%08b.%08b.%08b", $byte1, $byte2, $byte3, $byte4);
    print("IP en Binario: ". $ipBinario);
    print("<br>");


    $bits = str_repeat("1", $mascara);
    $mascaraBinario = str_pad($bits,32,"0",STR_PAD_RIGHT);
    print("Mascara en Binario". $mascaraBinario."<br>");

    print("Direccion Red: ")


    print("Direccion Broadcast: ")


?> 
</body>
</html>

