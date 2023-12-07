<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['id'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $id = $_GET['id'];

    $sentencia = $bd->prepare("SELECT * from empleados where id_empleado = ?;");
    $sentencia->execute([$id]);
    $empleados = $sentencia->fetch(PDO::FETCH_OBJ);

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" required 
                        value="<?php echo $empleados->nombre_empleado; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telefono: </label>
                        <input type="number" class="form-control" name="txtTel" autofocus required
                        value="<?php echo $empleados->tel_empleado; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Puesto: </label>
                        <input type="text" class="form-control" name="txtPuesto" autofocus required
                        value="<?php echo $empleados->puesto_empleado; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="id" value="<?php echo $empleados->id_empleado; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>