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
    <title>Registro de Equipos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php include 'header.php'; ?>
<h1>Registro de Equipos</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $conexion = new mysqli("localhost", "root", "", "futbolamericano_db");

        if ($conexion->connect_error) {
            die("Error de conexión a la base de datos: " . $conexion->connect_error);
        }

        // Recopilar datos del formulario
        $nombreEquipo = $_POST["nombre_equipo"];
        $estadoEquipo = $_POST["estado_equipo"];
        $anoFundacion = $_POST["ano_fundacion"];
        $partidosJugados = $_POST["partidos_jugados"];
        $victorias = $_POST["victorias"];
        $derrotas = $_POST["derrotas"];
        $empates = $_POST["empates"];

        // Insertar datos en la tabla Equipos
        $sqlEquipo = "INSERT INTO Equipos (nombre, estado, ano_fundacion) VALUES ('$nombreEquipo', '$estadoEquipo', $anoFundacion)";
        if ($conexion->query($sqlEquipo) === TRUE) {
            $equipoId = $conexion->insert_id;

            // Insertar datos en la tabla Partidos
            $sqlPartidos = "INSERT INTO Partidos (equipo_id, partidos_jugados, victorias, derrotas, empates) VALUES ($equipoId, $partidosJugados, $victorias, $derrotas, $empates)";
            if ($conexion->query($sqlPartidos) !== TRUE) {
                echo "Error al insertar datos de partidos: " . $conexion->error;
            }
        } else {
            echo "Error al insertar datos de equipos: " . $conexion->error;
        }
        $conexion->close();
    }
    ?>

    <!-- Formulario de registro de equipos -->
    <section class="form-container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h3>Detalles del Equipo</h3>
        <input type="text" name="nombre_equipo" required placeholder="Nombre de equipo"class="box" maxlength="50"><br>
        <input type="text" name="estado_equipo"required placeholder="Estado de equipo"class="box" maxlength="50" ><br>
        <input type="number" name="ano_fundacion" required placeholder="Año de fundación"class="box" maxlength="50"><br>
        <h3>Detalles del Partido</h3>
        <input type="number" name="partidos_jugados" required placeholder="Partidos Jugados"class="box" maxlength="50"><br>
        <input type="number" name="victorias" required placeholder="Victorias"class="box" maxlength="50"><br>
        <input type="number" name="derrotas" required placeholder="Derrotas"class="box" maxlength="50"><br>
        <input type="number" name="empates" required placeholder="Empates"class="box" maxlength="50"><br>
        <input type="submit" class="btn" value="Registrar Equipo"><br>
    </form>
    </section>
</body>
</html>
