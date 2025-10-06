<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array inverso de binario</title>
</head>
<style>
  table { border-collapse: collapse; }
  th, td { border: 1px solid #000; padding: 4px 8px; text-align: center; }
</style>
<body>
    

<table>
    <tr> <!-- la cabeza de la tabla -->

        <th>Indice</th>
        <th>Binario</th>
        <th>Octal</th>
        <th>Invertido</th>       
    </tr>

<?php
$arrB = array();
$arrOc = array();
$arrInv = array();
$conta = 19;

for ($i=0; $i < 20; $i++) #bucle para modificar indice en binario y Octal
    { 
    $arrB[$i] = decbin($i); #de decimal a binario y guarda en aaray de binario
    $arrOc[$i] = decoct($i); #de decimal a octal y guarda en array de octal
    }

for ($i=0; $i < 20; $i++) { #bucle inverso para g
    $arrInv[$i] = decbin($conta);
    $conta--;
}

    for ($i=0; $i < 20; $i++) 
        { 
        echo "<tr>
        <td>".$i."</td>
        <td>".$arrB[$i]."</td>  
        <td>".$arrOc[$i]."</td>
        <td>".$arrInv[$i]."</td>
      </tr>";      
        }
   
?>

</table>
</body>
</html> 