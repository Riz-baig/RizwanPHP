<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aprovisionamiento</title>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Cantidad: <input type="text" name="cantidad" required>
        Elegir el producto: 
    <?php //CONEXION PARA ELEGIR EL PRODUCTO
        include_once 'fun_Compras.php';
        try {
        // Conexión
        $conn = conexion();
        // Cargao todas las categorias y los guardo en un array asociativo llamado $resultado
        $producto = $conn->query("SELECT ID_PRODUCTO, NOMBRE FROM PRODUCTO");
        $resultado = $producto->fetchAll(PDO::FETCH_ASSOC); // <-- AQUÍ guardo el array asociativo

        // Crear el desplegable
        echo '<select name="producto" id="producto">';

        foreach ($resultado as $campo) {
        echo '<option value="' . $campo['ID_PRODUCTO'] . '">' . $campo['NOMBRE'] . '</option>';
        }

        echo '</select>';

        } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        }
    ?>
    
        Elegir el almacen: 
    <?php //CONEXION PARA ELEGIR EL ALMACEN
        try {
        // Conexión
        // Cargao todas las categorias y los guardo en un array asociativo llamado $resultado
        $alm = $conn->query("SELECT NUM_ALMACEN, LOCALIDAD FROM ALMACEN");
        $resultado = $alm->fetchAll(PDO::FETCH_ASSOC); // <-- AQUÍ guardo el array asociativo

        // Crear el desplegable
        echo '<select name="Almacen" id="Almacen">';

        foreach ($resultado as $campo) {
        echo '<option value="' . $campo['NUM_ALMACEN'] . '">' . $campo['LOCALIDAD'] . '</option>';
        }

        echo '</select>';

        } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        }
    ?>

    <br><br>
        <input type="submit" value="Añadir">
        <input type="reset" value="Borrar">
    </form>
</body>
</html>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $cantidad = limpiar($_POST["cantidad"]); //entrada de la cantidad
        $produ = $_POST["producto"];
        $almac = $_POST["Almacen"];
    try {

        // 2) Insertar producto en la base de datos
        $insert = $conn->prepare("INSERT INTO ALMACENA (NUM_ALMACEN, ID_PRODUCTO, CANTIDAD) VALUES (:numalm, :numpro, :can)");
        $insert->bindParam(":numalm", $almac); //bindParam evita inyeccion de codigo
        $insert->bindParam(":numpro", $produ);
        $insert->bindParam(":can", $cantidad);

        $insert->execute();
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
}
}
?>
