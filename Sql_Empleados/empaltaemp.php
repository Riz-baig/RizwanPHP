<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta Productos</title>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        DNI: <input type="text" name="dni" required><br><br>
        Nombre del Empleado: <input type="text" name="nombre" required><br><br>
        Apellido: <input type="text" name="apellido" required><br><br>
        Fecha de Nacimiento: <input type="date" name="fna" required><br><br>
        Salario: <input type="text" name="sal" required><br>

        Asignar el Departamento:
        <select name="cod_dpt" required>
    <?php
        include 'funciones_Empleados.php';
        $dept = seleccionarDepartamento();//recibe el array de departamentos

        foreach ($dept as $d) {
        echo '<option value="' . $d['cod_dpto'] . '">' . $d['nombre_dpto'] . '</option>';

    }
    ?>
    </select>

    <br><br>
        <input type="submit" value="Crear">
        <input type="reset" value="Borrar">
    </form>
</body>
</html>


<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $dni = limpiar($_POST["dni"]);
        $nombre = limpiar($_POST["nombre"]); //entrada del nombre
        $apellido = limpiar($_POST["apellido"]); //entrada del apellido
        $fna = limpiar($_POST["fna"]);
        $sal = limpiar($_POST["sal"]);
        $cod_dpt = limpiar($_POST["cod_dpt"]);
        $fecha_actual = date("Y-m-d");
        $fecha_final = null;
    try {
        //CONEXION CON LA BASE DE DATOS
        $conn = conexion();

        // Iniciar transacción
        $conn->beginTransaction();

        // Insertar empleado en la base de datos
        $insert = $conn->prepare("INSERT INTO empleado (dni, nombre, apellidos, fecha_nac, salario) VALUES (:dni, :nombre, :apellido, :fecha_nac, :salario)");
        $insert->bindParam(":dni", $dni); //bindParam evita inyeccion de codigo
        $insert->bindParam(":nombre", $nombre);
        $insert->bindParam(":apellido", $apellido);
        $insert->bindParam(":fecha_nac", $fna);
        $insert->bindParam(":salario", $sal);

        //insertar emple_deart
        $insert1 = $conn->prepare("INSERT INTO emple_depart (dni, cod_dpto, fecha_ini, fecha_fin) VALUES (:dni, :cod, :inicio, :final)");
        $insert1->bindParam(":dni", $dni); //bindParam evita inyeccion de codigo
        $insert1->bindParam(":cod", $cod_dpt);
        $insert1->bindParam(":inicio", $fecha_actual);
        $insert1->bindParam(":final", $fecha_final);


        $insert->execute();
        $insert1->execute();
        $conn->commit();//el commit
    }
    catch (PDOException $e) {
        //rollBack
        $conn->rollBack();
    
        echo "Error: " . $e->getMessage() . "<br>";
        // Código de error (SQLSTATE)
        echo "Código de error: " . $e->getCode() . "<br>";
        }
        $conn = null;
}
?>