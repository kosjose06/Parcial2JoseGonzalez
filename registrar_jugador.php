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
    <title>Registrar Jugador</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <h1>Registrar Jugador</h1>

    <?php
    // Procesar el formulario cuando se envíe
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $conexion = new mysqli("localhost", "root", "", "futbolamericano_db");

        if ($conexion->connect_error) {
            die("Error de conexión a la base de datos: " . $conexion->connect_error);
        }

        // Recopilar datos del formulario
        $equipoId = $_POST["equipo_id"];
        $nombreJugador = $_POST["nombre_jugador"];
        $numeroJugador = $_POST["numero_jugador"];
        $posicionJugador = $_POST["posicion_jugador"];

        // Insertar datos en la tabla Jugadores
        $sql = "INSERT INTO Jugadores (equipo_id, nombre, numero, posicion) VALUES ($equipoId, '$nombreJugador', $numeroJugador, '$posicionJugador')";
        
        if ($conexion->query($sql) === TRUE) {
            echo "<p>Jugador registrado exitosamente.</p>";
        } else {
            echo "Error al registrar jugador: " . $conexion->error;
        }

        $conexion->close();
    }
    ?>

    <!-- Formulario de registro de jugador -->

    <section  class="form-container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="equipo_id">Equipo:</label>
      <select class="box" name="equipo_id" required>
            <option value="1">Miami Dolphins.</option>
            <option value="2">Atlanta Falcons.</option>
            <option value="3">Baltimore Ravens.</option>
            <option value="4">Buffalo Bills</option>
            <option value="5">Carolina Panthers.</option>
            <option value="6">New England Patriots</option>
            <option value="7">Kansas City Chiefs.</option>
            <option value="8">Pittsburgh Steelers.</option>
            <option value="9">Green Bay Packers.</option>
            <option value="10">San Francisco 49ers.</option>
        </select><br>   
        <input type="text" name="nombre_jugador" required placeholder="nombre jugador" class="box" maxlength="50"><br>
        <input type="number" name="numero_jugador" required placeholder="numero jugador" class="box" maxlength="50"><br>
        <input type="text" name="posicion_jugador" required placeholder="Posición del Jugador" class="box" maxlength="50"><br>
        <input type="submit"  class="btn" value="Registrar Jugador">
    </form>
    </section>

</body>
</html>
