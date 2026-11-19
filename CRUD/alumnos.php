
<?php
include("conexion.php");
$con = conectar();

$sql = "SELECT * FROM alumnos";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla de Alumnos</title>
    <style>
        table {
            border: 2px solid black;
            border-collapse: collapse;
            margin: 20px;
        }

        td, th {
            border: 1px solid black;
            padding: 10px;
        }
    </style>
</head>
<body>

    <h1>TABLA DE ALUMNOS</h1>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Matrícula</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Edad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_array($query)){ ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['matricula']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['apellido_p']; ?></td> 
                    <td><?php echo $row['apellido_m']; ?></td>
                    <td><?php echo $row['edad']; ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $row['id']; ?>">Editar</a> | 
                        <a href="delete.php?id=<?php echo $row['id']; ?>">Eliminar</a>
                    </td>
                </tr> \
            <?php } ?>
        </tbody>
    </table>

    <h2>FORMULARIO</h2>
    <form action="insertar.php" method="POST">
        <input type="text" class="form-control" name="matricula" placeholder="Matrícula">
        <input type="text" class="form-control" name="nombre" placeholder="Nombre(s)">
        <input type="text" class="form-control" name="apellido_p" placeholder="Apellido Paterno">
        <input type="text" class="form-control" name="apellido_m" placeholder="Apellido Materno">
        <input type="text" class="form-control" name="edad" placeholder="Edad">
        <button type="submit">Guardar</button>
    </form>

</body>
</html>