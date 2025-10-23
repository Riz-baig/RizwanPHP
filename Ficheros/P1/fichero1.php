<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>fichero1</title>
  </head>
  <body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <h1>Formulario</h1>
      <label for="nombre">Nombre</label>
      <input type="text" name="nombre" id="nombre" /><br />

      <label for="ape1">Primer apellido</label>
      <input type="text" name="apellido1" id="ape1" /><br />

      <label for="ape2">Segundo apellido</label>
      <input type="text" name="apellido2" id="ape2" /><br />

      <label for="fna">Fecha de Nacimiento</label>
      <input type="text" name="fechaNacimiento" id="fna" /><br />

      <label for="loca">Localidad</label>
      <input type="text" name="localidad" id="loca" /><br />

      <button type="submit">Enviar</button>
    </form>

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

$f1 = fopen("Alumnos1.txt", "a+");

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
  </body>
</html>




