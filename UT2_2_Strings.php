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

    print("Mascara " . $mascara. "<br><br>");
    $ipBinario = sprintf("%08b.%08b.%08b.%08b", $byte1, $byte2, $byte3, $byte4);
    print("IP en Binario: ". $ipBinario);

    $ipBinario = str_replace(".", "", $ipBinario); //dejo la ip sin puntos
    print("<br> IP sin puntos: " .$ipBinario);
    print("<br>");

    $bits = str_repeat("1", $mascara); //$bits tiene cantidad de unos segun el numero de mascara que tenga
    $mascaraBinario = str_pad($bits,32,"0",STR_PAD_RIGHT); //de unos adelante rellena con 00 hasta longitud 32
    print("Mascara en Binario: ". $mascaraBinario."<br>");

    $red = "";
    $red = substr($ipBinario, 0, $mascara);
    $red = str_pad($red, 32, "0", STR_PAD_RIGHT);
     
    $bit1 = bindec(substr($red, 0, 8));
    $bit2 = bindec(substr($red, 8, 8));
    $bit3 = bindec(substr($red, 16, 8));
    $bit4 = bindec(substr($red, 24, 8));
    print("<br>Direccion Red: ". $bit1.".".$bit2. ".". $bit3. ".". $bit4. "<br>");

    $red2 = "";
    $red2 = substr($ipBinario, 0, $mascara);
    $red2 = str_pad($red2, 32, "1", STR_PAD_RIGHT);
    $bit5 = bindec(substr($red2, 0, 8));
    $bit6 = bindec(substr($red2, 8, 8));
    $bit7 = bindec(substr($red2, 16, 8));
    $bit8 = bindec(substr($red2, 24, 8));
    print("Direccion Broadcast: ". $bit5.".".$bit6. ".". $bit7. ".". $bit8. "<br>");

    $primera = long2ip(ip2long($bit1.".".$bit2.".".$bit3.".".$bit4) + 1);
    $ultima  = long2ip(ip2long($bit5.".".$bit6.".".$bit7.".".$bit8) - 1);
    print("Rango: $primera a $ultima<br>");

?> 
</body>

