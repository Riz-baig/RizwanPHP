 

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consulta Stock en Almacen concreto</title>
</head>
<body>
    <h1>Consulta de Stock por Almacén</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php 
    include_once 'fun_Compras.php';
    $conn = conexion();
    try {
        $almacen = $conn->query("SELECT NUM_ALMACEN, LOCALIDAD FROM ALMACEN");
        $resultado = $almacen->fetchAll(PDO::FETCH_ASSOC); //carga el array asiciativo de todas las filas

        echo "Elige un Almacen: ";
        echo "<select name='almacen'>";
        foreach ($resultado as $campo) {
            echo '<option value="' . $campo['NUM_ALMACEN'] . '">' . $campo['LOCALIDAD'] . '</option>';
    }
        echo "</select>";
}   catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
}
?>
<br><br>
<input type="submit" value="Mostrar">
</form>
    
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $alma = $_POST["almacen"];

    try {
        //Consulta de Almacenes (comconsalm.php): se mostrarán los almacenes en un desplegable 
        //y se mostrará la información de los productos disponibles en el almacén seleccionado.

        $sql = "SELECT A.NUM_ALMACEN, A.ID_PRODUCTO, ifnull(A.CANTIDAD, 0) AS CANTIDAD,
                B.NOMBRE FROM ALMACENA A, PRODUCTO B WHERE A.ID_PRODUCTO = B.ID_PRODUCTO
                AND A.NUM_ALMACEN = :alma";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":alma", $alma);
        $stmt->execute();

        $stock = $stmt->fetchAll(PDO::FETCH_ASSOC); //array asociativo que tiene resultado de sql
        
        echo "<h2>Stock del almacen $alma</h2>";// MOSTRAR RESULTADOS EN TABLA

        echo "<table border='1' cellpadding='5'>";
        echo "<tr>
                <th>Almacén</th>
                <th>Producto</th>
                <th>Cantidad</th>
              </tr>";

        foreach ($stock as $i) {
        echo "<tr>
            <td>" . $i['NUM_ALMACEN'] . "</td>
            <td>" . $i['NOMBRE'] . "</td>
            <td>" . $i['CANTIDAD'] . "</td>
          </tr>";
        }
        echo "</table>";

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
</body>
</html>