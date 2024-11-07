<?php
session_start();
if(empty($_SESSION['ok']) || $_SESSION['ok'] == ''){
    header("Location: ./index.html");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="home">
            <a href="./index.html"><img id="hIcon" src="./imgs/home.svg" alt="Home" ></a>
        </div>
        <div class="title">
            <h1>Parcial 2 de Programación 3</h1>
        </div>
        <div class="icons">
        <?php echo "<p>$_SESSION[email]</p>"?>
        <a href="./Api2/unsession.php"><button>Cerrar sesion</button></a>
        </div>
    </header>
    <div class="medium">
        <div class="card">
            <h4>Cambiar contraseña</h4>
            <div>
                <form id="formu" action="./Api2/passchanger2.php" method="POST">
                    <input type="password" id="password" name="contra" placeholder="Contraseña nueva" required>
                    <input type="password" id="password" name="contra2" placeholder="Repetir contraseña" required>
                    <input onclick="onClick()" type="submit" value="Registrarme">
                </form>
            </div>
        </div>
    </div>
</body>
