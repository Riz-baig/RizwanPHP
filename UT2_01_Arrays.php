<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Tabla de Impares</title>
<style>
  table { border-collapse: collapse; }
  th, td { border: 1px solid #000; padding: 4px 8px; text-align: center; }
</style>
</head>
<body>

<table>
  <tr> 
    <th>Indice</th> <!-- con esto relleno la cabezera-->
    <th>Valor</th>
    <th>Suma</th>
  </tr>

<?php
$valor = 1;
$suma  = 0;

  for ($indice = 0; $indice < 20; $indice++) 
    {
      $suma += $valor;
      echo "<tr>";
      echo "<td>$indice</td>";//va llenando cada fila de la tabla
      echo "<td>$valor</td>";
      echo "<td>$suma</td>"; 
      echo "</tr>";
      $valor += 2; //el valor aumento de 2 en 2 para que solo sume impares.
    }
  ?>
</table>
</body>
</html>
