<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consulta Stock</title>
</head>
<body>
    <h1>Consulta de Stock por Producto</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php 
    include_once 'fun_Compras.php';
    $conn = conexion();
    try {
        $producto = $conn->query("SELECT ID_PRODUCTO, NOMBRE FROM PRODUCTO");
        $resultado = $producto->fetchAll(PDO::FETCH_ASSOC); //carga el array asiciativo de todas las filas

        echo "Elige un producto: ";
        echo "<select name='producto'>";
        foreach ($resultado as $campo) {
            echo '<option value="' . $campo['ID_PRODUCTO'] . '">' . $campo['NOMBRE'] . '</option>';
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

    $prod = $_POST["producto"];

    try {

        $sql = "SELECT A.NUM_ALMACEN, A.LOCALIDAD, ifnull(AL.CANTIDAD, 0) as CANTIDAD
                from ALMACEN A, ALMACENA AL where A.NUM_ALMACEN = AL.NUM_ALMACEN
                and AL.ID_PRODUCTO = :prod";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":prod", $prod);
        $stmt->execute();

        $stock = $stmt->fetchAll(PDO::FETCH_ASSOC); //array asociativo que tiene resultado de sql
        
        echo "<h2>Stock del producto $prod</h2>";// MOSTRAR RESULTADOS EN TABLA

        echo "<table border='1' cellpadding='5'>";
        echo "<tr>
                <th>Almacén</th>
                <th>Localidad</th>
                <th>Cantidad</th>
              </tr>";

        foreach ($stock as $i) {
        echo "<tr>
            <td>" . $i['NUM_ALMACEN'] . "</td>
            <td>" . $i['LOCALIDAD'] . "</td>
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