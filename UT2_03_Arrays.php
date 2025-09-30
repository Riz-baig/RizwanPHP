<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<style>
  table { border-collapse: collapse; }
  th, td { border: 1px solid #000; padding: 4px 8px; text-align: center; }
</style>
<body>
    

<table>
    <tr>
        <th>Indice</th>
        <th>Binario</th>
        <th>Octal</th>
    </tr>

<?php
$arrB = array();
$arrOc = array();
$binario = 0;
$oc =  0;

for ($i=0; $i < 20; $i++) 
    { 
    $binario = decbin($i);
    $arrB[$i] = $binario;
    $oc = decoct($i);
    $arrOc[$i] = $oc;
    }


    for ($i=0; $i < 20; $i++) 
        { 
        echo "<tr>
        <td>".$i."</td>
        <td>".$arrB[$i]."</td>  
        <td>".$arrOc[$i]."</td>
      </tr>";      
        }
   
?>

</table>
</body>
</html> 