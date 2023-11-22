<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conexion = new mysqli("localhost", "root", "", "futbolamericano_db");


    if ($conexion->connect_error) {
        die("Error de conexión a la base de datos: " . $conexion->connect_error);
    }

    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    // base de datos para obtener las credenciales del usuario
    $sql = "SELECT usuario_id, nombre_usuario, contrasena FROM Usuarios WHERE nombre_usuario = '$usuario'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $contrasenaHash = $fila["contrasena"];

        if (password_verify($contrasena, $contrasenaHash)) {
            // Almacena el estado de autenticación en la sesión
            $_SESSION["autenticado"] = true;
            $_SESSION["usuario_id"] = $fila["usuario_id"];
            $_SESSION["usuario"] = $fila["nombre_usuario"];

            // Redirecciona al usuario a la página de inicio o a donde desees
            header("Location: bienvenida.php");
            exit();
        } else {
            $mensajeError = "Credenciales incorrectas. Inténtalo de nuevo.";
        }
    } else {
        $mensajeError = "Credenciales incorrectas. Inténtalo de nuevo.";
    }

    $conexion->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="principal">

    <?php
    // Muestra un mensaje de error si existe
    if (isset($mensajeError)) {
        echo "<p>$mensajeError</p>";
    }
    ?>

<section class="form-container">
    <!-- Formulario de inicio de sesión -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h3>Iniciar Ahora</h3>
        <input type="text" name="usuario" required placeholder="Ingresa tu usuario" class="box" maxlength="50"  ><br>
        <input type="password" name="contrasena" required placeholder="Ingresa tu contraseña" class="box"  ><br>
        <input type="submit"  class="btn"  value="Iniciar Sesión">
        <p>No tienes una cuenta? <a href="index.php">Registrar Ahora</a></p>
    </form>
</section>
</body>
</html>
