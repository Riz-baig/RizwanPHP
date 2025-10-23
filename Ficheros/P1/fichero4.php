<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genera Tabla</title>
</head>
<body>

    <?php


        $fichero = fopen("Alumnos2.txt", "r");
        $conta = 0;
        $posicion = 0;
        $inicial = 0;

        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Nombre</th>";
        echo "<th>Apellido 1</th>";
        echo "<th>Apellido 2</th>";
        echo "<th>Fecha Nacimiento</th>";
        echo "<th>Localidad</th>";  
        echo "</tr>"; 

        while (($linea = fgets($fichero)) !== false) { //mientras que la linea tenga texto.


            $datos = explode("##", $linea)  
            $conta++;

            echo "<tr>";
            echo "<td>".$datos[0]."</td>";
            echo "<td>".$datos[1]."</td>";
            echo "<td>".$datos[2]."</td>";
            echo "<td>".$datos[3]."</td>";
            echo "<td>".$datos[4]."</td>";
            echo "</tr>";

        }

        print("tu fichero tiene ".$conta. " registros");
        fclose($fichero);
        echo "</table>";
    ?>
    
</body>
</html>