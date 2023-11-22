<?php
session_start();


if (!isset($_SESSION["autenticado"]) || $_SESSION["autenticado"] !== true) {
    header("Location: login.php");
    exit();
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Equipos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php include 'header.php'; ?>
    <h1>Listado de Equipos</h1>

    <?php
    $conexion = new mysqli("localhost", "root", "", "futbolamericano_db");
    if ($conexion->connect_error) {
        die("Error de conexión a la base de datos: " . $conexion->connect_error);
    }
    $sql = "SELECT * FROM Equipos";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        // la tabla de equipos
        echo "<table>";
        echo "<tr><th>ID</th><th>Nombre del Equipo</th><th>Estado</th><th>Año de Fundación</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["equipo_id"] . "</td>";
            echo "<td><a href='detalles_equipo.php?equipo_id=" . $row["equipo_id"] . "'>" . $row["nombre"] . "</a></td>";
            echo "<td>" . $row["estado"] . "</td>";
            echo "<td>" . $row["ano_fundacion"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No se encontraron equipos.";
    }

    $conexion->close();
    ?>
</body>
</html>
