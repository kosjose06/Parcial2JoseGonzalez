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
    <title>Estadísticas del Equipo</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php include 'header.php'; ?>
    <h1>Estadísticas del Equipo</h1>

    <?php
    $conexion = new mysqli("localhost", "root", "", "futbolamericano_db");

    // conexión
    if ($conexion->connect_error) {
        die("Error de conexión a la base de datos: " . $conexion->connect_error);
    }

    // Consultar la base de datos para obtener las estadísticas del rendimiento de los equipos
    $sql = "SELECT e.nombre as nombre_equipo,
                   p.equipo_id, 
                   SUM(p.partidos_jugados) as total_partidos,
                   SUM(p.victorias) as total_victorias,
                   SUM(p.derrotas) as total_derrotas,
                   SUM(p.empates) as total_empates
            FROM Partidos p
            JOIN Equipos e ON p.equipo_id = e.equipo_id
            GROUP BY p.equipo_id";

    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        // Mostrar la tabla de estadísticas
        echo "<table>";
        echo "<tr><th>Nombre del Equipo</th><th>Total de Partidos Jugados</th><th>Total de Victorias</th><th>Total de Derrotas</th><th>Total de Empates</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["nombre_equipo"] . "</td>";
            echo "<td>" . $row["total_partidos"] . "</td>";
            echo "<td>" . $row["total_victorias"] . "</td>";
            echo "<td>" . $row["total_derrotas"] . "</td>";
            echo "<td>" . $row["total_empates"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No se encontraron estadísticas del rendimiento de los equipos.";
    }
    $conexion->close();
    ?>
</body>
</html>
