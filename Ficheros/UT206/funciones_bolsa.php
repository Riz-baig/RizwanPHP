<?php
//lee fichero y muestra como tabla
function leer_dato($ruta)
{
        $fichero = fopen($ruta, "r");
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Valor</th>";
        echo "<th>Ultimo</th>";
        echo "<th>Var.%</th>";
        echo "<th>Var.</th>";
        echo "<th>AC.%Año</th>";
        echo "<th>Max</th>"; 
        echo "<th>Min</th>"; 
        echo "<th>Vol.</th>";
        echo "<th>Capit</th>";
        echo "</tr>"; 

        fgets($fichero);
        while (($linea = fgets($fichero)) !== false) { //mientras que la linea tenga texto.


            $valor     = trim(substr($linea, 0, 23));  
            $ultimo  = trim(substr($linea, 23, 9));    
            $var1  = trim(substr($linea, 32, 8));   
            $var2  = trim(substr($linea, 40, 8));   
            $acanno  = trim(substr($linea, 48, 12));  
            $max  = trim(substr($linea, 60, 9));
            $min  = trim(substr($linea, 69, 9));
            $vol  = trim(substr($linea, 78, 13));
            $capit  = trim(substr($linea, 91, 9));

            echo "<tr>";
            echo "<td>$valor</td>";
            echo "<td>$ultimo</td>";
            echo "<td>$var1</td>";
            echo "<td>$var2</td>";
            echo "<td>$acanno</td>";
            echo "<td>$max</td>";
            echo "<td>$min</td>";
            echo "<td>$vol</td>";
            echo "<td>$capit</td>";
            echo "</tr>";

        }
        fclose($fichero);
        echo "</table>";
}

//recibe parametro un valor bursatil
function valor_bursatil($num, $ruta)
{
        $fichero = fopen($ruta, "r");
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Valor</th>";
        echo "<th>Var.%</th>";
        echo "<th>Var.</th>";
        echo "<th>AC.%Año</th>";
        echo "<th>Max</th>"; 
        echo "<th>Min</th>"; 
        echo "<th>Vol.</th>";
        echo "<th>Capit</th>";
        echo "</tr>"; 

        fgets($fichero);
        while (($linea = fgets($fichero)) !== false) { //mientras que la linea tenga texto.

            $valor     = trim(substr($linea, 0, 23));  
            if($valor == $num){
            $ultimo  = trim(substr($linea, 23, 9));    
            $var1  = trim(substr($linea, 32, 8));   
            $var2  = trim(substr($linea, 40, 8));   
            $acanno  = trim(substr($linea, 48, 12));  
            $max  = trim(substr($linea, 60, 9));
            $min  = trim(substr($linea, 69, 9));
            $vol  = trim(substr($linea, 78, 13));
            $capit  = trim(substr($linea, 91, 9));

            echo "<tr>";
            echo "<td>$valor</td>";
            echo "<td>$ultimo</td>";
            echo "<td>$var1</td>";
            echo "<td>$var2</td>";
            echo "<td>$acanno</td>";
            echo "<td>$max</td>";
            echo "<td>$min</td>";
            echo "<td>$vol</td>";
            echo "<td>$capit</td>";
            echo "</tr>";
            }
        }
        fclose($fichero);
        echo "</table>";
}


?>