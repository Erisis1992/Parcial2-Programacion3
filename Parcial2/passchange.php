<?php
session_start();
if(empty($_SESSION['userLogin']) || $_SESSION['userLogin'] == ''){
    header("Location: ./login.html");
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
        </div>
    </header>
    <div class="medium">
        <div class="card">
            <h4>Cambiar contraseña</h4>
            <div>
                <form id="formu" action="./Api2/passchanger.php" method="POST">
                    <input type="password" name="curPass" placeholder="Contraseña actual" required>
                    <input type="password" id="password" name="newPass" placeholder="Contraseña nueva" required>
                    <input type="password" id="password" name="newPassConf" placeholder="Repetir contraseña" required>
                    <input onclick="onClick()" type="submit" value="Registrarme">
                </form>
            </div>
        </div>
    </div>
</body>
