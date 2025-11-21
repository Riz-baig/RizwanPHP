<?php

//limpaia la entrada
function limpiar($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//conexion con base de datos
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

//genera id de productos
function ID_Producto($conn) {
    // Obtener el último ID de producto
    $productos = $conn->query("SELECT MAX(ID_PRODUCTO) AS id FROM PRODUCTO");
    $resultado = $productos->fetch(PDO::FETCH_ASSOC);

    if ($resultado["id"] == null) {   
        return "P0001";// Si no existe ningún producto
    } else {
        $numero = intval(substr($resultado["id"], 1));// Extraer el número después de la P intval lo convierte en entero
        $numero++;
        // Generar el nuevo ID
        return "P" . str_pad($numero, 4, "0", STR_PAD_LEFT);
    }
}

//genera id de Almacen
function ID_Alm($conn) {
    // Obtener el último ID de almacen
    $numAlm = $conn->query("SELECT MAX(NUM_ALMACEN) AS id FROM ALMACEN");
    $resultado = $numAlm->fetch(PDO::FETCH_ASSOC);

    if ($resultado["id"] == null) {   
        return "1";// Si no existe ningún almacen
    } else {
        $numero = intval($resultado["id"]);
        $numero++;
        return $numero;
    }
}



?>