<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genera Tabla</title>
    <style>
    h1 {
      background-color: aqua;
      text-align: center;
    }
    body {
      background-color: burlywood;
    }
  </style>
</head>
<body>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <h1>---☻---Operaciones Ficheros---☻---</h1>

      <div>
        <div style="display: flex">
          <label for="ruta">Fichero (Path/nombre)</label><!--indica la ruta--> 
          <input type="text" name="ruta" id="ruta" />
        </div>
        <br /><br />
        <p>Operaciones</p>
        
<!-- Muestra todo el documento -->
    <input type="radio" name="opcion" value="mostrar" id="mostrar" /> 
    <label for="mostrar">Mostrar fichero</label><br />

<!-- Muestra la línea seleccionada -->
    <label for="mostrarLinea">
    <input type="radio" name="opcion" value="mostrarLinea" id="mostrarLinea" />
    Mostrar línea
    </label>
    <input type="text" name="num_linea" size="3" />
    <label>fichero</label><br />

<!-- Muestra las primeras seleccionadas -->
    <label for="lineasRadio">
    <input type="radio" name="opcion" value="mostrarLineas" id="lineasRadio" />
    Mostrar
    </label>
    <input type="text" name="num_lineas" size="3" id="lineas" />
    <label>primeras líneas</label><br /><br /><br />


        <input type="submit" value="enviar" />
        <input type="reset" value="borrar" />
      </div>
    </form>

<?php
//mostrar todo el documeto
function mostrar(){
    global $fich;
    $fichero = fopen($fich, "r");
    while (($linea = fgets($fichero)) !== false) {
        $datos = explode("##", $linea);
        echo "<tr>";
        echo "<td>".$datos[0]."</td>";
        echo "<td>".$datos[1]."</td>";
        echo "<td>".$datos[2]."</td>";
        echo "<td>".$datos[3]."</td>";
        echo "<td>".$datos[4]."</td>";
        echo "</tr>";
    }
    echo "</table>";
    fclose($fichero);
}

//muestra solo una linea del documeto
function mostrarLinea(){
    global $fich;
    $num = (int)($_POST["num_linea"] ?? 0);
    $conta = 1; // para que la línea 1 sea la primera
    $fichero = fopen($fich, "r");
    while (($linea = fgets($fichero)) !== false) {
        if ($num === $conta) {
            $datos = explode("##", $linea);
            echo "<tr>";
            echo "<td>".$datos[0]."</td>";
            echo "<td>".$datos[1]."</td>";
            echo "<td>".$datos[2]."</td>";
            echo "<td>".$datos[3]."</td>";
            echo "<td>".$datos[4]."</td>";
            echo "</tr>";
            break; // ya encontramos la línea
        }
        $conta++;
    }
    echo "</table>";
    fclose($fichero);
}

//muestra las primeras x lineas
function mostrarLineas(){
    global $fich;
    $num = (int)($_POST["num_lineas"] ?? 0);
    $conta = 1;
    $fichero = fopen($fich, "r");
    while (($linea = fgets($fichero)) !== false) {
        if ($conta <= $num) { // <= para mostrar exactamente $num líneas
            $datos = explode("##", $linea);
            echo "<tr>";
            echo "<td>".$datos[0]."</td>";
            echo "<td>".$datos[1]."</td>";
            echo "<td>".$datos[2]."</td>";
            echo "<td>".$datos[3]."</td>";
            echo "<td>".$datos[4]."</td>";
            echo "</tr>";
        } else {
            break;
        }
        $conta++;
    }
    echo "</table>";
    fclose($fichero);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fich = $_POST["ruta"];

    if (!is_readable($fich)) {
        echo "<p style='color:red;'>No se puede abrir el fichero $fich</p>";
    } else {
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Nombre</th>";
        echo "<th>Apellido 1</th>";
        echo "<th>Apellido 2</th>";
        echo "<th>Fecha Nacimiento</th>";
        echo "<th>Localidad</th>";
        echo "</tr>";

        $mostrar = $_POST["opcion"];
        if ($mostrar == "mostrar") {
            mostrar();
        } elseif ($mostrar == "mostrarLinea") {
            mostrarLinea();
        } elseif ($mostrar == "mostrarLineas") {
            mostrarLineas();
        }
    }
}
?>

    
</body>
</html>