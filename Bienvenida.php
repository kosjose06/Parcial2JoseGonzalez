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
    <title>Sistema de Gestión de Equipos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php include 'header.php'; ?>
    <h2>Sistema de Gestión de Equipos</h2>
    <div class="row">
            <div class="col"> 
                <div class="card card1">
                    <h3>Miami Dolphins</h3>
                    <p>Los Miami Dolphins son un equipo profesional de fútbol americano
                        con sede en el área metropolitana de Miami,Florida.L</p>
                    <p><a href="detalles_equipo.php?equipo_id=1">Ver más</a></p>
                </div>
                <div class="card card2">
                    <h3>Atlanta Falcons</h3>
                    <p>Los Atlanta Falcons son un equipo profesional de fútbol americano de 
                        los Estados Unidos con sede en Atlanta, Georgia. </p>
                        <p><a href="detalles_equipo.php?equipo_id=2">Ver más</a></p>
                </div>
                <div class="card card3">
                    <h3>Baltimore Ravens</h3>
                    <p>Los Baltimore Ravens son un equipo profesional de fútbol americano 
                        de los Estados Unidos con sede en Baltimore, Maryland.</p>
                        <p><a href="detalles_equipo.php?equipo_id=3">Ver más</a></p>
                </div>
                <div class="card card4">
                    <h3>Buffalo Bills</h3>
                    <p>Los Buffalo Bills son un equipo profesional de fútbol
                         americano de los Estados Unidos con sede en el área metropolitana 
                         de Búfalo-Niagara Falls,</p>
                         <p><a href="detalles_equipo.php?equipo_id=4">Ver más</a></p>
                </div>
                <div class="card card5">
                    <h3>Carolina Panthers</h3>
                    <p>Los Carolina Panthers son un equipo profesional de fútbol americano 
                        de los Estados Unidos con sede en Charlotte, Carolina del Norte.</p>
                        <p><a href="detalles_equipo.php?equipo_id=5">Ver más</a></p>
                </div>
                <div class="card card6">
                    <h3>New England Patriots</h3>
                    <p>Los New England Patriots son un equipo profesional de fútbol americano 
                        de los Estados Unidos con sede en el Gran Boston, Massachusetts,</p>
                        <p><a href="detalles_equipo.php?equipo_id=6">Ver más</a></p>
                </div>
                <div class="card card7">
                    <h3>Kansas City Chiefs</h3>
                    <p>Los Kansas City Chiefs son un equipo profesional de fútbol americano
                         de los Estados Unidos con sede en Kansas City, Misuri</p>
                         <p><a href="detalles_equipo.php?equipo_id=7">Ver más</a></p>
                </div>
                <div class="card card8">
                    <h3>Pittsburgh Steelers.</h3>
                    <p>Los Pittsburgh Steelers son un equipo profesional de fútbol americano 
                        de los Estados Unidos con sede en Pittsburgh, Pensilvania.</p>
                        <p><a href="detalles_equipo.php?equipo_id=8">Ver más</a></p>
                </div>
                <div class="card card9">
                    <h3>Green Bay Packers.</h3>
                    <p>Los Green Bay Packers son un equipo profesional de fútbol americano
                         de los Estados Unidos con sede en Green Bay, Wisconsin</p>
                         <p><a href="detalles_equipo.php?equipo_id=9">Ver más</a></p>
                </div>
                <div class="card card10">
                    <h3>San Francisco 49ers.</h3>
                    <p>LLos San Francisco 49ers son un equipo profesional de fútbol americano
                         de los Estados Unidos con sede en el área de la Bahía de San Francisco,
                          California.</p>
                          <p><a href="detalles_equipo.php?equipo_id=10">Ver más</a></p>
                </div>
        </div>

    </div>
</body>
</html>
