<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <style>
    h1 {
      background-color: aqua;
      text-align: center;
    }
    body {
      background-color: burlywood;
    }
  </style>
  <body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <h1>---☻---Operaciones Ficheros---☻---</h1>

      <div>
        <div style="display: flex">
          <label for="ruta">Fichero (Path/nombre)</label>
          <input type="text" name="ruta" id="ruta" />
        </div>
        <br /><br /><br /><br />

        <input type="submit" value="Ver Datos Fichero" />
        <input type="reset" value="Borrar" />


      </div>
    </form>


    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fich = $_POST["ruta"];

      echo "<p>Nombre del fichero :". basename($fich). "</p>";
      echo "<p>Directorio: ". realpath($fich). "</p>";
      echo "<p>Tamaño del fichero: ". filesize($fich)."</p>" ;
      echo "<p>fecha ultima modificación fichero: ". filectime($fich)."</p>" ;

    }
    ?>
  </body>
</html>