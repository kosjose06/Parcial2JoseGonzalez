
<?php
session_start();

if (isset($_GET['equipo_id']) && is_numeric($_GET['equipo_id'])) {
    $equipoIdSeleccionado = $_GET['equipo_id'];
    setcookie('ultimo_equipo_seleccionado', $equipoIdSeleccionado, time() + (86400 * 30), "/");
}


if (!isset($_SESSION["autenticado"]) || $_SESSION["autenticado"] !== true) {
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles del Equipo</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php include 'header.php'; ?>

    <?php
    // Verificar si se proporcionó un ID de equipo válido en la URL
    if (isset($_GET['equipo_id']) && is_numeric($_GET['equipo_id'])) {
        $equipoId = $_GET['equipo_id'];

        // Conectar a la base de datos (debes proporcionar tus propias credenciales)
        $conexion = new mysqli("localhost", "root", "", "futbolamericano_db");

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error de conexión a la base de datos: " . $conexion->connect_error);
        }

        // Obtener detalles del equipo
        $sqlEquipo = "SELECT * FROM Equipos WHERE equipo_id = $equipoId";
        $resultEquipo = $conexion->query($sqlEquipo);

        if ($resultEquipo->num_rows > 0) {
            $equipo = $resultEquipo->fetch_assoc();

            echo "<h1>Detalles del Equipo</h1>";
            echo "<p><strong>ID del Equipo:</strong> " . $equipo["equipo_id"] . "</p>";
            echo "<p><strong>Nombre del Equipo:</strong> " . $equipo["nombre"] . "</p>";
            echo "<p><strong>Estado:</strong> " . $equipo["estado"] . "</p>";
            echo "<p><strong>Año de Fundación:</strong> " . $equipo["ano_fundacion"] . "</p>";

            // Obtener la plantilla de jugadores
            $sqlJugadores = "SELECT * FROM Jugadores WHERE equipo_id = $equipoId";
            $resultJugadores = $conexion->query($sqlJugadores);

            if ($resultJugadores->num_rows > 0) {
                // Mostrar la tabla de jugadores
                echo "<h1>Plantilla de Jugadores</h1>";
                echo "<table>";
                echo "<tr><th>Nombre</th><th>Número</th><th>Posición</th></tr>";

                while ($jugador = $resultJugadores->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $jugador["nombre"] . "</td>";
                    echo "<td>" . $jugador["numero"] . "</td>";
                    echo "<td>" . $jugador["posicion"] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "<p>No hay jugadores registrados en la plantilla.</p>";
            }
        } else {
            echo "<p>No se encontró el equipo con ID $equipoId.</p>";
        }
        $conexion->close();
    } else {
        echo "<p>ID de equipo no válido.</p>";
    }
    ?>
</body>
</html>
