<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>multiplos de 2 en array multidimensional</title>
</head>
<style>
  table { border-collapse: collapse; }
  th, td { border: 1px solid #000; padding: 4px 8px; text-align: center; }
</style>
<body>

<?php

$num = array();
$par = 0;

for ($i=0; $i < 3 ; $i++) { 
    for ($o=0; $o < 3 ; $o++) {
        $num[$i][$o] = $par+=2;
    }
    
}
echo "<table>";
for ($i = 0; $i < 3; $i++) { 
    echo "<tr>";
    for ($o = 0; $o < 3; $o++) {               
        echo "<td>" . $num[$i][$o] . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>
    
</body>
</html>