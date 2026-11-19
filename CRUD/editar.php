<?php
include("conexion.php");
$con = conectar();
$id = $_GET['id'];

$sql = "SELECT * FROM alumnos WHERE id='$id'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_array($query); 


if (isset($_POST['actualizar'])) {

    $matricula = $_POST['matricula'];
    $nombre = $_POST['nombre'];
    $apellido_p = $_POST['apellido_p'];
    $apellido_m = $_POST['apellido_m'];
    $edad = $_POST['edad'];

   
    $sql_update = "UPDATE alumnos SET matricula='$matricula', nombre='$nombre', apellido_p='$apellido_p', apellido_m='$apellido_m', edad='$edad' WHERE id='$id'";
    
    $query_update = mysqli_query($con, $sql_update);

    if ($query_update) {
        header("Location: alumnos.php");
        exit();
    } else {
        echo "Error al actualizar: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Alumno</title>
</head>
<body>
    <h2>EDITAR DATOS DEL ALUMNO</h2>

    <form action="editar.php?id=<?php echo $row['id']; ?>" method="POST">
        
        <input type="text" name="matricula" value="<?php echo $row['matricula']; ?>" placeholder="Matrícula" required>
        <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" placeholder="Nombre(s)" required>
        <input type="text" name="apellido_p" value="<?php echo $row['apellido_p']; ?>" placeholder="Apellido Paterno" required>
        <br><br>
        <input type="text" name="apellido_m" value="<?php echo $row['apellido_m']; ?>" placeholder="Apellido Materno">
        <input type="number" name="edad" value="<?php echo $row['edad']; ?>" placeholder="Edad" required>
        
        <button type="submit" name="actualizar">Guardar Cambios</button>
        <a href="alumnos.php"><button type="button">Cancelar</button></a>
    </form>

</body>
</html>