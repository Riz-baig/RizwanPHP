<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta Almacen</title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        Nombre de Localidad: <input type="text" name="nombre" required>
        <br><br>
        <input type="submit" value="Crear">
        <input type="reset" value="Borrar">
    </form>
</body>
</html>

<?php
//Alta de Almacenes (comaltaalm.php): dar de alta almacenes en diferentes localidades. El 
//número de almacén será un número secuencial. 

include_once 'fun_Compras.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$nombre = limpiar($_POST["nombre"]); //entrada del nombre de almacen

try {
    //CONEXION CON LA BASE DE DATOS
    $conn = conexion();

    //SELECCIONAR el último almacen
    $id = ID_Alm($conn);
       
    // 2) Insertar almacen en la base de datos
    $insert = $conn->prepare("INSERT INTO ALMACEN (NUM_ALMACEN, LOCALIDAD) VALUES (:id, :nombre)");
    $insert->bindParam(":id", $id); //bindParam evita inyeccion de codigo
    $insert->bindParam(":nombre", $nombre);

    $insert->execute();
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
}
?>