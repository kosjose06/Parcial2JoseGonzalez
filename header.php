<?php

if (isset($_GET['equipo_id']) && is_numeric($_GET['equipo_id'])) {
    $equipoIdSeleccionado = $_GET['equipo_id'];
    setcookie('ultimo_equipo_seleccionado', $equipoIdSeleccionado, time() + (86400 * 30), "/");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>encabezado</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="principal2">
    <div class="contenedor">
        <div class="navbar">
            <img src="images/logo.png" alt="" class="logo">
            <nav>
                <ul>
                    <li><a href="bienvenida.php">Inicio</a></li>
                    <li><a href="registro_equipos.php">Registro de Equipos</a></li>
                    <li><a href="registrar_jugador.php">Registro de Jugadores</a></li>
                    <li><a href="listado_equipos.php">Listado de Equipos</a></li>
                    <li><a href="estadisticas.php">Estadísticas del Equipo</a></li>
                    <li><a href="cerrar_sesion.php" onclick="return confirm('Salir de este Sitio Web?');">Salir </a></li>
                </ul>
            </nav>
           
        </div>

    </div>
</body>
</html>