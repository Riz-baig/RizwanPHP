<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {


    $num = test_input("numero");
    $slash = strpos($num, "/");
    $inicial = 0;

    $b1 = strpos ($num, "/", $inicial); //en $num cuenta desde 0 hasta la posicion de / y guarda en $b1
    $numero = substr($num, $inicial, $b1 - $inicial); //Guarda en $numero la parte del $num desde $inicial hasta $b1

    $inicial = $b1 + 1; //la variable inicial colocamos justo despues de la /
    $base = substr($num, iniocial);

    echo $numero, /n, $base;

}







function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



?>