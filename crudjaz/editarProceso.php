<?php
    print_r($_POST);
    if(!isset($_POST['id_empleado'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $id = $_POST['id'];
    $nombre_empleado = $_POST["txtNombre"];
    $tel_empleado = $_POST["txtTel"];
    $puesto_empleado = $_POST["txtPuesto"];

    $sentencia = $bd->prepare("UPDATE empleados SET nombre_empleado = ?, tel_empleado = ?, puesto_empleado = ? where id_empleado = ?;");
    $resultado = $sentencia->execute([$nombre_empleado, $tel_empleado, $puesto_empleado, $id]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>