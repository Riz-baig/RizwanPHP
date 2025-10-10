
<?php
    $op1 = floatval($_POST["operando1"]);
    $op2 = floatval($_POST["operando2"]);
    $operacion = $_POST["operacion"];
    $resultado = "";

    switch ($operacion) {
        case "suma":
            $resultado = $op1 + $op2;
            break;
        case "resta":
            $resultado = $op1 - $op2;
            break;
        case "producto":
            $resultado = $op1 * $op2;
            break;
        case "division":
            if ($op2 != 0) {
                $resultado = $op1 / $op2;
            } else {
                $resultado = "Error: división entre 0";
            }
            break;
        default:
            $resultado = "Operación no válida";
    }

    echo "<h1>Resultado de la operación: $resultado</h1>";
?>
