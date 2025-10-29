<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>valor bursatil</title>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <h1>Valor bursátil</h1>

        <p>introduce el valor</p>
        <input type="text" name="valor" />
        <br /><br />
        <input type="submit" value="enviar" />
        <input type="reset" value="borrar" />
    </form>

<?php

    if($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        include_once "funciones_bolsa.php";
        $num = test_input($_POST["valor"]);
        $ruta = "ibex35.txt";
        valor_bursatil($num, $ruta);


    }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
    
</body>
</html>


