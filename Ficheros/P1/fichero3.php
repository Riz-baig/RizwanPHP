<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genera Tabla</title>
</head>
<body>

    <?php


        $fichero = fopen("Alumnos1.txt", "r");
        $conta = 0;

        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Nombre</th>";
        echo "<th>Apellido 1</th>";
        echo "<th>Apellido 2</th>";
        echo "<th>Fecha Nacimiento</th>";
        echo "<th>Localidad</th>";  
        echo "</tr>"; 

        while (($linea = fgets($fichero)) !== false) { //mientras que la linea tenga texto.

            $nom     = trim(substr($linea, 0, 40));  
            $ape1  = trim(substr($linea, 40, 41));    
            $ape2  = trim(substr($linea, 81, 42));   
            $fna  = trim(substr($linea, 123, 10));   
            $loca  = trim(substr($linea, 133, 27));  
            $conta++;

            echo "<tr>";
            echo "<td>$nom</td>";
            echo "<td>$ape1</td>";
            echo "<td>$ape2</td>";
            echo "<td>$fna</td>";
            echo "<td>$loca</td>";
            echo "</tr>";

        }

        fclose($fichero);
        echo "</table>";

                print("Tu fichero tiene ".$conta. " registros");

    ?>
    
</body>
</html>