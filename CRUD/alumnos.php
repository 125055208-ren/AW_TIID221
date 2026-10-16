
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

        td {
            border: 1px solid black;
            padding: 10px;
        }
    </style>
</head>
<body>

    <h1>TABLA DE ALUMNOS</h1>
    <table border="2">

    <thead>
        <tr>
            <td>id</td>
            <td>Matricula</td>
            <td>Nombre</td>
            <td>Apellido Paterno</td>
            <td>Apellido Materno</td>
            <td>Edad</td>
            <td>Acciones</td>
        </tr>

</thead>
<tbody>
    <tr>
        <td>1</td>
        <td>125055208</td>
        <td>Luisa Renata</td>
        <td>Olmos</td>
        <td>Uribe</td>
        <td>19</td>
        <td><a href="delete.php?id=1">Eliminar</a></td>
    </tr>
</tbody>
        

        <?php while($row = mysqli_fetch_array($query)){ ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['matricula']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['appaterno']; ?></td>
            <td><?php echo $row['apmaterno']; ?></td>
            <td><?php echo $row['edad']; ?></td>
            <td><a href="delete.php?id=<?php echo $row['matricula']; ?>">Eliminar</a></td>
        </tr>
        <?php } ?>
    </table>

</body>
</html>