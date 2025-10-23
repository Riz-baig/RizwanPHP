<?php
/*Programa fichero1.php: formulario que recoja los datos de alumnos y los almacene un fichero con
nombre alumnos1.txt (una fila por alumno). Los campos del fichero estarán separados por posiciones:
    Nombre: posición 1 a 40
    Apellido1: posición 41 a 81
    Apellido2: posición 82 a 123
    Fecha Nacimiento: posición 124 a 133
    Localidad: posición 134 a 160
Las posiciones no ocupadas se completarán con espacios.*/




if($_SERVER["REQUEST_METHOD"] == "POST") {

$f1 = fopen("fichero1.txt", "a+");

$nom = test_input($_POST["nombre"]);
$ape1 = test_input($_POST["apellido1"]);
$ape2 = test_input($_POST["apellido2"]);
$fna = test_input($_POST["fechaNacimiento"]);
$loca = test_input($_POST["localidad"]);

fseek($f1, 0);//coloca el puntero en la posicion 0 del archivpo $f1
fwrite($f1, str_pad($nom, 40, " ", STR_PAD_RIGHT)); //esto rellena a la derecha de nombre con espacios, hasta llegar a 40

fseek($f1,40 );//apellido1
fwrite($f1, str_pad($ape1, 41, " ", STR_PAD_RIGHT));

fseek($f1, 81);//apellido2
fwrite($f1, str_pad($ape2, 42, " ", STR_PAD_RIGHT));


fseek($f1, 123);//fecha de nacimiento
fwrite($f1, str_pad($fna, 10," ", STR_PAD_RIGHT ));

fseek($f1, 133); //localidad
fwrite($f1, str_pad($loca, 27," ", STR_PAD_RIGHT ));

fwrite($f1, "\n");

fclose($f1);
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>