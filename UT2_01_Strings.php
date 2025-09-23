<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ1-Conversion IP Decimal a Binario</title>
</head>
<body>
    <h1>Cambio IP a Binario</h1>
    <?php 
        $ip="192.18.16.204";
        $inicial = 0;

        $b1 = strpos ($ip, ".", $inicial);
        $byte1 = substr($ip, $inicial, $b1 - $inicial);

        $inicial = $b1 + 1;
        $b2 = strpos($ip, ".", $inicial);
        $byte2 = substr($ip, $inicial, $b2 - $inicial);

        $inicial = $b2 + 1;
        $b3 = strpos($ip, ".", $inicial);
        $byte3 = substr($ip, $inicial, $b3 - $inicial);

        $inicial = $b3 + 1;
        $byte4 = substr($ip, $inicial);

        printf("%08b.%08b.%08b.%08b", $byte1, $byte2, $byte3, $byte4);
 
    ?> 
</body>
</html>