<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta Categorias</title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        Nombre categoría: <input type="text" name="nombre" required>
        <br><br>
        <input type="submit" value="Crear">
        <input type="reset" value="Borrar">
    </form>
</body>
</html>


<?php

include 'fun_Compras.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$nombre = limpiar($_POST["nombre"]); //entrada del nombre

try {
    //CONEXION CON LA BASE DE DATOS
    $conn = new PDO("mysql:host=localhost;dbname=COMPRASWEB", "root", "rootroot");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //SELECCIONAR LA ULTIMA CATEGORIA
    $ultima = $conn->query("SELECT MAX(ID_CATEGORIA) as maximo FROM CATEGORIA");
    $resultado = $ultima->fetch(PDO::FETCH_ASSOC); //lo guardo en una variable
    
    //asigno la categoria
    function conexion() {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=COMPRASWEB", "root", "rootroot");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Error al conectar: " . $e->getMessage();
            exit;
        }
    }
    // 2) Insertar categoría en la base de datos
    $insert = $conn->prepare("INSERT INTO CATEGORIA (ID_CATEGORIA, NOMBRE) VALUES (:id, :nombre)");
    $insert->bindParam(":id", $nuevo_id); //bindParam evita inyeccion de codigo
    $insert->bindParam(":nombre", $nombre);

    $insert->execute();
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
}
?>