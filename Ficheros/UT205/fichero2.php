<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Alumnos</title>
  </head>
  <body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <h1>Alumnos</h1>
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

if($_SERVER["REQUEST_METHOD"] == "POST") {

$nom = test_input($_POST["nombre"]);
$ape1 = test_input($_POST["apellido1"]);
$ape2 = test_input($_POST["apellido2"]);
$fna = test_input($_POST["fechaNacimiento"]);
$loca = test_input($_POST["localidad"]);

$datos = $nom."##".$ape1."##".$ape2."##".$fna."##".$loca;

$f1 = fopen("Alumnos2.txt", "a+");
fwrite($f1, $datos);
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






