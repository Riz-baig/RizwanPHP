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
        $conn = new PDO("mysql:host=localhost;dbname=empleados", "root", "rootroot");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Error al conectar: " . $e->getMessage();
        exit;
    }
}

//genera id de departaamento
function ID_Departamento($conn) {
    // Obtener el último ID de departamento
    $ultimo = $conn->query("SELECT max(cod_dpto) as maximo FROM departamento");
    $resultado = $ultimo->fetch(PDO::FETCH_ASSOC);

    if ($resultado["maximo"] == null) {   
        return "D001";// Si no existe ningún ningun departamento
    } else {
        $numero = intval(substr($resultado["maximo"], 1));// Extraer el número después de la D intval lo convierte en entero
        $numero++;
        // Generar el nuevo ID
        return "D" . str_pad($numero, 3, "0", STR_PAD_LEFT);
    }
}

// Genera un desplegable con los departamentos
function seleccionarDepartamento() {
    try {
        $conn = conexion();
        $dept = $conn->query("SELECT cod_dpto, nombre_dpto FROM departamento");
        return $dept->fetchAll(PDO::FETCH_ASSOC); //devuelve el array
    } catch (PDOException $e) {
        return [];
    }
}



?>