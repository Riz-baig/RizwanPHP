<?php
$decimal = test_input($_POST["decimal"]);

$bin = decbin($decimal);




function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

echo "El numero binario es: ".$bin;

?>