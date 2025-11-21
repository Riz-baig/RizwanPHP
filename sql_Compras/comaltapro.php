<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta Productos</title>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Nombre del Producto: <input type="text" name="nombre" required>
        Precio del Producto: <input type="number" step="0.01" name="precio" required> <!--step hace que pueda añadir nueros reales-->
        categoria del producto
    <?php
        include_once 'fun_Compras.php';

        try {
        // Conexión
        $conn = conexion();
        // Cargao todas las categorias y los guardo en un array asociativo llamado $resultado
        $categorias = $conn->query("SELECT ID_CATEGORIA, NOMBRE FROM CATEGORIA");
        $resultado = $categorias->fetchAll(PDO::FETCH_ASSOC); // <-- AQUÍ guardo el array asociativo

        // Crear el desplegable
        echo '<select name="categoria" id="categoria">';

        foreach ($resultado as $campo) {
        echo '<option value="' . $campo['ID_CATEGORIA'] . '">' . $campo['NOMBRE'] . '</option>';
        }

        echo '</select>';

        } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        }
    ?>

    <br><br>
        <input type="submit" value="Crear">
        <input type="reset" value="Borrar">
    </form>
<!--Alta de Productos (comaltapro.php): dar de alta productos. Para seleccionar la categoría del 
producto, se utilizará una lista de valores con los nombres de las categorías. El id_producto 
será un campo con el formato Pxxxx donde xxxx será un número secuencial que comienza en 
1 completándose con 0 hasta completar el formato (este campo será calculado desde PHP).-->
</body>
</html>


<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nombre = limpiar($_POST["nombre"]); //entrada del nombre
        $precio = limpiar($_POST["precio"]); //entrada del nombre
        $categoria = $_POST["categoria"];
    try {
        //CONEXION CON LA BASE DE DATOS
        $conn = conexion();
        //funcion que crea los Ids de los productos
        $nuevo_id = ID_Producto($conn);

        // 2) Insertar producto en la base de datos
        $insert = $conn->prepare("INSERT INTO PRODUCTO (ID_PRODUCTO, NOMBRE, PRECIO, ID_CATEGORIA) VALUES (:id, :nombre, :precio, :idc)");
        $insert->bindParam(":id", $nuevo_id); //bindParam evita inyeccion de codigo
        $insert->bindParam(":nombre", $nombre);
        $insert->bindParam(":precio", $precio);
        $insert->bindParam(":idc", $categoria);

        $insert->execute();
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
}
}
?>