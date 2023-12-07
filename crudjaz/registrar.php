<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtTel"]) || empty($_POST["txtPuesto"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $nombre_empleado = $_POST["txtNombre"];
    $tel_empleado = $_POST["txtTel"];
    $puesto_empleado = $_POST["txtPuesto"];
    
    $sentencia = $bd->prepare("INSERT INTO empleados (nombre_empleado, tel_empleado, puesto_empleado) VALUES (?,?,?);");
    $resultado = $sentencia->execute([$nombre_empleado,$tel_empleado,$puesto_empleado]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>