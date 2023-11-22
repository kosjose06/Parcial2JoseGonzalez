<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="principal">


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conexion = new mysqli("localhost", "root", "", "futbolamericano_db");

    if ($conexion->connect_error) {
        die("Error de conexión a la base de datos: " . $conexion->connect_error);
    }

    // Recopilar datos del formulario
    $nombreUsuario = $_POST["nombre_usuario"];
    $contrasena = password_hash($_POST["contrasena"], PASSWORD_BCRYPT); // Se Encriptar la contraseña

    // Verificar si el nombre de usuario ya existe
    $sqlVerificarUsuario = "SELECT COUNT(*) as count FROM Usuarios WHERE nombre_usuario = '$nombreUsuario'";
    $resultVerificarUsuario = $conexion->query($sqlVerificarUsuario);

    if ($resultVerificarUsuario) {
        $row = $resultVerificarUsuario->fetch_assoc();
        $usuariosConNombre = $row["count"];

        if ($usuariosConNombre > 0) {
            echo "<p>¡Error! El nombre de usuario '$nombreUsuario' ya está registrado. Por favor, elige otro nombre de usuario.</p>";
        } else {
            // Insertar datos en la tabla Usuarios
            $sql = "INSERT INTO Usuarios (nombre_usuario, contrasena) VALUES ('$nombreUsuario', '$contrasena')";

            if ($conexion->query($sql) === TRUE) {
                echo "<p>Usuario registrado exitosamente.</p>";
            } else {
                echo "Error al registrar usuario: " . $conexion->error;
            }
        }
    } else {
        echo "Error al verificar el nombre de usuario: " . $conexion->error;
    }
    $conexion->close();
}
?>


    <section class="form-container">
    <!-- Formulario de registro de usuario -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h3>Regístrese ahora</h3>
        <input type="text" name="nombre_usuario" required placeholder="Ingresa tu usuario" class="box" maxlength="50"><br>
        <input type="password" name="contrasena" required placeholder="Ingresa tu contraseña" class="box" maxlength="50" ><br>
        <input type="submit" class="btn" value="Registrar Usuario">
        <p>¿Ya tienes una cuenta? <a href="login.php">Iniciar sesión ahora</a></p>
    </form>
    </section>
    
</body>
</html>
