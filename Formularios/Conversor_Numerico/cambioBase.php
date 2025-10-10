<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $decimal = test_input($_POST["decimal"]);
    $seleccion = test_input($_POST["convierte"]);

    echo "<h1>---☻---RESULTADO---☻---</h1><br>";
    switch($seleccion){
        case "binario":
            echo "el numero binario es: ", decbin($decimal);
            break;
        case "octal":
            echo "el numero Octal es: ", decoct($decimal);
            break;
        case "hexadecimal":
            echo "el numero Hexadecimal es: ", dechex($decimal);
            break;
        case "todos":
            echo "el numero binario es: ", decbin($decimal), "<br><br>";
            echo "el numero Octal es: ", decoct($decimal), "<br><br>";
            echo "el numero Hexadecimal es: ", dechex($decimal);
            break;
    }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>