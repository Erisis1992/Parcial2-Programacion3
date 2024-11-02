<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
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
            <form action="./api/post.php" method="get"></form>
                <input type="submit"  id="Login" value="Iniciar Sesion"></input>
            </form>
        </div>
    </header>
    <div class="card">
        <h4>Registro de usuario</h4>
        <div>
            <form id="formu" action="./Api2/api.php" method="POST">
                <input type="text" name="nombre" placeholder="Nombre de usuario" required>
                <input type="text" name="email" placeholder="Correo electrónico" required>
                <input type="password" id="password" name="contrasena" placeholder="Contraseña" oninput="validatePassword()" required>
                <ul id="validation-list">
                    <li id="length" class="invalid">Al menos 8 caracteres</li>
                    <li id="uppercase" class="invalid">Al menos una letra mayuscula</li>
                    <li id="lowercase" class="invalid">Al menos una letra minuscula</li>
                    <li id="number" class="invalid">Al menos un numero</li>
                </ul>
                <input type="submit" value="Registrarme">
            </form>
        </div>
    </div>
    <script src="./script.js"></script>
</body>
</html>