<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta Categorias</title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        Nombre Departamento: <input type="text" name="nombre" required>
        <br><br>
        <input type="submit" value="Crear">
        <input type="reset" value="Borrar">
    </form>
</body>
</html>
<?php

include 'funciones_Empleados.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$nombre = limpiar($_POST["nombre"]); //entrada del nombre

try {
    //CONEXION CON LA BASE DE DATOS
    $conn = conexion();
    // Iniciar transacción
    $conn->beginTransaction();
    //asignar la id
    $id = ID_Departamento($conn);
    

    // 2) Insertar categoría en la base de datos
    $insert = $conn->prepare("INSERT INTO departamento (cod_dpto, nombre_dpto) VALUES (:id, :nombre)");
    $insert->bindParam(":id", $id); //bindParam evita inyeccion de codigo
    $insert->bindParam(":nombre", $nombre);

    $insert->execute();

    // Si todo va bien, confirmamos la transacción
    $conn->commit();
} catch (PDOException $e) {
    //rollBack
    $conn->rollBack();

    echo "Error: " . $e->getMessage() . "<br>";
    // Código de error (SQLSTATE)
    echo "Código de error: " . $e->getCode() . "<br>";
    }
    $conn = null;
}
?>