<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta Categorias</title>
</head>
<body>
    <form method="post">
        Nombre categoría: <input type="text" name="nombre" required>
        <br><br>
        <input type="submit" value="Crear">
        <input type="reset" value="Borrar">
    </form>
</body>
</html>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$nombre = $_POST["nombre"]; //entrada del nombre

try {
    //CONEXION CON LA BASE DE DATOS
    $conn = new PDO("mysql:host=localhost;dbname=COMPRASWEB", "root", "rootroot");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //SELECCIONAR LA ULTIMA CATEGORIA
    $ultima = $conn->query("SELECT MAX(ID_CATEGORIA) as maximo FROM CATEGORIA");
    $resultado = $ultima->fetch(PDO::FETCH_ASSOC); //lo guardo en una variable
    
    //asigno la categoria
    if($resultado["maximo"] == null){
        $nuevo_id = "C-001";
    }
    else{
        // Extraer solo número: de "C-007" sacar "007"
        $numero = intval(substr($resultado["maximo"], 2));
        $numero++; // siguiente número
        $nuevo_id = "C-" . str_pad($numero, 3, "0", STR_PAD_LEFT);
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